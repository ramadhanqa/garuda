<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','obat/obat_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Obat_model->json();
    }

    public function read($id) 
    {
        $row = $this->Obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_obat' => $row->kd_obat,
		'nm_obat' => $row->nm_obat,
		'harga_modal' => $row->harga_modal,
		'harga_jual' => $row->harga_jual,
		'stok' => $row->stok,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','obat/obat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('obat/create_action'),
	    'kd_obat' => set_value('kd_obat'),
	    'nm_obat' => set_value('nm_obat'),
	    'harga_modal' => set_value('harga_modal'),
	    'harga_jual' => set_value('harga_jual'),
	    'stok' => set_value('stok'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','obat/obat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_obat' => $this->input->post('nm_obat',TRUE),
		'harga_modal' => $this->input->post('harga_modal',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Obat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('obat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('obat/update_action'),
		'kd_obat' => set_value('kd_obat', $row->kd_obat),
		'nm_obat' => set_value('nm_obat', $row->nm_obat),
		'harga_modal' => set_value('harga_modal', $row->harga_modal),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
		'stok' => set_value('stok', $row->stok),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','obat/obat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_obat', TRUE));
        } else {
            $data = array(
		'nm_obat' => $this->input->post('nm_obat',TRUE),
		'harga_modal' => $this->input->post('harga_modal',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Obat_model->update($this->input->post('kd_obat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('obat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Obat_model->get_by_id($id);

        if ($row) {
            $this->Obat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('obat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_obat', 'nm obat', 'trim|required');
	$this->form_validation->set_rules('harga_modal', 'harga modal', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('kd_obat', 'kd_obat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "obat.xls";
        $judul = "obat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Modal");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Jual");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Obat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_obat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_modal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_jual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=obat.doc");

        $data = array(
            'obat_data' => $this->Obat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('obat/obat_doc',$data);
    }

}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:26 */
/* http://harviacode.com */