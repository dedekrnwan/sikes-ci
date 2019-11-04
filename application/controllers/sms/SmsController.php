<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SmsController extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MessageSentModel');
		if (!$this->session->has_userdata('user_id')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$dataHtml1['html']['page'] = $this->load->view('pages/sms/page', null, true);
		$dataHtml2['html']['page'] = $this->load->view('pages/layout', $dataHtml1, true);
		$dataHtml2['html']['scriptjs'] = 'sms';
		$this->load->view('layout', $dataHtml2);
	}

	public function listData()
	{
		// filter
		$cond = [];
		$query = json_decode($this->input->post('query'), true);
		if (!empty($query)) {
			foreach ($query as $k => $v) {
				if($k == 'message_type') {
					$cond[] = [$v['name'], $v['value'], 'where'];
				}
				if($k == 'date_from') {
					$date = date('Y-m-d', strtotime($v['value']));
					$cond[] = ['date_added2 >=', $date, 'where'];
				}
				if($k == 'date_until') {
					$date = date('Y-m-d', strtotime($v['value']));
					$cond[] = ['date_added2 <=', $date, 'where'];
				}			
			}
		}

		// list data
		$listData = $this->MessageSentModel->get_datatables($cond);
		$data = [];
		$no = $_POST['start'];
		foreach ($listData as $ld) {
			$label = ($ld->message_type == 'pembayaran') ? 'green' : 'red';
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = '<small class="label bg-'.$label.'">'.$ld->message_type.'</small>';
			$row[] = $ld->date_added;
			$row[] = $ld->nis;
			$row[] = $ld->nama;
			$row[] = $ld->no_ortu;
			$row[] = $ld->tarif_tipe;
			$row[] = 'Rp '.number_format($ld->nominal);
			$row[] = $ld->message_text;
			$row[] = '<a class="btn-delete" style="color:#f1c40f" data-toggle="tooltip" title="Delete" onclick="deleteRow(\'message_sent_id\', ' . $ld->message_sent_id . ', \'message_sent\')">
									<i class="fa fa-trash"></i>
								</a>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->MessageSentModel->count_filtered($cond),
			"recordsTotal" => $this->MessageSentModel->count_all($cond),
			"data" => $data
		];
		echo json_encode($output);
	}
}
