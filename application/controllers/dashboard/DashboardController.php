<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->model('TahunAjaranModel');
		$this->load->model('TarifTipeModel');
		$this->load->model('UserModel');
		$this->load->model('JurnalModel');

		$this->load->model('PembayaranDetailModel');
		if (!$this->session->has_userdata('user_id')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['countSiswa'] = $this->SiswaModel->countSiswa();
		$data['countTahunAjaran'] = $this->TahunAjaranModel->countTahunAjaran();
		$data['countTarifTipe'] = $this->TarifTipeModel->countTarifTipe();
		$data['countUser'] = $this->UserModel->countUser();
		$data['summary'] = $this->JurnalModel->getJurnalSummary(0);

		$dataHtml1['html']['page'] = $this->load->view('pages/dashboard/page', $data, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$this->load->view('layout', $dataHtml2);
	}
}
