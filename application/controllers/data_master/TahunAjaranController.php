<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TahunAjaranController extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TahunAjaranModel');
		if (!$this->session->has_userdata('user_id')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$dataHtml1['html']['page'] = $this->load->view('pages/data_master/tahun_ajaran/page', null, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'ta';

		$this->load->view('layout', $dataHtml2);
	}

	public function listData()
	{
		// filter
		$cond = [];

		// list data
		$listData = $this->TahunAjaranModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $ld->ta;
			$row[] = '<td>
								<a class="btn-edit" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="taModal('.$ld->ta_id.')">
									<i class="fa fa-edit"></i>
								</a>
							</td>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->TahunAjaranModel->count_filtered($cond),
			"recordsTotal" => $this->TahunAjaranModel->count_all($cond),
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
		$affected = ($d['ta_id'] == 0) ? $this->TahunAjaranModel->insertTahunAjaran($d) : $this->TahunAjaranModel->updateTahunAjaran($d['ta_id'], $d);	

		$res = ($affected) ? true : false;
		echo json_encode($res);
	}

	public function getData()
	{
		$id = $this->input->get('ta_id');
		$data = $this->TahunAjaranModel->getTahunAjaranById($id);
		echo json_encode($data);
	}


}
