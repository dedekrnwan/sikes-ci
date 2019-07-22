<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TarifTipeModel extends CI_Model
{
  function countTarifTipe()
  {
    $this->db->select('*');
    $q = $this->db->get('tarif_tipe');
    $res = $q->num_rows();

    return $res;
  }
}
