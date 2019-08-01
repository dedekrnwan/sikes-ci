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

  function countPembayaranDetail()
  {
    $this->db->select('*');
    $q = $this->db->get('t_pembayaran_detail');
    $res = $q->num_rows();

    return $res;
  }

  function insertPembayaranDetail($d)
  {
    $this->db->insert('t_pembayaran_detail', $d);
    return $this->db->insert_id();
  }

  function updatePembayaranDetail($id, $d)
  {
    $this->db->where('t_pembayaran_detail_id', $id);
    $this->db->update('t_pembayaran_detail', $d);
    return $this->db->affected_rows();
  }

  function getPembayaranDetailById($id) 
  {
    $q = $this->db->get_where('t_pembayaran_detail', ['t_pembayaran_detail_id' => $id]);
    $res = $q->row_array();

    return $res;
  }

  function getPembayaranDetailByParam($param)
  {
    $q = $this->db->get_where('t_pembayaran_detail', $param);
    $res = $q->result_array();

    return $res;
  }
}
