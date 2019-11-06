<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class TarifTipeSpesificModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_tarif_tipe_spesific',
      'column_order' => [null, 'nis', 'nama'],
      'column_search' => ['nis', 'nama'],
      'order' => ['tarif_tipe_spesific_id' => 'asc']
    ];
  }

  function countTarifTipeSpesific()
  {
    $this->db->select('*');
    $q = $this->db->get('v_tarif_tipe_spesific');
    $res = $q->num_rows();

    return $res;
  }

  function getTarifTipeSpesific()
  {
    $this->db->select('*');
    $q = $this->db->get('tarif_tipe_spesific');
    $res = $q->result_array();

    return $res;
  }

  function insertTarifTipeSpesific($d)
  {
    $this->db->insert('tarif_tipe_spesific', $d);
    return $this->db->affected_rows();
  }

  function updateTarifTipeSpesific($id, $d)
  {
    $this->db->where('tarif_tipe_spesific_id', $id);
    $this->db->update('tarif_tipe_spesific', $d);
    return $this->db->affected_rows();
  }

  function getTarifTipeSpesificById($id)
  {
    $q = $this->db->get_where('tarif_tipe_spesific', ['tarif_tipe_spesific_id' => $id]);
    $res = $q->row_array();

    return $res;
  }

  function getTarifTipeSpesificByParam($param)
  {
    $q = $this->db->get_where('v_tarif_tipe_spesific', $param);
    $res = $q->result_array();

    return $res;
  }
}
