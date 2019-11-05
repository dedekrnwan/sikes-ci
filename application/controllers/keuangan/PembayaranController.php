<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PembayaranModel');
		$this->load->model('TahunAjaranModel');
		$this->load->model('TransactionTypeModel');
		$this->load->model('TarifTipeModel');
		$this->load->model('PembayaranDetailModel');
		$this->load->model('MessageSentModel');
		$this->load->model('ConfigModel');
		$this->load->model('JurnalModel');
		if (!($this->session->has_userdata('user_id') || $this->session->has_userdata('siswa_id'))) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['listTahunAjaran'] = $this->TahunAjaranModel->getTahunAjaran();
		$data['listTransactionType'] = $this->TransactionTypeModel->getTransactionType();
		$data['listTarifTipe'] = $this->TarifTipeModel->getTarifTipe();

		$dataHtml1['html']['page'] = $this->load->view('pages/keuangan/page_pembayaran', $data, true);
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
		// siswa
		if ($this->session->has_userdata('nis')) {
			$cond[] = ['nis', $this->session->userdata('nis'), 'where'];
		}

		// list data
		$listData = $this->PembayaranModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$no++;
			$row = [];

			// btn aksi
			$byrBtn = ($ld->nominal_sisa != 0 && $this->session->has_userdata('user_id')) ?
				'<a style="color:#f56954" data-toggle="tooltip" title="Bayar" 
					onclick="pembayaranModal(' . $ld->t_pembayaran_id . ')">
					<i class="fa fa-money"></i>
				</a>' : '';
			$historyBtn = ($ld->nominal_bayar != 0) ?
				'<a style="color:#00c0ef" data-toggle="tooltip" title="History Pembayaran" 
					onclick="historyPembayaran(' . $ld->t_pembayaran_id . ')">
					<i class="fa fa-history"></i>
				</a>' : '';

			$row[] = $no;
			$row[] = $ld->nis;
			$row[] = $ld->nama;
			$row[] = ($ld->transaction_type == 'bulanan') ? '<small class="label bg-green">' . $ld->transaction_type . '</small>' : '<small class="label bg-blue">' . $ld->transaction_type . '</small>';
			$row[] = $ld->tarif_tipe;
			$row[] = $ld->ta;
			$row[] = $ld->kelas;
			$row[] = $ld->bulan_ke;
			$row[] = 'Rp ' . number_format($ld->nominal_sisa);
			$row[] = ($ld->status == 'lunas') ? '<small class="label bg-green">Lunas</small>' : '<small class="label bg-red">Belum Lunas</small>';
			$row[] = '<td>' . $byrBtn . $historyBtn . '</td>';
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

	public function getHistory()
	{
		$id = $this->input->get('t_pembayaran_id');
		$dHistory = $this->PembayaranDetailModel->getPembayaranDetailByParam(['t_pembayaran_id' => $id]);

		$res = '';
		$no = 0;
		foreach ($dHistory as $dh) {
			$no++;
			$res .= '<tr>';
			$res .= '<td>' . $no . '</td>';
			$res .= '<td>' . $dh['date_added'] . '</td>';
			$res .= '<td>Rp ' . number_format($dh['nominal']) . '</td>';
			$res .= '</tr>';
		}
		echo $res;
	}

	public function getPembayaran()
	{
		$id = $this->input->get('t_pembayaran_id');
		$d = $this->PembayaranModel->getPembayaranByParam(['t_pembayaran_id' => $id])[0];
		$res['transaction_type_id'] = $d['transaction_type_id'];
		if ($d['transaction_type_id'] == 1) {
			$res['nominal'] = $d['nominal'];
		} else {
			$res['nominal'] = ($d['nominal_bayar'] == 0) ? $d['nominal_min'] : 0;
		}

		echo json_encode($res);
	}

	public function getBalanceSms()
	{
		$d['balanceSms'] = 'Rp ' . number_format($this->ConfigModel->getConfig()['balance_sms']);
		echo json_encode($d);
	}

	public function savePembayaran()
	{
		if (!$this->session->has_userdata('user_id')) echo json_encode(false);
		$res = true;
		$post = $this->input->post();
		$d = [];
		foreach ($post as $k => $v) {
			$d[$k] = $v;
		}

		// check nominal
		$id = $d['t_pembayaran_id'];
		$check = $this->PembayaranModel->getPembayaranByParam(['t_pembayaran_id' => $id])[0];
		if ($check['nominal_sisa'] < $d['nominal']) {
			$res = false;
		} else {
			$dPmbyrDet = [
				't_pembayaran_id' => $id,
				'nominal' => $d['nominal'],
				'date_added' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('user_id')
			];
			$dPmbyr = [
				'nominal_bayar' => $check['nominal_bayar'] + $d['nominal']
			];
			$last_id = $this->PembayaranDetailModel->insertPembayaranDetail($dPmbyrDet);
			$affected = $this->PembayaranModel->updatePembayaran($id, $dPmbyr);

			// save jurnal
			$dJurnal = [
				'tarif_tipe_id' => $check['tarif_tipe_id'],
				'tarif_nilai_id' => $check['tarif_nilai_id'],
				'jurnal_type' => 'in',
				'total' => $d['nominal'],
				'keterangan' => '(' . $check['nis'] . ') ' . $check['nama'] . ' membayar ' . $check['tarif_tipe'] . ' untuk ta ' . $check['ta'] . ' kelas ' . $check['kelas']. ' bulan ke '.$check['bulan_ke'],
				'date_added' => date('Y-m-d'),
				'active' => 1
			];
			$this->JurnalModel->insertJurnal($dJurnal);

			// send message
			$this->sendMsgBayar($last_id, $check, $d['nominal']);
		}

		// $res = ($affected) ? true : false;
		echo json_encode(true);
	}

	private function sendMsgBayar($last_id, $d, $nominal)
	{
		// send msg
		$bulan = ($d['transaction_type'] == 'bulanan') ? 'bulan ke ' . $d['bulan_ke'] : '';
		$msg = 'Pembayaran untuk ' . $d['tarif_tipe'] . ' ' . $bulan . ' yang dilakukan oleh siswa bernama ' . $d['nama'] . '(' . $d['nis'] . ') sebesar Rp ' . number_format($nominal) . ' telah kami terima';
		$this->sendMsg($d['no_ortu'], $msg);

		// upd balance
		$getBlnc = $this->checkBalanceSms();
		$dBlnc = ['balance_sms' => $getBlnc];
		$upd = $this->ConfigModel->updateConfig($dBlnc);

		// ins msg sent
		$dMsgSent = [
			't_pembayaran_detail_id' => $last_id,
			'siswa_id' => $d['siswa_id'],
			'no_ortu' => $d['no_ortu'],
			'message_type' => 'pembayaran',
			'message_text' => $msg,
			'date_added' => date('Y-m-d H:i:s'),
			'date_modified' => date('Y-m-d H:i:s'),
			'created_by' => $this->session->userdata('user_id')
		];
		$res = $this->MessageSentModel->insertMessageSent($dMsgSent);
		return $res;
	}

	/*** TOOLS ***/
	/*
		$number = 6287xxx,
		$msg = String
	*/
	private function sendMsg($number, $msg)
	{
		$cSess = curl_init();
		$user = 'AvrielDG';
		$key = 'd14206dae11253222bdaa88d910f585e';

		$msg = urlencode(stripslashes(utf8_encode($msg)));
		$url = "http://sms241.xyz/sms/smsmasking.php?username=$user&key=$key&number=$number&message=$msg";

		curl_setopt($cSess, CURLOPT_URL, $url);
		curl_setopt($cSess, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cSess, CURLOPT_HEADER, false);
		$result = curl_exec($cSess);
		curl_close($cSess);

		return $result;
	}

	private function checkBalanceSms()
	{
		$apikey      = 'd14206dae11253222bdaa88d910f585e'; // api key 
		$urlendpoint = 'http://sms241.xyz/sms/api_sms_masking_balance_json.php'; // url endpoint api

		$senddata = array('apikey' => $apikey);

		// get balance  
		$data = json_encode($senddata);
		$curlHandle = curl_init($urlendpoint);
		curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(
			$curlHandle,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data)
			)
		);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
		$responjson = curl_exec($curlHandle);
		curl_close($curlHandle);
		$responjson = json_decode($responjson, true);
		return $responjson['balance_respon'][0]['balance'];
	}
}
