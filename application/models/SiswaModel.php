<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class SiswaModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_siswa',
      'column_order' => [null, 'nis', 'nama', 'jenis_kelamin', 'nama_ortu', 'active'],
      'column_search' => ['nis', 'nama', 'jenis_kelamin', 'nama_ortu', 'active'],
      'order' => ['siswa_id' => 'asc']
    ];
  }

  function countSiswa()
  {
    $this->db->select('*');
    $q = $this->db->get('v_siswa');
    $res = $q->num_rows();

    return $res;
  }

  function insertSiswa($d)
  {
    $this->db->insert('siswa', $d);
    return $this->db->affected_rows();
  }

  function updateSiswa($id, $d)
  {
    $this->db->where('siswa_id', $id);
    $this->db->update('siswa', $d);
    return $this->db->affected_rows();
  }

  function getSiswaById($id)
  {
    $q = $this->db->get_where('siswa', ['siswa_id' => $id]);
    $res = $q->row_array();
    $res['ttl'] = date('m-d-Y', strtotime($res['ttl']));

    return $res;
  }

  function getSiswaByParam($param)
  {
    $q = $this->db->get_where('v_siswa', $param);
    $res = $q->result_array();

    return $res;
  }
}
