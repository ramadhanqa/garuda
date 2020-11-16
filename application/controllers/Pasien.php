<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pasien_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pasien/pasien_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pasien_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nomor_rm' => $row->nomor_rm,
		'nm_pasien' => $row->nm_pasien,
		'no_identitas' => $row->no_identitas,
		'jns_kelamin' => $row->jns_kelamin,
		'gol_darah' => $row->gol_darah,
		'agama' => $row->agama,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'no_telepon' => $row->no_telepon,
		'alamat' => $row->alamat,
		'stts_nikah' => $row->stts_nikah,
		'pekerjaan' => $row->pekerjaan,
		'keluarga_status' => $row->keluarga_status,
		'keluarga_nama' => $row->keluarga_nama,
		'keluarga_telepon' => $row->keluarga_telepon,
		'tgl_rekam' => $row->tgl_rekam,
		'kd_petugas' => $row->kd_petugas,
	    );
            $this->template->load('template','pasien/pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pasien/create_action'),
	    'nomor_rm' => set_value('nomor_rm'),
	    'nm_pasien' => set_value('nm_pasien'),
	    'no_identitas' => set_value('no_identitas'),
	    'jns_kelamin' => set_value('jns_kelamin'),
	    'gol_darah' => set_value('gol_darah'),
	    'agama' => set_value('agama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'no_telepon' => set_value('no_telepon'),
	    'alamat' => set_value('alamat'),
	    'stts_nikah' => set_value('stts_nikah'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'keluarga_status' => set_value('keluarga_status'),
	    'keluarga_nama' => set_value('keluarga_nama'),
	    'keluarga_telepon' => set_value('keluarga_telepon'),
	    'tgl_rekam' => set_value('tgl_rekam'),
	    'kd_petugas' => set_value('kd_petugas'),
	);
        $this->template->load('template','pasien/pasien_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_pasien' => $this->input->post('nm_pasien',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'jns_kelamin' => $this->input->post('jns_kelamin',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'stts_nikah' => $this->input->post('stts_nikah',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'keluarga_status' => $this->input->post('keluarga_status',TRUE),
		'keluarga_nama' => $this->input->post('keluarga_nama',TRUE),
		'keluarga_telepon' => $this->input->post('keluarga_telepon',TRUE),
		'tgl_rekam' => $this->input->post('tgl_rekam',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pasien'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasien/update_action'),
		'nomor_rm' => set_value('nomor_rm', $row->nomor_rm),
		'nm_pasien' => set_value('nm_pasien', $row->nm_pasien),
		'no_identitas' => set_value('no_identitas', $row->no_identitas),
		'jns_kelamin' => set_value('jns_kelamin', $row->jns_kelamin),
		'gol_darah' => set_value('gol_darah', $row->gol_darah),
		'agama' => set_value('agama', $row->agama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'no_telepon' => set_value('no_telepon', $row->no_telepon),
		'alamat' => set_value('alamat', $row->alamat),
		'stts_nikah' => set_value('stts_nikah', $row->stts_nikah),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'keluarga_status' => set_value('keluarga_status', $row->keluarga_status),
		'keluarga_nama' => set_value('keluarga_nama', $row->keluarga_nama),
		'keluarga_telepon' => set_value('keluarga_telepon', $row->keluarga_telepon),
		'tgl_rekam' => set_value('tgl_rekam', $row->tgl_rekam),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
	    );
            $this->template->load('template','pasien/pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nomor_rm', TRUE));
        } else {
            $data = array(
		'nm_pasien' => $this->input->post('nm_pasien',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'jns_kelamin' => $this->input->post('jns_kelamin',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'stts_nikah' => $this->input->post('stts_nikah',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'keluarga_status' => $this->input->post('keluarga_status',TRUE),
		'keluarga_nama' => $this->input->post('keluarga_nama',TRUE),
		'keluarga_telepon' => $this->input->post('keluarga_telepon',TRUE),
		'tgl_rekam' => $this->input->post('tgl_rekam',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Pasien_model->update($this->input->post('nomor_rm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasien'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $this->Pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_pasien', 'nm pasien', 'trim|required');
	$this->form_validation->set_rules('no_identitas', 'no identitas', 'trim|required');
	$this->form_validation->set_rules('jns_kelamin', 'jns kelamin', 'trim|required');
	$this->form_validation->set_rules('gol_darah', 'gol darah', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('stts_nikah', 'stts nikah', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('keluarga_status', 'keluarga status', 'trim|required');
	$this->form_validation->set_rules('keluarga_nama', 'keluarga nama', 'trim|required');
	$this->form_validation->set_rules('keluarga_telepon', 'keluarga telepon', 'trim|required');
	$this->form_validation->set_rules('tgl_rekam', 'tgl rekam', 'trim|required');
	$this->form_validation->set_rules('kd_petugas', 'kd petugas', 'trim|required');

	$this->form_validation->set_rules('nomor_rm', 'nomor_rm', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pasien.xls";
        $judul = "pasien";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "No Identitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jns Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Gol Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Stts Nikah");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluarga Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluarga Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluarga Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Rekam");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Petugas");

	foreach ($this->Pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_identitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jns_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gol_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->stts_nikah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keluarga_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keluarga_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keluarga_telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_rekam);
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
        header("Content-Disposition: attachment;Filename=pasien.doc");

        $data = array(
            'pasien_data' => $this->Pasien_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pasien/pasien_doc',$data);
    }

}

/* End of file Pasien.php */
/* Location: ./application/controllers/Pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:26 */
/* http://harviacode.com */