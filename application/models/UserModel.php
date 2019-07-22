<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
  function countUser()
  {
    $this->db->select('*');
    $q = $this->db->get('user');
    $res = $q->num_rows();

    return $res;
  }

  function getUser($d)
  {
    $this->db->select('*');
    $q = $this->db->get_where('user', ['username' => $d['username'], 'password' => $d['password']]);
    $res = $q->row_array();

    return $res;
  }
}
