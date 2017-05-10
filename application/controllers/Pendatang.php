<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pendatang_model', 'pendatang', true);
		$this->load->model('penduduk_model', 'penduduk', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['data'] = $this->pendatang->getpendatang();
		$data['body'] = $this->load->view('view_pendatang', $data, true);
		$this->load->view('template', $data);
	}

	public function pencarian()
	{
		$data['data'] = $this->pendatang->getpendatang();
		$data['shdk'] = $this->penduduk->getshdk();
		$data['agama'] = $this->penduduk->getagama();
		$data['pendidikan'] = $this->penduduk->getpendidikan();
		$data['kawin'] = $this->penduduk->getstatuskawin();
		$data['kependudukan'] = $this->penduduk->getstatuspenduduk();
		$data['body'] = $this->load->view('view_pendatang_filter', $data, true);
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_penduduk', 'Nama Penduduk', 'trim|required');
		$this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['provinsi'] = $this->pendatang->getprovinsi();
			$data['kabupaten'] = $this->pendatang->getkabupaten();
			$data['kecamatan'] = $this->pendatang->getkecamatan();
			$data['desa'] = $this->pendatang->getdesa();
			$data['banjar'] = $this->pendatang->getbanjar();
			$data['body'] = $this->load->view('tambah_pendatang', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->pendatang->simpan();
			redirect('pendatang','refresh');
		}
	}

	public function detail($id)
	{
		$data['data'] = $this->pendatang->getdetailpendatang($id);
		$data['body'] = $this->load->view('detail_pendatang', $data, true);
		$this->load->view('template', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'trim|required');
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
			$data['data'] = $this->pendatang->getdetailpendatang($id)[0];
			$data['body'] = $this->load->view('edit_pendatang', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->pendatang->edit($id);
			redirect('pendatang/detail/'.$id,'refresh');
		}
	}

	public function hapus($id)
	{
		$this->pendatang->hapus($id);
		redirect('pendatang','refresh');
	}
}