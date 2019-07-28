<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class SiswaStatusModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_siswa_status',
      'column_order' => [null, 'ta', 'kelas', 'active'],
      'column_search' => ['ta', 'kelas', 'active'],
      'order' => ['siswa_status_id' => 'asc']
    ];
  }

  function insertSiswaStatus($d)
  {
    $this->db->insert('siswa_status', $d);
    return $this->db->affected_rows();
  }

  function updateSiswaStatus($id, $d)
  {
    $this->db->where('siswa_status_id', $id);
    $this->db->update('siswa_status', $d);
    return $this->db->affected_rows();
  }

  function getSiswaStatusById($id) 
  {
    $q = $this->db->get_where('siswa_status', ['siswa_status_id' => $id]);
    $res = $q->row_array();

    return $res;
  }
}
