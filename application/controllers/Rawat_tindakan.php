<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rawat_tindakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rawat_tindakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rawat_tindakan/rawat_tindakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rawat_tindakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Rawat_tindakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tindakan' => $row->id_tindakan,
		'tgl_tindakan' => $row->tgl_tindakan,
		'no_rawat' => $row->no_rawat,
		'kd_tindakan' => $row->kd_tindakan,
		'harga' => $row->harga,
		'kd_dokter' => $row->kd_dokter,
		'bagi_hasil_dokter' => $row->bagi_hasil_dokter,
	    );
            $this->template->load('template','rawat_tindakan/rawat_tindakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rawat_tindakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rawat_tindakan/create_action'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'tgl_tindakan' => set_value('tgl_tindakan'),
	    'no_rawat' => set_value('no_rawat'),
	    'kd_tindakan' => set_value('kd_tindakan'),
	    'harga' => set_value('harga'),
	    'kd_dokter' => set_value('kd_dokter'),
	    'bagi_hasil_dokter' => set_value('bagi_hasil_dokter'),
	);
        $this->template->load('template','rawat_tindakan/rawat_tindakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_tindakan' => $this->input->post('tgl_tindakan',TRUE),
		'no_rawat' => $this->input->post('no_rawat',TRUE),
		'kd_tindakan' => $this->input->post('kd_tindakan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'kd_dokter' => $this->input->post('kd_dokter',TRUE),
		'bagi_hasil_dokter' => $this->input->post('bagi_hasil_dokter',TRUE),
	    );

            $this->Rawat_tindakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('rawat_tindakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rawat_tindakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rawat_tindakan/update_action'),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'tgl_tindakan' => set_value('tgl_tindakan', $row->tgl_tindakan),
		'no_rawat' => set_value('no_rawat', $row->no_rawat),
		'kd_tindakan' => set_value('kd_tindakan', $row->kd_tindakan),
		'harga' => set_value('harga', $row->harga),
		'kd_dokter' => set_value('kd_dokter', $row->kd_dokter),
		'bagi_hasil_dokter' => set_value('bagi_hasil_dokter', $row->bagi_hasil_dokter),
	    );
            $this->template->load('template','rawat_tindakan/rawat_tindakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rawat_tindakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tindakan', TRUE));
        } else {
            $data = array(
		'tgl_tindakan' => $this->input->post('tgl_tindakan',TRUE),
		'no_rawat' => $this->input->post('no_rawat',TRUE),
		'kd_tindakan' => $this->input->post('kd_tindakan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'kd_dokter' => $this->input->post('kd_dokter',TRUE),
		'bagi_hasil_dokter' => $this->input->post('bagi_hasil_dokter',TRUE),
	    );

            $this->Rawat_tindakan_model->update($this->input->post('id_tindakan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rawat_tindakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rawat_tindakan_model->get_by_id($id);

        if ($row) {
            $this->Rawat_tindakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rawat_tindakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rawat_tindakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_tindakan', 'tgl tindakan', 'trim|required');
	$this->form_validation->set_rules('no_rawat', 'no rawat', 'trim|required');
	$this->form_validation->set_rules('kd_tindakan', 'kd tindakan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('kd_dokter', 'kd dokter', 'trim|required');
	$this->form_validation->set_rules('bagi_hasil_dokter', 'bagi hasil dokter', 'trim|required');

	$this->form_validation->set_rules('id_tindakan', 'id_tindakan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rawat_tindakan.xls";
        $judul = "rawat_tindakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rawat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Dokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Bagi Hasil Dokter");

	foreach ($this->Rawat_tindakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_tindakan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rawat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_tindakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_dokter);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bagi_hasil_dokter);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rawat_tindakan.doc");

        $data = array(
            'rawat_tindakan_data' => $this->Rawat_tindakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('rawat_tindakan/rawat_tindakan_doc',$data);
    }

}

/* End of file Rawat_tindakan.php */
/* Location: ./application/controllers/Rawat_tindakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:27 */
/* http://harviacode.com */