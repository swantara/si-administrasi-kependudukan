<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model', 'penduduk', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}

		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data['data'] = $this->penduduk->getpenduduk();
		$data['body'] = $this->load->view('view_penduduk', $data, true);
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
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['shdk'] = $this->penduduk->getshdk();
			$data['agama'] = $this->penduduk->getagama();
			$data['pendidikan'] = $this->penduduk->getpendidikan();
			$data['kawin'] = $this->penduduk->getstatuskawin();
			$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
			$data['body'] = $this->load->view('tambah_penduduk', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->penduduk->simpan();
			redirect('penduduk','refresh');
		}
	}

	public function detail($id)
	{
		$data['data'] = $this->penduduk->getdetailpenduduk($id);
		$data['body'] = $this->load->view('detail_penduduk', $data, true);
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
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['data'] = $this->penduduk->getdetailpenduduk($id)[0];
			$data['shdk'] = $this->penduduk->getshdkexclude('1');
			$data['agama'] = $this->penduduk->getagamaexclude('1');
			$data['pendidikan'] = $this->penduduk->getpendidikanexclude('1');
			$data['kawin'] = $this->penduduk->getstatuskawinexclude('1');
			$data['kependudukan'] = $this->penduduk->getstatuspendudukexclude('1');
			$data['body'] = $this->load->view('edit_penduduk', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->penduduk->edit($id);
			redirect('penduduk','refresh');
		}
	}

	public function hapus($id)
	{
		$this->penduduk->hapus($id);
		redirect('penduduk','refresh');
	}
}