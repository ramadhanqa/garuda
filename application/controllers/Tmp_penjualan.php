<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tmp_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tmp_penjualan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tmp_penjualan/tmp_penjualan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tmp_penjualan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tmp_penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kd_obat' => $row->kd_obat,
		'jumlah' => $row->jumlah,
		'kd_petugas' => $row->kd_petugas,
	    );
            $this->template->load('template','tmp_penjualan/tmp_penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_penjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tmp_penjualan/create_action'),
	    'id' => set_value('id'),
	    'kd_obat' => set_value('kd_obat'),
	    'jumlah' => set_value('jumlah'),
	    'kd_petugas' => set_value('kd_petugas'),
	);
        $this->template->load('template','tmp_penjualan/tmp_penjualan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_obat' => $this->input->post('kd_obat',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Tmp_penjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tmp_penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tmp_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tmp_penjualan/update_action'),
		'id' => set_value('id', $row->id),
		'kd_obat' => set_value('kd_obat', $row->kd_obat),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'kd_petugas' => set_value('kd_petugas', $row->kd_petugas),
	    );
            $this->template->load('template','tmp_penjualan/tmp_penjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kd_obat' => $this->input->post('kd_obat',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'kd_petugas' => $this->input->post('kd_petugas',TRUE),
	    );

            $this->Tmp_penjualan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tmp_penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tmp_penjualan_model->get_by_id($id);

        if ($row) {
            $this->Tmp_penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tmp_penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tmp_penjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_obat', 'kd obat', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('kd_petugas', 'kd petugas', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tmp_penjualan.xls";
        $judul = "tmp_penjualan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Petugas");

	foreach ($this->Tmp_penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_obat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
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
        header("Content-Disposition: attachment;Filename=tmp_penjualan.doc");

        $data = array(
            'tmp_penjualan_data' => $this->Tmp_penjualan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tmp_penjualan/tmp_penjualan_doc',$data);
    }

}

/* End of file Tmp_penjualan.php */
/* Location: ./application/controllers/Tmp_penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-22 08:12:29 */
/* http://harviacode.com */