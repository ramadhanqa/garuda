<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tmp_rawat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tmp_rawat_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tmp_rawat/tmp_rawat_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tmp_rawat_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tmp_rawat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kd_tindakan' => $row->kd_tindakan,
		'harga' => $row->harga,
		'kd_dokter' => $row->kd_dokter,
		'bagi_hasil_dokter' => $row->bagi_hasil_dokter,
		'kd_petugas' => $row->kd_petugas,
	    );
            $this->template->load('template','tmp_rawat/tmp_rawat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_rawat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tmp_rawat/create_action'),
	    'id' => set_value('id'),
	    'kd_tindakan' => set_value('kd_tindakan'),
	    'harga' => set_value('harga'),
	    'kd_dokter' => set_value('kd_dokter'),
	    'bagi_hasil_dokter' => set_value('bagi_hasil_dokter'),
	    'kd_petugas' => set_value('kd_petugas'),
	);
        $this->template->load('template','tmp_rawat/tmp_rawat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_tindakan' => $this->input->post('kd_tindakan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'kd_dokter' => $this->input->post('kd_dokter',TRUE),
		'bagi_hasil_dokter' => $this->input->post('bagi_hasil_dokter',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Tmp_rawat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tmp_rawat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tmp_rawat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tmp_rawat/update_action'),
		'id' => set_value('id', $row->id),
		'kd_tindakan' => set_value('kd_tindakan', $row->kd_tindakan),
		'harga' => set_value('harga', $row->harga),
		'kd_dokter' => set_value('kd_dokter', $row->kd_dokter),
		'bagi_hasil_dokter' => set_value('bagi_hasil_dokter', $row->bagi_hasil_dokter),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
	    );
            $this->template->load('template','tmp_rawat/tmp_rawat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_rawat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kd_tindakan' => $this->input->post('kd_tindakan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'kd_dokter' => $this->input->post('kd_dokter',TRUE),
		'bagi_hasil_dokter' => $this->input->post('bagi_hasil_dokter',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Tmp_rawat_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tmp_rawat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tmp_rawat_model->get_by_id($id);

        if ($row) {
            $this->Tmp_rawat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tmp_rawat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_rawat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_tindakan', 'kd tindakan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('kd_dokter', 'kd dokter', 'trim|required');
	$this->form_validation->set_rules('bagi_hasil_dokter', 'bagi hasil dokter', 'trim|required');
	$this->form_validation->set_rules('kd_petugas', 'kd petugas', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tmp_rawat.xls";
        $judul = "tmp_rawat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Dokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Bagi Hasil Dokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Petugas");

	foreach ($this->Tmp_rawat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_tindakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_dokter);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bagi_hasil_dokter);
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
        header("Content-Disposition: attachment;Filename=tmp_rawat.doc");

        $data = array(
            'tmp_rawat_data' => $this->Tmp_rawat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tmp_rawat/tmp_rawat_doc',$data);
    }

}

/* End of file Tmp_rawat.php */
/* Location: ./application/controllers/Tmp_rawat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:30 */
/* http://harviacode.com */