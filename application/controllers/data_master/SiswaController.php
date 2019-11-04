<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->model('SiswaStatusModel');
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
			$row[] = $ld->ta;
			$row[] = $ld->kelas;
			$row[] = $ld->jenis_kelamin;
			$row[] = $ld->nama_ortu;
			$row[] = '<td>
								<a class="btn-edit" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="siswaModal(' . $ld->siswa_id . ')">
									<i class="fa fa-edit"></i>
								</a>
								<a href="' . base_url() . 'data_master/siswa/page/status/' . $ld->siswa_id . '" style="color:green">
									<i class="fa fa-search"></i>
								</a>
								<a class="btn-delete" style="color:#f1c40f" data-toggle="tooltip" title="Delete" onclick="deleteRow(\'siswa_id\', ' . $ld->siswa_id . ', \'siswa\')">
									<i class="fa fa-trash"></i>
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
		foreach ($post as $k => $v) {
			if($k == 'ttl') { 
				$d[$k] = date('Y-m-d', strtotime($v));
			} else {
				$d[$k] = $v;
			}
		}
		$affected = ($d['siswa_id'] == 0) ? $this->SiswaModel->insertSiswa($d) : $this->SiswaModel->updateSiswa($d['siswa_id'], $d);

		$res = ($affected) ? true : false;
		echo json_encode($res);
	}

	public function getData()
	{
		$id = $this->input->get('siswa_id');
		$data = $this->SiswaModel->getSiswaById($id);
		echo json_encode($data);
	}


	// Status
	public function status($id)
	{
		$data['listTahunAjaran'] = $this->TahunAjaranModel->getTahunAjaran();
		$data['siswa'] = $this->SiswaModel->getSiswaById($id);

		$dataHtml1['html']['page'] = $this->load->view('pages/data_master/siswa/page_status', $data, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'siswa_status';

		$this->load->view('layout', $dataHtml2);
	}

	public function listDataSiswaStatus($siswa_id)
	{
		// filter
		$cond = [];
		$cond[] = ['siswa_id', $siswa_id, 'where'];

		// list data
		$listData = $this->SiswaStatusModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $ld->ta;
			$row[] = $ld->kelas;
			$row[] = ($ld->active == 1) ? '<small class="label bg-green">Aktif</small>' : '<small class="label bg-red">Tidak Aktif</small>';
			$row[] = '<td>
								<a class="btn-edit" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="siswaStatusEdit(' . $ld->siswa_status_id . ')">
									<i class="fa fa-edit"></i>
								</a>
							</td>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->SiswaStatusModel->count_filtered($cond),
			"recordsTotal" => $this->SiswaStatusModel->count_all($cond),
			"data" => $data
		];
		echo json_encode($output);
	}

	public function saveDataSiswaStatus()
	{
		$post = $this->input->post();
		$d = [];
		foreach ($post as $k => $v) {
			$d[$k] = $v;
		}

		if ($d['siswa_status_id'] == 0) {
			$affected = $this->SiswaStatusModel->insertSiswaStatus($d);
		} else {
			$vld = ($d['active'] == 1) ? $this->validateActivate($d['siswa_id']) : true;
			$affected = ($vld) ? $this->SiswaStatusModel->updateSiswaStatus($d['siswa_status_id'], $d) : 0;
		}

		$res = ($affected) ? true : false;
		echo json_encode($res);
	}

	public function getDataSiswaStatus()
	{
		$id = $this->input->get('siswa_status_id');
		$data = $this->SiswaStatusModel->getSiswaStatusById($id);
		echo json_encode($data);
	}

	private function validateActivate($id)
	{
		$count = $this->SiswaStatusModel->countValidate($id);
		$res = ($count == 0) ? true : false;
		return $res;
	}
}
