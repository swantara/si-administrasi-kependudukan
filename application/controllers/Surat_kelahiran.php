<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_kelahiran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('surat_kelahiran_model', 'surat_kelahiran', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['data'] = $this->surat_kelahiran->getsuratkelahiran();
		$data['body'] = $this->load->view('view_surat_kelahiran', $data, true);
		$this->load->view('template', $data);
	}

	public function detail($id)
	{
		$data['data'] = $this->surat_kelahiran->getdetailsuratkelahiran($id);
		$data['body'] = $this->load->view('detail_surat_kelahiran', $data, true);
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('id_kelahiran', 'NIK', 'trim|required');
		$this->form_validation->set_rules('no_surat_kantor', 'No Surat Kantor', 'trim|required');
		$this->form_validation->set_rules('no_surat_kaling', 'No Surat Kaling', 'trim|required');
		$this->form_validation->set_rules('nama_kaling', 'Nama Kaling', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['body'] = $this->load->view('tambah_surat_kelahiran', '', true);
			$this->load->view('template', $data);
		}
		else
		{
			$lastid = $this->surat_kelahiran->simpan();

			redirect('surat_kelahiran/detail/'.$lastid,'refresh');
		}
	}

	public function cetak($id)
	{
		$data = $this->surat_kelahiran->getdetailsuratkelahiran($id)[0];
			
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(BASEPATH.'../assets/templatedoc/template1.docx');

		$templateProcessor->setValue('no_surat_kantor', $data->no_surat_kantor);
		$templateProcessor->setValue('nama_kaling', $data->nama_kaling);
		$templateProcessor->setValue('tgl_surat_kelahiran', $data->tgl_surat);
		$templateProcessor->setValue('no_surat_kaling', $data->no_surat_kaling);		
		$templateProcessor->setValue('nama_anak', $data->nama_anak);
		$templateProcessor->setValue('tempat_lahir_anak', $data->tempat_lahir_anak);
		$date=date_create($data->tgl_lahir_anak);
		$templateProcessor->setValue('tgl_lahir_anak', date_format($date,"d-m-Y"));
		// if($row->jk_anak == 1) :
  //         $jk="Laki-laki";
  //       else:
  //         $jk="Perempuan";
  //       endif;
		$templateProcessor->setValue('jk_anak', $data->jk_anak==1 ? 'Laki-laki' : 'Perempuan');
		$templateProcessor->setValue('alamat_anak', $data->alamat_anak);
		$templateProcessor->setValue('nama_ayah', $data->nama_ayah);
		$templateProcessor->setValue('tempat_lahir_ayah', $data->tempat_lahir_ayah);
		$date=date_create($data->tgl_lahir_ayah);
		$templateProcessor->setValue('tgl_lahir_ayah', date_format($date,"d-m-Y"));		
		$templateProcessor->setValue('pekerjaan_ayah', $data->pekerjaan_ayah);
		$templateProcessor->setValue('alamat_ayah', $data->alamat_ayah);
		$templateProcessor->setValue('nama_ibu', $data->nama_ibu);
		$templateProcessor->setValue('tempat_lahir_ibu', $data->tempat_lahir_ibu);
		$date=date_create($data->tgl_lahir_ibu);
		$templateProcessor->setValue('tgl_lahir_ibu', date_format($date,"d-m-Y"));		
		$templateProcessor->setValue('pekerjaan_ibu', $data->pekerjaan_ibu);
		$templateProcessor->setValue('alamat_ibu', $data->alamat_ibu);

		$templateProcessor->saveAs('assets/outputdoc/surat_lahir_' . $data->nik . '.docx');

		// Your browser will name the file "hasil.docx"
		// regardless of what it's named on the server 
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header("Content-Disposition: attachment; filename=surat_lahir_" . $data->nik . ".docx");
		readfile('assets/outputdoc/surat_lahir_' . $data->nik . '.docx'); // or echo file_get_contents($temp_file);
		unlink('assets/outputdoc/surat_lahir_' . $data->nik . '.docx');  // remove temp file
	}

	public function ajaxgetdetailbynik($nik)
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->surat_kelahiran->getdetailkelahiranbynik($nik)[0]);
		}
	}

	public function hapus($id)
	{
		$this->surat_kelahiran->hapus($id);
		redirect('surat_kelahiran','refresh');
	}
}