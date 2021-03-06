<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{

    public $table = 'penjualan';
    public $id = 'no_penjualan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('no_penjualan,tgl_penjualan,pelanggan,keterangan,uang_bayar,kd_petugas');
        $this->datatables->from('penjualan');
        //add this line for join
        //$this->datatables->join('table2', 'penjualan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('penjualan/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('penjualan/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('penjualan/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'no_penjualan');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('no_penjualan', $q);
	$this->db->or_like('tgl_penjualan', $q);
	$this->db->or_like('pelanggan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('uang_bayar', $q);
	$this->db->or_like('kd_petugas', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_penjualan', $q);
	$this->db->or_like('tgl_penjualan', $q);
	$this->db->or_like('pelanggan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('uang_bayar', $q);
	$this->db->or_like('kd_petugas', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:26 */
/* http://harviacode.com */