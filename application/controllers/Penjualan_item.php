<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan_item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Penjualan_item_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','penjualan_item/penjualan_item_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Penjualan_item_model->json();
    }

    public function read($id) 
    {
        $row = $this->Penjualan_item_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_penjualan' => $row->no_penjualan,
		'kd_obat' => $row->kd_obat,
		'harga_modal' => $row->harga_modal,
		'harga_jual' => $row->harga_jual,
		'jumlah' => $row->jumlah,
	    );
            $this->template->load('template','penjualan_item/penjualan_item_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan_item'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penjualan_item/create_action'),
	    'no_penjualan' => set_value('no_penjualan'),
	    'kd_obat' => set_value('kd_obat'),
	    'harga_modal' => set_value('harga_modal'),
	    'harga_jual' => set_value('harga_jual'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->load('template','penjualan_item/penjualan_item_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_penjualan' => $this->input->post('no_penjualan',TRUE),
		'kd_obat' => $this->input->post('kd_obat',TRUE),
		'harga_modal' => $this->input->post('harga_modal',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Penjualan_item_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('penjualan_item'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjualan_item_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjualan_item/update_action'),
		'no_penjualan' => set_value('no_penjualan', $row->no_penjualan),
		'kd_obat' => set_value('kd_obat', $row->kd_obat),
		'harga_modal' => set_value('harga_modal', $row->harga_modal),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->template->load('template','penjualan_item/penjualan_item_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan_item'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'no_penjualan' => $this->input->post('no_penjualan',TRUE),
		'kd_obat' => $this->input->post('kd_obat',TRUE),
		'harga_modal' => $this->input->post('harga_modal',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Penjualan_item_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjualan_item'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjualan_item_model->get_by_id($id);

        if ($row) {
            $this->Penjualan_item_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjualan_item'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan_item'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_penjualan', 'no penjualan', 'trim|required');
	$this->form_validation->set_rules('kd_obat', 'kd obat', 'trim|required');
	$this->form_validation->set_rules('harga_modal', 'harga modal', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penjualan_item.xls";
        $judul = "penjualan_item";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Penjualan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Modal");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Jual");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");

	foreach ($this->Penjualan_item_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_penjualan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_obat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_modal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_jual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penjualan_item.doc");

        $data = array(
            'penjualan_item_data' => $this->Penjualan_item_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penjualan_item/penjualan_item_doc',$data);
    }

}

/* End of file Penjualan_item.php */
/* Location: ./application/controllers/Penjualan_item.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:27 */
/* http://harviacode.com */