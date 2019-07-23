<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->model('TahunAjaranModel');
		if (!$this->session->has_userdata('user_id')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['listTahunAjaran'] = $this->TahunAjaranModel->getTahunAjaran();
		$data['listKelas'] = [1, 2, 3];

		$dataHtml1['html']['page'] = $this->load->view('pages/data_master/siswa/page', $data, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'siswa';

		$this->load->view('layout', $dataHtml2);
	}

	public function status()
	{
		$dataHtml1['html']['page'] = $this->load->view('pages/data_master/siswa/page_status', null, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$this->load->view('layout', $dataHtml2);
	}

	public function listData()
	{
		// filter
		$cond = [];
		$query = json_decode($this->input->post('query'), true);
		if (!empty($query)) {
			foreach ($query as $k => $v) {
				$cond[] = [$v['name'], $v['value'], 'where'];
			}
		}

		// list data
		$listData = $this->SiswaModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $ld->nis;
			$row[] = $ld->nama;
			$row[] = $ld->jenis_kelamin;
			$row[] = $ld->nama_ortu;
			$row[] = ($ld->active == 1) ? '<small class="label bg-green">Aktif</small>' : '<small class="label bg-red">Tidak Aktif</small>';
			$row[] = '<td>
								<a btn-modal data-siswa_id="'.$ld->siswa_id.'" href="#" style="color:#f56954" data-toggle="tooltip" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
								<a href="' . base_url() . 'data_master/siswa/page/status" style="color:green">
									<i class="fa fa-search"></i>
								</a>
							</td>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->SiswaModel->count_filtered($cond),
			"recordsTotal" => $this->SiswaModel->count_all($cond),
			"data" => $data
		];
		echo json_encode($output);
	}

	public function saveData()
	{
		$post = $this->input->post();
		$d = [];
		foreach($post as $k => $v) {
			$d[$k] = $v;
		}
		$affected = ($d['siswa_id'] == 0) ? $this->SiswaModel->insertSiswa($d) : $this->SiswaModel->saveSiswa($d);	

		$res = ($affected) ? true : false;
		echo json_encode($res);
	}
}
