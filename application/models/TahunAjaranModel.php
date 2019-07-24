<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class TahunAjaranModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'ta',
      'column_order' => [null, 'ta'],
      'column_search' => ['ta'],
      'order' => ['ta_id' => 'asc']
    ];
  }

  function countTahunAjaran()
  {
    $this->db->select('*');
    $q = $this->db->get('ta');
    $res = $q->num_rows();

    return $res;
  }

  function getTahunAjaran()
  {
    $this->db->select('*');
    $q = $this->db->get('ta');
    $res = $q->result_array();

    return $res;
  }

  function insertTahunAjaran($d)
  {
    $this->db->insert('ta', $d);
    return $this->db->affected_rows();
  }

  function updateTahunAjaran($id, $d)
  {
    $this->db->where('ta_id', $id);
    $this->db->update('ta', $d);
    return $this->db->affected_rows();
  }

  function getTahunAjaranById($id)
  {
    $q = $this->db->get_where('ta', ['ta_id' => $id]);
    $res = $q->row_array();

    return $res;
  }
}
