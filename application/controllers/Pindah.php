<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pindah_model', 'pindah', true);
		$this->load->model('pendatang_model', 'pendatang', true);
		$this->load->model('penduduk_model', 'penduduk', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['data'] = $this->pindah->getpindah();
		$data['body'] = $this->load->view('view_pindah', $data, true);
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('alamat_tujuan', 'Alamat Tujuan', 'trim|required');		
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['provinsi'] = $this->pendatang->getprovinsi();
			$data['kabupaten'] = $this->pendatang->getkabupaten();
			$data['kecamatan'] = $this->pendatang->getkecamatan();
			$data['desa'] = $this->pendatang->getdesa();
			$data['banjar'] = $this->pendatang->getbanjar();
			$data['body'] = $this->load->view('tambah_pindah', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->pindah->simpan();
			redirect('pindah','refresh');
		}
	}

	public function detail($id)
	{
		$data['data'] = $this->pindah->getdetailpindah($id);
		$data['body'] = $this->load->view('detail_pindah', $data, true);
		$this->load->view('template', $data);
	}

	public function ajaxgetkepalakeluargabynkk($nkk)
	{
		if($this->input->is_ajax_request()){
			echo json_encode($this->pindah->getkepalakeluargabynkk($nkk)[0]);
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('alamat_tujuan', 'Alamat Tujuan', 'trim|required');		
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['provinsi'] = $this->pendatang->getprovinsiexclude('1');
			$data['kabupaten'] = $this->pendatang->getkabupatenexclude('1');
			$data['kecamatan'] = $this->pendatang->getkecamatanexclude('1');
			$data['desa'] = $this->pendatang->getdesaexclude('1');
			$data['banjar'] = $this->pendatang->getbanjarexclude('1');
			$data['agama'] = $this->penduduk->getagamaexclude('1');
			$data['pendidikan'] = $this->penduduk->getpendidikanexclude('1');
			$data['kawin'] = $this->penduduk->getstatuskawinexclude('1');
			$data['kependudukan'] = $this->penduduk->getstatuspendudukexclude('1');
			$data['data'] = $this->pindah->getdetailpindah($id)[0];
			$data['body'] = $this->load->view('edit_pindah', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->pindah->edit($id);
			redirect('pindah','refresh');
		}
	}

	public function hapus($id)
	{
		$this->pindah->hapus($id);
		redirect('pindah','refresh');
	}
}