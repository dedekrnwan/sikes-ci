<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class JurnalModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 't_jurnal',
      'column_order' => [null, 'jurnal_type', 'total', 'keterangan', 'date_added'],
      'column_search' => ['jurnal_type', 'total', 'keterangan', 'date_added'],
      'order' => ['t_jurnal_id' => 'asc']
    ];
  }

  function countJurnal()
  {
    $this->db->select('*');
    $q = $this->db->get('t_jurnal');
    $res = $q->num_rows();

    return $res;
  }

  function getJurnal()
  {
    $this->db->select('*');
    $q = $this->db->get('t_jurnal');
    $res = $q->result_array();

    return $res;
  }

  function insertJurnal($d)
  {
    $this->db->insert('t_jurnal', $d);
    return $this->db->affected_rows();
  }

  function updateJurnal($id, $d)
  {
    $this->db->where('t_jurnal_id', $id);
    $this->db->update('t_jurnal', $d);
    return $this->db->affected_rows();
  }

  function getJurnalById($id)
  {
    $q = $this->db->get_where('t_jurnal', ['t_jurnal_id' => $id]);
    $res = $q->row_array();

    return $res;
  }

  function getJurnalSummary($date)
  {
    if ($date != 0) $param['date_added'] = $date;

    $param['jurnal_type'] = 'in';
    $d['total_in'] = $this->db->select('sum(total) as `total`')
      ->get_where('t_jurnal', $param)
      ->row_array()['total'];

    $param['jurnal_type'] = 'out';
    $d['total_out'] = $this->db->select('sum(total) as `total`')
      ->get_where('t_jurnal', $param)
      ->row_array()['total'];

    $d['total_balance'] = $d['total_in'] - $d['total_out'];
    
    foreach ($d as $k => $v) {
      $d[$k] = number_format($v);
    }
    return $d;
  }

  function getJurnalByParam($param)
  {
    $q = $this->db->get_where('t_jurnal', $param);
    $res = $q->result_array();

    return $res;
  }
}
