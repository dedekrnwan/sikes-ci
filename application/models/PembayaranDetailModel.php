<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PembayaranDetailModel extends CI_Model
{
  function sumThisMonth()
  {
    $month = date('m');
    $q = $this->db->select_sum('nominal')
      ->from('t_pembayaran_detail')
      ->where("DATE_FORMAT(date_added,'%m') =", $month)
      ->get();

    $res = number_format($q->row_array()['nominal']);
    return $res;
  }

  function sumLastMonth()
  {
    $today = date('Y-m-d');
    $month = date('m', strtotime('-1 months', strtotime($today))); 
    $q = $this->db->select_sum('nominal')
      ->from('t_pembayaran_detail')
      ->where("DATE_FORMAT(date_added,'%m') =", $month)
      ->get();

    $res = number_format($q->row_array()['nominal']);
    return $res;
  }

  function sumAll()
  {
    $q = $this->db->select_sum('nominal')
      ->from('t_pembayaran_detail')
      ->get();

    $res = number_format($q->row_array()['nominal']);
    return $res;
  }
}
