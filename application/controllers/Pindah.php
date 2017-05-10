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

	public function pencarian()
	{
		$data['data'] = $this->pindah->getpindah();
		$data['shdk'] = $this->pindah->getshdk();
		$data['agama'] = $this->pindah->getagama();
		$data['pendidikan'] = $this->pindah->getpendidikan();
		$data['kawin'] = $this->pindah->getstatuskawin();
		$data['kependudukan'] = $this->pindah->getstatuspenduduk();
		$data['body'] = $this->load->view('view_pindah_filter', $data, true);
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
			$data['provinsi'] = $this->pendatang->getprovinsi();
			$data['kabupaten'] = $this->pendatang->getkabupaten();
			$data['kecamatan'] = $this->pendatang->getkecamatan();
			$data['desa'] = $this->pendatang->getdesa();
			$data['banjar'] = $this->pendatang->getbanjar();
			$data['shdk'] = $this->penduduk->getshdk();
			$data['agama'] = $this->penduduk->getagama();
			$data['pendidikan'] = $this->penduduk->getpendidikan();
			$data['kawin'] = $this->penduduk->getstatuskawin();
			$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
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