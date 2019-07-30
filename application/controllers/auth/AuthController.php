<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('UserModel');
		$this->load->model('SiswaModel');
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

	public function loginOrtu()
	{
		$d['html']['page'] = $this->load->view('auth/login_ortu', null, true);
		$d['html']['scriptjs'] = 'auth';
		$this->load->view('layout', $d);
	}

	public function loginSubmit()
	{
		$d = [];
		$type = $this->input->post('type');

		$d['username'] = $this->input->post('username');
		$d['password'] = ($type == 'admin') ? md5($this->input->post('password')) : $this->input->post('password');

		$res = ($type == 'admin') ? $this->processAdmin($d) : $this->processOrtu($d);

		echo json_encode($res);
	}

	private function processAdmin($d)
	{
		$user =	$this->UserModel->getUser($d);
		$res = ($user != null) ? true : false;

		if ($res == true) {
			$user = array(
				'user_id' => $user['user_id'],
				'username' => $user['username'],
				'role_id' => $user['role_id']
			);
			$this->session->set_userdata($user);
		}

		return $res;
	}

	private function processOrtu($d)
	{
		$siswa = $this->SiswaModel->getSiswaByParam(['nis' => $d['username'], 'ttl' => date('Y-m-d', strtotime($d['password']))])[0];
		$res = ($siswa != null) ? true : false;

		if ($res == true) {
			$data = array(
				'siswa_id' => $siswa['siswa_id'],
				'nis' => $siswa['nis'],
				'username' => $siswa['nama']
			);
			$this->session->set_userdata($data);
		}

		return $res;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
