<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TipeTarifController extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TarifTipeModel');
		$this->load->model('TarifNilaiModel');
		$this->load->model('TransactionTypeModel');
		$this->load->model('TahunAjaranModel');
		if (!$this->session->has_userdata('user_id')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['listTransactionType'] = $this->TransactionTypeModel->getTransactionType();

		$dataHtml1['html']['page'] = $this->load->view('pages/data_master/tipe_tarif/page', $data, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'tarif_tipe';
		$this->load->view('layout', $dataHtml2);
	}

	public function listData()
	{
		// filter
		$cond = [];

		// list data
		$listData = $this->TarifTipeModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = ($ld->transaction_type == 'bulanan') 
								? '<small class="label bg-green">'.$ld->transaction_type.'</small>' 
								: '<small class="label bg-blue">'.$ld->transaction_type.'</small>'; 
			$row[] = $ld->tarif_tipe;
			$row[] = '<td>
								<a class="btn-edit" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="tarifTipeModal(' . $ld->tarif_tipe_id . ')">
									<i class="fa fa-edit"></i>
								</a>
								<a style="color:#00c0ef" data-toggle="tooltip" title="Sync Data Tunggakan" onclick="underConstruct()">
									<i class="fa fa-refresh"></i>
								</a>
								<a href="'.base_url().'data_master/tipe_tarif/page/tarif_nilai/'.$ld->tarif_tipe_id.'" style="color:#00a65a" data-toggle="tooltip" title="Detail Data Per Kelas & TA">
									<i class="fa fa-search"></i>
								</a>
							</td>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->TarifTipeModel->count_filtered($cond),
			"recordsTotal" => $this->TarifTipeModel->count_all($cond),
			"data" => $data
		];
		echo json_encode($output);
	}

	public function saveData()
	{
		$post = $this->input->post();
		$d = [];
		foreach ($post as $k => $v) {
			$d[$k] = $v;
		}
		$affected = ($d['tarif_tipe_id'] == 0) ? $this->TarifTipeModel->insertTarifTipe($d) : $this->TarifTipeModel->updateTarifTipe($d['tarif_tipe_id'], $d);

		$res = ($affected) ? true : false;
		echo json_encode($res);
	}

	public function getData()
	{
		$id = $this->input->get('tarif_tipe_id');
		$data = $this->TarifTipeModel->getTarifTipeById($id);
		echo json_encode($data);
	}

	// Tarif Nilai
	public function tarif_nilai($tarif_tipe_id)
	{
		$data['listTahunAjaran'] = $this->TahunAjaranModel->getTahunAjaran();
		$data['tarifTipe'] = $this->TarifTipeModel->getTarifTipeById($tarif_tipe_id);
		
		$dataHtml1['html']['page'] = $this->load->view('pages/data_master/tipe_tarif/tarif_nilai', $data, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'tarif_nilai';

		$this->load->view('layout', $dataHtml2);
	}

	public function listDataTarifNilai($tarif_tipe_id)
	{
		// filter
		$cond = [];
		$cond[] = ['tarif_tipe_id', $tarif_tipe_id, 'where'];

		// list data
		$listData = $this->TarifNilaiModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $ld->ta;
			$row[] = $ld->kelas;
			$row[] = 'Rp '.number_format($ld->nominal);
			$row[] = ($ld->active == 1) ? '<small class="label bg-green">Aktif</small>' : '<small class="label bg-red">Tidak Aktif</small>';
			$row[] = '<td>
								<a class="btn-edit" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="tarifNilaiEdit(' . $ld->tarif_nilai_id . ')">
									<i class="fa fa-edit"></i>
								</a>
							</td>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->TarifNilaiModel->count_filtered($cond),
			"recordsTotal" => $this->TarifNilaiModel->count_all($cond),
			"data" => $data
		];
		echo json_encode($output);
	}

	public function saveDataTarifNilai()
	{
		$post = $this->input->post();
		$d = [];
		foreach ($post as $k => $v) {
			$d[$k] = $v;
		}
		$affected = ($d['tarif_nilai_id'] == 0) ? $this->TarifNilaiModel->insertTarifNilai($d) : $this->TarifNilaiModel->updateTarifNilai($d['tarif_nilai_id'], $d);

		$res = ($affected) ? true : false;
		echo json_encode($res);
	}

	public function getDataTarifNilai()
	{
		$id = $this->input->get('tarif_nilai_id');
		$data = $this->TarifNilaiModel->getTarifNilaiById($id);
		echo json_encode($data);
	}
}
