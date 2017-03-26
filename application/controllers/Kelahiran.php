<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kelahiran_model', 'kelahiran', true);

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

	public function tambah()
	{
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');

		if($this->form_validation->run() === false)
		{
			$data['body'] = $this->load->view('tambah_kelahiran', '', true);
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
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		
		if($this->form_validation->run() === false)
		{
			$data['data'] = $this->kelahiran->getdetailkelahiran($id)[0];
			$data['body'] = $this->load->view('edit_kelahiran', $data, true);
			$this->load->view('template', $data);
		}
		else
		{
			$this->kelahiran->edit($id);
			redirect('kelahiran','refresh');
		}
	}

	public function hapus($id)
	{
		$this->kelahiran->hapus($id);
		redirect('kelahiran','refresh');
	}
}