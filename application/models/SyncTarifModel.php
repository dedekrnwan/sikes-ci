<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class SyncTarifModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
  }

  function countSyncTarif()
  {
    $this->db->select('*');
    $q = $this->db->get('sync_tarif');
    $res = $q->num_rows();

    return $res;
  }

  function insertSyncTarif($d)
  {
    $this->db->insert('sync_tarif', $d);
    return $this->db->affected_rows();
  }

  function updateSyncTarif($id, $d)
  {
    $this->db->where('sync_tarif_id', $id);
    $this->db->update('sync_tarif', $d);
    return $this->db->affected_rows();
  }

  function getSyncTarifById($id) 
  {
    $q = $this->db->get_where('sync_tarif', ['sync_tarif_id' => $id]);
    $res = $q->row_array();

    return $res;
  }

  function getSyncTarifByParam($param)
  {
    $q = $this->db->get_where('sync_tarif', $param);
    $res = $q->row_array();

    return $res;
  }
}
