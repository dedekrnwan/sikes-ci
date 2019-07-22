<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('UserModel');
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		$d['html']['page'] = $this->load->view('auth/login', null, true);
		$d['html']['scriptjs'] = 'auth';
		$this->load->view('layout', $d);
	}

	public function loginSubmit()
	{
		$d = [];
		$d['username'] = $this->input->post('username');
		$d['password'] = md5($this->input->post('password'));

		$user =	$this->UserModel->getUser($d);
		$res = ($user != null) ? true : false;

		if($res == true) {
			$user = array(
				'user_id' => $user['user_id'],
				'username' => $user['username'],
				'role_id' => $user['role_id']
			);
			$this->session->set_userdata($user);
		}

		echo json_encode($res);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
