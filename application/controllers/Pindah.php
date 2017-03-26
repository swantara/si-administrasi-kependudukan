<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pindah_model', 'pindah', true);

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
			$data['body'] = $this->load->view('tambah_pindah', '', true);
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

	public function edit($id)
	{
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('alamat_tujuan', 'Alamat Tujuan', 'trim|required');		
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
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