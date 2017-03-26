<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// function __construct()
	// {
	// 	parent::__construct();

	// 	if(!$this->session->userdata('session'))
 //   		{
 //   			redirect('login', 'refresh');
 //   		}
	// }

	public function index()
	{
		$data['body'] = $this->load->view('dashboard', '', true);
		$this->load->view('template', $data);
	}
}