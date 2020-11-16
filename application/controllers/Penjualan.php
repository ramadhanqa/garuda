<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','penjualan/penjualan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Penjualan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_penjualan' => $row->no_penjualan,
		'tgl_penjualan' => $row->tgl_penjualan,
		'pelanggan' => $row->pelanggan,
		'keterangan' => $row->keterangan,
		'uang_bayar' => $row->uang_bayar,
		'kd_petugas' => $row->kd_petugas,
	    );
            $this->template->load('template','penjualan/penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penjualan/create_action'),
	    'no_penjualan' => set_value('no_penjualan'),
	    'tgl_penjualan' => set_value('tgl_penjualan'),
	    'pelanggan' => set_value('pelanggan'),
	    'keterangan' => set_value('keterangan'),
	    'uang_bayar' => set_value('uang_bayar'),
	    'kd_petugas' => set_value('kd_petugas'),
	);
        $this->template->load('template','penjualan/penjualan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_penjualan' => $this->input->post('tgl_penjualan',TRUE),
		'pelanggan' => $this->input->post('pelanggan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'uang_bayar' => $this->input->post('uang_bayar',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Penjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjualan/update_action'),
		'no_penjualan' => set_value('no_penjualan', $row->no_penjualan),
		'tgl_penjualan' => set_value('tgl_penjualan', $row->tgl_penjualan),
		'pelanggan' => set_value('pelanggan', $row->pelanggan),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'uang_bayar' => set_value('uang_bayar', $row->uang_bayar),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
	    );
            $this->template->load('template','penjualan/penjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_penjualan', TRUE));
        } else {
            $data = array(
		'tgl_penjualan' => $this->input->post('tgl_penjualan',TRUE),
		'pelanggan' => $this->input->post('pelanggan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'uang_bayar' => $this->input->post('uang_bayar',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Penjualan_model->update($this->input->post('no_penjualan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $this->Penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_penjualan', 'tgl penjualan', 'trim|required');
	$this->form_validation->set_rules('pelanggan', 'pelanggan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('uang_bayar', 'uang bayar', 'trim|required');
	$this->form_validation->set_rules('kd_petugas', 'kd petugas', 'trim|required');

	$this->form_validation->set_rules('no_penjualan', 'no_penjualan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penjualan.xls";
        $judul = "penjualan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Penjualan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pelanggan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Uang Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Petugas");

	foreach ($this->Penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_penjualan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pelanggan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uang_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_petugas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penjualan.doc");

        $data = array(
            'penjualan_data' => $this->Penjualan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penjualan/penjualan_doc',$data);
    }

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:26 */
/* http://harviacode.com */