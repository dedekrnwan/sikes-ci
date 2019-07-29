<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class PembayaranModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_pembayaran',
      'column_order' => [null, 'nis', 'nama', 'tarif_tipe', 'ta', 'kelas', 'bulan_ke', 'nominal_sisa', 'status'],
      'column_search' => ['nis', 'nama', 'tarif_tipe', 'ta', 'kelas', 'bulan_ke', 'nominal_sisa', 'status'],
      'order' => ['t_pembayaran_id' => 'asc']
    ];
  }

  function countPembayaran()
  {
    $this->db->select('*');
    $q = $this->db->get('t_pembayaran');
    $res = $q->num_rows();

    return $res;
  }

  function insertPembayaran($d)
  {
    $this->db->insert('t_pembayaran', $d);
    return $this->db->affected_rows();
  }

  function updatePembayaran($id, $d)
  {
    $this->db->where('t_pembayaran_id', $id);
    $this->db->update('t_pembayaran', $d);
    return $this->db->affected_rows();
  }

  function getPembayaranById($id) 
  {
    $q = $this->db->get_where('t_pembayaran', ['t_pembayaran_id' => $id]);
    $res = $q->row_array();

    return $res;
  }

  function getPembayaranByParam($param)
  {
    $q = $this->db->get_where('v_pembayaran', $param);
    $res = $q->result_array();

    return $res;
  }

}
