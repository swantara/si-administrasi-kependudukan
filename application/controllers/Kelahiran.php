<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kelahiran_model', 'kelahiran', true);
		$this->load->model('penduduk_model', 'penduduk', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['data'] = $this->kelahiran->getkelahiran();
		$data['body'] = $this->load->view('view_kelahiran', $data, true);
		$this->load->view('template', $data);
	}

	public function pencarian()
	{
		$data['data'] = $this->kelahiran->getkelahiran();
		$data['shdk'] = $this->penduduk->getshdk();
		$data['agama'] = $this->penduduk->getagama();
		$data['pendidikan'] = $this->penduduk->getpendidikan();
		$data['kawin'] = $this->penduduk->getstatuskawin();
		$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
		$data['body'] = $this->load->view('view_kelahiran_filter', $data, true);
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('periode_data', 'Periode Data', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nkk', 'NKK', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'trim|required');
		$this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'trim|required');
		$this->form_validation->set_rules('nik_saksi_I', 'NIK Saksi I', 'trim|required');
		$this->form_validation->set_rules('nik_saksi_II', 'NIK Saksi II', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['shdk'] = $this->penduduk->getshdk();
			$data['agama'] = $this->penduduk->getagama();
			$data['pendidikan'] = $this->penduduk->getpendidikan();
			$data['kawin'] = $this->penduduk->getstatuskawin();
			$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
			$data['body'] = $this->load->view('tambah_kelahiran', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->kelahiran->simpan();
			redirect('kelahiran','refresh');
		}
	}

	public function detail($id)
	{
		$data['data'] = $this->kelahiran->getdetailkelahiran($id);
		$data['body'] = $this->load->view('detail_kelahiran', $data, true);
		$this->load->view('template', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('periode_data', 'Periode Data', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nkk', 'NKK', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'trim|required');
		$this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'trim|required');
		$this->form_validation->set_rules('nik_saksi_I', 'NIK Saksi I', 'trim|required');
		$this->form_validation->set_rules('nik_saksi_II', 'NIK Saksi II', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['data'] = $this->kelahiran->getdetailkelahiran($id)[0];			
			$data['shdk'] = $this->penduduk->getshdk();
			$data['agama'] = $this->penduduk->getagama();
			$data['pendidikan'] = $this->penduduk->getpendidikan();
			$data['kawin'] = $this->penduduk->getstatuskawin();
			$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
			$data['body'] = $this->load->view('edit_kelahiran', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->kelahiran->edit($id);
			redirect('kelahiran/detail/'.$id,'refresh');
		}
	}

	public function hapus($id)
	{
		$this->kelahiran->hapus($id);
		redirect('kelahiran','refresh');
	}
}