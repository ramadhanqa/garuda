<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tindakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tindakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tindakan/tindakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tindakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tindakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_tindakan' => $row->kd_tindakan,
		'nm_tindakan' => $row->nm_tindakan,
		'harga' => $row->harga,
	    );
            $this->template->load('template','tindakan/tindakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tindakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tindakan/create_action'),
	    'kd_tindakan' => set_value('kd_tindakan'),
	    'nm_tindakan' => set_value('nm_tindakan'),
	    'harga' => set_value('harga'),
	);
        $this->template->load('template','tindakan/tindakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_tindakan' => $this->input->post('nm_tindakan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Tindakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tindakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tindakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tindakan/update_action'),
		'kd_tindakan' => set_value('kd_tindakan', $row->kd_tindakan),
		'nm_tindakan' => set_value('nm_tindakan', $row->nm_tindakan),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->template->load('template','tindakan/tindakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tindakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_tindakan', TRUE));
        } else {
            $data = array(
		'nm_tindakan' => $this->input->post('nm_tindakan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Tindakan_model->update($this->input->post('kd_tindakan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tindakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tindakan_model->get_by_id($id);

        if ($row) {
            $this->Tindakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tindakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tindakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_tindakan', 'nm tindakan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('kd_tindakan', 'kd_tindakan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tindakan.xls";
        $judul = "tindakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");

	foreach ($this->Tindakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_tindakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tindakan.doc");

        $data = array(
            'tindakan_data' => $this->Tindakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tindakan/tindakan_doc',$data);
    }

}

/* End of file Tindakan.php */
/* Location: ./application/controllers/Tindakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:28 */
/* http://harviacode.com */