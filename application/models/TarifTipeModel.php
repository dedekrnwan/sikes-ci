<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class TarifTipeModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_tarif_tipe',
      'column_order' => [null, 'transaction_type', 'tarif_tipe'],
      'column_search' => ['transaction_type', 'tarif_tipe'],
      'order' => ['tarif_tipe_id' => 'asc']
    ];
  }

  function countTarifTipe()
  {
    $this->db->select('*');
    $q = $this->db->get('tarif_tipe');
    $res = $q->num_rows();

    return $res;
  }

  function getTarifTipe()
  {
    $this->db->select('*');
    $q = $this->db->get('tarif_tipe');
    $res = $q->result_array();

    return $res;
  }

  function insertTarifTipe($d)
  {
    $this->db->insert('tarif_tipe', $d);
    return $this->db->affected_rows();
  }

  function updateTarifTipe($id, $d)
  {
    $this->db->where('tarif_tipe_id', $id);
    $this->db->update('tarif_tipe', $d);
    return $this->db->affected_rows();
  }

  function getTarifTipeById($id)
  {
    $q = $this->db->get_where('tarif_tipe', ['tarif_tipe_id' => $id]);
    $res = $q->row_array();

    return $res;
  }
}
