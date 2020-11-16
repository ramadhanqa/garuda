<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rawat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rawat_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rawat/rawat_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rawat_model->json();
    }

    public function read($id) 
    {
        $row = $this->Rawat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_rawat' => $row->no_rawat,
		'tgl_rawat' => $row->tgl_rawat,
		'nomor_rm' => $row->nomor_rm,
		'hasil_diagnosa' => $row->hasil_diagnosa,
		'uang_bayar' => $row->uang_bayar,
		'kd_petugas' => $row->kd_petugas,
	    );
            $this->template->load('template','rawat/rawat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rawat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rawat/create_action'),
	    'no_rawat' => set_value('no_rawat'),
	    'tgl_rawat' => set_value('tgl_rawat'),
	    'nomor_rm' => set_value('nomor_rm'),
	    'hasil_diagnosa' => set_value('hasil_diagnosa'),
	    'uang_bayar' => set_value('uang_bayar'),
	    'kd_petugas' => set_value('kd_petugas'),
	);
        $this->template->load('template','rawat/rawat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_rawat' => $this->input->post('tgl_rawat',TRUE),
		'nomor_rm' => $this->input->post('nomor_rm',TRUE),
		'hasil_diagnosa' => $this->input->post('hasil_diagnosa',TRUE),
		'uang_bayar' => $this->input->post('uang_bayar',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Rawat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('rawat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rawat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rawat/update_action'),
		'no_rawat' => set_value('no_rawat', $row->no_rawat),
		'tgl_rawat' => set_value('tgl_rawat', $row->tgl_rawat),
		'nomor_rm' => set_value('nomor_rm', $row->nomor_rm),
		'hasil_diagnosa' => set_value('hasil_diagnosa', $row->hasil_diagnosa),
		'uang_bayar' => set_value('uang_bayar', $row->uang_bayar),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
	    );
            $this->template->load('template','rawat/rawat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rawat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_rawat', TRUE));
        } else {
            $data = array(
		'tgl_rawat' => $this->input->post('tgl_rawat',TRUE),
		'nomor_rm' => $this->input->post('nomor_rm',TRUE),
		'hasil_diagnosa' => $this->input->post('hasil_diagnosa',TRUE),
		'uang_bayar' => $this->input->post('uang_bayar',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Rawat_model->update($this->input->post('no_rawat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rawat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rawat_model->get_by_id($id);

        if ($row) {
            $this->Rawat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rawat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rawat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_rawat', 'tgl rawat', 'trim|required');
	$this->form_validation->set_rules('nomor_rm', 'nomor rm', 'trim|required');
	$this->form_validation->set_rules('hasil_diagnosa', 'hasil diagnosa', 'trim|required');
	$this->form_validation->set_rules('uang_bayar', 'uang bayar', 'trim|required');
	$this->form_validation->set_rules('kd_petugas', 'kd petugas', 'trim|required');

	$this->form_validation->set_rules('no_rawat', 'no_rawat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rawat.xls";
        $judul = "rawat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Rawat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Rm");
	xlsWriteLabel($tablehead, $kolomhead++, "Hasil Diagnosa");
	xlsWriteLabel($tablehead, $kolomhead++, "Uang Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Petugas");

	foreach ($this->Rawat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_rawat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_rm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hasil_diagnosa);
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
        header("Content-Disposition: attachment;Filename=rawat.doc");

        $data = array(
            'rawat_data' => $this->Rawat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('rawat/rawat_doc',$data);
    }

}

/* End of file Rawat.php */
/* Location: ./application/controllers/Rawat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:27 */
/* http://harviacode.com */