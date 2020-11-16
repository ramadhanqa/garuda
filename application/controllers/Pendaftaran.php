<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pendaftaran/pendaftaran_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pendaftaran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_daftar' => $row->no_daftar,
		'nomor_rm' => $row->nomor_rm,
		'tgl_daftar' => $row->tgl_daftar,
		'tgl_janji' => $row->tgl_janji,
		'jam_janji' => $row->jam_janji,
		'keluhan' => $row->keluhan,
		'kd_tindakan' => $row->kd_tindakan,
		'nomor_antri' => $row->nomor_antri,
		'kd_petugas' => $row->kd_petugas,
	    );
            $this->template->load('template','pendaftaran/pendaftaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendaftaran/create_action'),
	    'no_daftar' => set_value('no_daftar'),
	    'nomor_rm' => set_value('nomor_rm'),
	    'tgl_daftar' => set_value('tgl_daftar'),
	    'tgl_janji' => set_value('tgl_janji'),
	    'jam_janji' => set_value('jam_janji'),
	    'keluhan' => set_value('keluhan'),
	    'kd_tindakan' => set_value('kd_tindakan'),
	    'nomor_antri' => set_value('nomor_antri'),
	    'kd_petugas' => set_value('kd_petugas'),
	);
        $this->template->load('template','pendaftaran/pendaftaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_rm' => $this->input->post('nomor_rm',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'tgl_janji' => $this->input->post('tgl_janji',TRUE),
		'jam_janji' => $this->input->post('jam_janji',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'kd_tindakan' => $this->input->post('kd_tindakan',TRUE),
		'nomor_antri' => $this->input->post('nomor_antri',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftaran/update_action'),
		'no_daftar' => set_value('no_daftar', $row->no_daftar),
		'nomor_rm' => set_value('nomor_rm', $row->nomor_rm),
		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
		'tgl_janji' => set_value('tgl_janji', $row->tgl_janji),
		'jam_janji' => set_value('jam_janji', $row->jam_janji),
		'keluhan' => set_value('keluhan', $row->keluhan),
		'kd_tindakan' => set_value('kd_tindakan', $row->kd_tindakan),
		'nomor_antri' => set_value('nomor_antri', $row->nomor_antri),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
	    );
            $this->template->load('template','pendaftaran/pendaftaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_daftar', TRUE));
        } else {
            $data = array(
		'nomor_rm' => $this->input->post('nomor_rm',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'tgl_janji' => $this->input->post('tgl_janji',TRUE),
		'jam_janji' => $this->input->post('jam_janji',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'kd_tindakan' => $this->input->post('kd_tindakan',TRUE),
		'nomor_antri' => $this->input->post('nomor_antri',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Pendaftaran_model->update($this->input->post('no_daftar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_rm', 'nomor rm', 'trim|required');
	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');
	$this->form_validation->set_rules('tgl_janji', 'tgl janji', 'trim|required');
	$this->form_validation->set_rules('jam_janji', 'jam janji', 'trim|required');
	$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');
	$this->form_validation->set_rules('kd_tindakan', 'kd tindakan', 'trim|required');
	$this->form_validation->set_rules('nomor_antri', 'nomor antri', 'trim|required');
	$this->form_validation->set_rules('kd_petugas', 'kd petugas', 'trim|required');

	$this->form_validation->set_rules('no_daftar', 'no_daftar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pendaftaran.xls";
        $judul = "pendaftaran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Rm");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Daftar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Janji");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam Janji");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluhan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Antri");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Petugas");

	foreach ($this->Pendaftaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_rm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_daftar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_janji);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam_janji);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keluhan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_tindakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nomor_antri);
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
        header("Content-Disposition: attachment;Filename=pendaftaran.doc");

        $data = array(
            'pendaftaran_data' => $this->Pendaftaran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pendaftaran/pendaftaran_doc',$data);
    }

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:26 */
/* http://harviacode.com */