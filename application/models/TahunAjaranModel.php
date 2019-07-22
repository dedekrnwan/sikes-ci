<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TahunAjaranModel extends CI_Model
{
  function countTahunAjaran()
  {
    $this->db->select('*');
    $q = $this->db->get('ta');
    $res = $q->num_rows();

    return $res;
  }
}
