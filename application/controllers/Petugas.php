<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Petugas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','petugas/petugas_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Petugas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Petugas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_petugas' => $row->kd_petugas,
		'nm_petugas' => $row->nm_petugas,
		'no_telepon' => $row->no_telepon,
		'username' => $row->username,
		'password' => $row->password,
		'level' => $row->level,
	    );
            $this->template->load('template','petugas/petugas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('petugas/create_action'),
	    'kd_petugas' => set_value('kd_petugas'),
	    'nm_petugas' => set_value('nm_petugas'),
	    'no_telepon' => set_value('no_telepon'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'level' => set_value('level'),
	);
        $this->template->load('template','petugas/petugas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_petugas' => $this->input->post('nm_petugas',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Petugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('petugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Petugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('petugas/update_action'),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
		'nm_petugas' => set_value('nm_petugas', $row->nm_petugas),
		'no_telepon' => set_value('no_telepon', $row->no_telepon),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'level' => set_value('level', $row->level),
	    );
            $this->template->load('template','petugas/petugas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_petugas', TRUE));
        } else {
            $data = array(
		'nm_petugas' => $this->input->post('nm_petugas',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Petugas_model->update($this->input->post('kd_petugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('petugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Petugas_model->get_by_id($id);

        if ($row) {
            $this->Petugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('petugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_petugas', 'nm petugas', 'trim|required');
	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');

	$this->form_validation->set_rules('kd_petugas', 'kd_petugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "petugas.xls";
        $judul = "petugas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Petugas");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");

	foreach ($this->Petugas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_petugas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=petugas.doc");

        $data = array(
            'petugas_data' => $this->Petugas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('petugas/petugas_doc',$data);
    }

}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:27 */
/* http://harviacode.com */