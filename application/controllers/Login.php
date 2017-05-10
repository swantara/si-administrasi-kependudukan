<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('user_model','user',TRUE);
	// }

	public function index()
	{
		if($this->session->userdata('session'))
   		{
   			redirect('dashboard', 'refresh');
   		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		if($this -> form_validation -> run() === false)
		{
			$this->load->view('login');
		}
		else
		{
			redirect('dashboard', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email');

		//query the database
		$result = $this->user->login($email, $password);

		if($result)
		{
			$user = $result[0];
			if($password == $user->pass)
			{
				$sess_array = array();
				$sess_array = array(
					'email' => $user->email,
					'id_user' => $user->id_user,
					'nama' => $user->nama,
					'status' => $user->status,
					'id_rs' => $user->id_rs,
					'namars' => $user->namars
					);
				$this->session->set_userdata('session', $sess_array);
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_database', 'Password salah');
				return false;
			}
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Username atau password salah');
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('session');
		session_destroy();
		redirect('login', 'refresh');
	}
}
