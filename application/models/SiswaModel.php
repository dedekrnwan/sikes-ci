<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
  function countSiswa()
  {
    $this->db->select('*');
    $q = $this->db->get('siswa');
    $res = $q->num_rows();

    return $res;
  }
}
