<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('template');
		// $this->load->model('User');
		// $this->load->library('form_validation');
		// if($this->session->has_userdata('user')){
		//         redirect('admin/home');
		// }
		//
		$this->data = [];
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		$data['html'] = $this->load->view('auth/login', null, true);
		$this->load->view('layout', $data);
	}
}
