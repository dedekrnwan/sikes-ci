<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ConfigModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function updateConfig($d)
  {
    $this->db->where('config_id', 1);
    $this->db->update('config', $d);
    return $this->db->affected_rows();
  }

  function getConfig()
  {
    $q = $this->db->get_where('config', ['config_id' => 1]);
    $res = $q->row_array();

    return $res;
  }
}
