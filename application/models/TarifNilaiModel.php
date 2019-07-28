<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class TarifNilaiModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_tarif_nilai',
      'column_order' => [null, 'ta', 'kelas', 'nominal', 'active'],
      'column_search' => ['ta', 'kelas', 'nominal', 'active'],
      'order' => ['tarif_nilai_id' => 'asc']
    ];
  }

  function countTarifNilai()
  {
    $this->db->select('*');
    $q = $this->db->get('tarif_nilai');
    $res = $q->num_rows();

    return $res;
  }

  function getTarifNilai()
  {
    $this->db->select('*');
    $q = $this->db->get('tarif_nilai');
    $res = $q->result_array();

    return $res;
  }

  function insertTarifNilai($d)
  {
    $this->db->insert('tarif_nilai', $d);
    return $this->db->affected_rows();
  }

  function updateTarifNilai($id, $d)
  {
    $this->db->where('tarif_nilai_id', $id);
    $this->db->update('tarif_nilai', $d);
    return $this->db->affected_rows();
  }

  function getTarifNilaiById($id)
  {
    $q = $this->db->get_where('tarif_nilai', ['tarif_nilai_id' => $id]);
    $res = $q->row_array();

    return $res;
  }
}
