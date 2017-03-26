<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kematian_model', 'kematian', true);

		// if(!$this->session->userdata('session'))
  //  		{
  //  			redirect('login', 'refresh');
  //  		}
	}

	public function index()
	{
		$data['data'] = $this->kematian->getkematian();
		$data['body'] = $this->load->view('view_kematian', $data, true);
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('tempat_meninggal', 'Tempat Meninggal', 'trim|required');
		$this->form_validation->set_rules('penyebab', 'Penyebab', 'trim|required');		
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['body'] = $this->load->view('tambah_kematian', '', true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->kematian->simpan();
			redirect('kematian','refresh');
		}
	}

	public function detail($id)
	{
		$data['data'] = $this->kematian->getdetailkematian($id);
		$data['body'] = $this->load->view('detail_kematian', $data, true);
		$this->load->view('template', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('tempat_meninggal', 'Tempat Meninggal', 'trim|required');
		$this->form_validation->set_rules('penyebab', 'Penyebab', 'trim|required');		
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['data'] = $this->kematian->getdetailkematian($id)[0];
			$data['body'] = $this->load->view('edit_kematian', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->kematian->edit($id);
			redirect('kematian','refresh');
		}
	}

	public function hapus($id)
	{
		$this->kematian->hapus($id);
		redirect('kematian','refresh');
	}
}