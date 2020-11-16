<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dokter_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','dokter/dokter_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Dokter_model->json();
    }

    public function read($id) 
    {
        $row = $this->Dokter_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_dokter' => $row->kd_dokter,
		'nm_dokter' => $row->nm_dokter,
		'jns_kelamin' => $row->jns_kelamin,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'no_telepon' => $row->no_telepon,
		'sip' => $row->sip,
		'spesialisasi' => $row->spesialisasi,
		'bagi_hasil' => $row->bagi_hasil,
	    );
            $this->template->load('template','dokter/dokter_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokter'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dokter/create_action'),
	    'kd_dokter' => set_value('kd_dokter'),
	    'nm_dokter' => set_value('nm_dokter'),
	    'jns_kelamin' => set_value('jns_kelamin'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
	    'no_telepon' => set_value('no_telepon'),
	    'sip' => set_value('sip'),
	    'spesialisasi' => set_value('spesialisasi'),
	    'bagi_hasil' => set_value('bagi_hasil'),
	);
        $this->template->load('template','dokter/dokter_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_dokter' => $this->input->post('nm_dokter',TRUE),
		'jns_kelamin' => $this->input->post('jns_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'sip' => $this->input->post('sip',TRUE),
		'spesialisasi' => $this->input->post('spesialisasi',TRUE),
		'bagi_hasil' => $this->input->post('bagi_hasil',TRUE),
	    );

            $this->Dokter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('dokter'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dokter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dokter/update_action'),
		'kd_dokter' => set_value('kd_dokter', $row->kd_dokter),
		'nm_dokter' => set_value('nm_dokter', $row->nm_dokter),
		'jns_kelamin' => set_value('jns_kelamin', $row->jns_kelamin),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'no_telepon' => set_value('no_telepon', $row->no_telepon),
		'sip' => set_value('sip', $row->sip),
		'spesialisasi' => set_value('spesialisasi', $row->spesialisasi),
		'bagi_hasil' => set_value('bagi_hasil', $row->bagi_hasil),
	    );
            $this->template->load('template','dokter/dokter_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokter'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_dokter', TRUE));
        } else {
            $data = array(
		'nm_dokter' => $this->input->post('nm_dokter',TRUE),
		'jns_kelamin' => $this->input->post('jns_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'sip' => $this->input->post('sip',TRUE),
		'spesialisasi' => $this->input->post('spesialisasi',TRUE),
		'bagi_hasil' => $this->input->post('bagi_hasil',TRUE),
	    );

            $this->Dokter_model->update($this->input->post('kd_dokter', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dokter'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dokter_model->get_by_id($id);

        if ($row) {
            $this->Dokter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dokter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokter'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_dokter', 'nm dokter', 'trim|required');
	$this->form_validation->set_rules('jns_kelamin', 'jns kelamin', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required');
	$this->form_validation->set_rules('sip', 'sip', 'trim|required');
	$this->form_validation->set_rules('spesialisasi', 'spesialisasi', 'trim|required');
	$this->form_validation->set_rules('bagi_hasil', 'bagi hasil', 'trim|required');

	$this->form_validation->set_rules('kd_dokter', 'kd_dokter', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dokter.xls";
        $judul = "dokter";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Dokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Jns Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Sip");
	xlsWriteLabel($tablehead, $kolomhead++, "Spesialisasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Bagi Hasil");

	foreach ($this->Dokter_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_dokter);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jns_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->spesialisasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bagi_hasil);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=dokter.doc");

        $data = array(
            'dokter_data' => $this->Dokter_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('dokter/dokter_doc',$data);
    }

}

/* End of file Dokter.php */
/* Location: ./application/controllers/Dokter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:26 */
/* http://harviacode.com */