<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teknisi_helpdesk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Teknisi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','teknisi_helpdesk/teknisi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Teknisi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Teknisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_teknisi' => $row->id_teknisi,
		'nama' => $row->nama,
		'email' => $row->email,
	    );
            $this->template->load('template','teknisi_helpdesk/teknisi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('teknisi_helpdesk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('teknisi_helpdesk/create_action'),
	    'id_teknisi' => set_value('id_teknisi'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	);
        $this->template->load('template','teknisi_helpdesk/teknisi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Teknisi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('teknisi_helpdesk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Teknisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('teknisi_helpdesk/update_action'),
		'id_teknisi' => set_value('id_teknisi', $row->id_teknisi),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
	    );
            $this->template->load('template','teknisi_helpdesk/teknisi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('teknisi_helpdesk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_teknisi', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Teknisi_model->update($this->input->post('id_teknisi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('teknisi_helpdesk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Teknisi_model->get_by_id($id);

        if ($row) {
            $this->Teknisi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('teknisi_helpdesk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('teknisi_helpdesk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('id_teknisi', 'id_teknisi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "teknisi.xls";
        $judul = "teknisi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");

	foreach ($this->Teknisi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=teknisi.doc");

        $data = array(
            'teknisi_data' => $this->Teknisi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('teknisi_helpdesk/teknisi_doc',$data);
    }

}

/* End of file Teknisi_helpdesk.php */
/* Location: ./application/controllers/Teknisi_helpdesk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 08:44:40 */
/* http://harviacode.com */