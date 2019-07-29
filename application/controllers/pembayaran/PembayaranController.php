<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranController extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PembayaranModel');
		$this->load->model('TahunAjaranModel');
		$this->load->model('TransactionTypeModel');
		$this->load->model('PembayaranDetailModel');
		if (!$this->session->has_userdata('user_id')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['listTahunAjaran'] = $this->TahunAjaranModel->getTahunAjaran();
		$data['listTransactionType'] = $this->TransactionTypeModel->getTransactionType();

		$dataHtml1['html']['page'] = $this->load->view('pages/pembayaran/page', $data, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'pembayaran';

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
		$listData = $this->PembayaranModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $ld->nis;
			$row[] = $ld->nama;
			$row[] = ($ld->status == 'bulanan') ? '<small class="label bg-green">' . $ld->transaction_type . '</small>' : '<small class="label bg-blue">' . $ld->transaction_type . '</small>';
			$row[] = $ld->tarif_tipe;
			$row[] = $ld->ta;
			$row[] = $ld->kelas;
			$row[] = $ld->bulan_ke;
			$row[] = 'Rp '.number_format($ld->nominal_sisa);
			$row[] = ($ld->status == 'lunas') ? '<small class="label bg-green">Lunas</small>' : '<small class="label bg-red">Belum Lunas</small>';
			$row[] = '<td>
								<a style="color:#f56954" data-toggle="tooltip" title="Bayar" onclick="underConstruct()" onclicks="show_bayar_bulanan()">
									<i class="fa fa-money"></i>
								</a>
								<a style="color:#00c0ef" data-toggle="tooltip" title="History Pembayaran" onclick="historyPembayaran('.$ld->t_pembayaran_id.')">
									<i class="fa fa-history"></i>
								</a>
							</td>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->PembayaranModel->count_filtered($cond),
			"recordsTotal" => $this->PembayaranModel->count_all($cond),
			"data" => $data
		];
		echo json_encode($output);
	}

	public function getHistory() {
		$id = $this->input->get('t_pembayaran_id');
		$dHistory = $this->PembayaranDetailModel->getPembayaranDetailByParam(['t_pembayaran_id' => $id]);
		
		$res = '';
		$no = 0;
		foreach($dHistory as $dh) {
			$no++;
			$res .= '<tr>';	
			$res .= '<td>'.$no.'</td>';
			$res .= '<td>'.$dh['date_added'].'</td>';
			$res .= '<td>Rp '.number_format($dh['nominal']).'</td>';
			$res .= '</tr>';
		}
		echo $res;
	}
}
