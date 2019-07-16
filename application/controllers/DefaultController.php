<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DefaultController extends CI_Controller
{
	public function index()
	{
		redirect('auth/login');
	}
}
