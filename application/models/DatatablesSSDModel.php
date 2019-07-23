<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DatatablesSSDModel extends CI_Model
{
  public $configSSD;
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => '',
      'column_order' => [null, 'column1', 'column2'],
      'column_search' => ['column2', 'column2'],
      'order' => ['id' => 'asc']
    ];
  }

  public function _get_datatables_query($condition)
  {
    if ($condition) {
      foreach ($condition as $c) {
        $c0 = $c[0];
        $c1 = $c[1];
        $c2 = $c[2];
        if (($c2) == null) {
          $this->db->$c0($c1);
        } else {
          $this->db->$c2($c0, $c1);
        }
      }
    }

    $this->db->from($this->configSSD['table']);

    $i = 0;
    foreach ($this->configSSD['column_search'] as $item) {
      if ($_POST['search']['value']) {

        if ($i === 0) {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->configSSD['column_search']) - 1 == $i)
          $this->db->group_end();
      }
      $i++;
    }

    if (isset($_POST['order'])) {
      $this->db->order_by($this->configSSD['column_order'][$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->configSSD['order'])) {
      $order = $this->configSSD['order'];
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables($condition)
  {
    $this->_get_datatables_query($condition);
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered($condition)
  {
    $this->_get_datatables_query($condition);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all($condition)
  {
    if ($condition) {
      foreach ($condition as $c) {
        $c0 = $c[0];
        $c1 = $c[1];
        $c2 = $c[2];
        if (($c2) == null) {
          $this->db->$c0($c1);
        } else {
          $this->db->$c2($c0, $c1);
        }
      }
    }
    $this->db->from($this->configSSD['table']);
    return $this->db->count_all_results();
  }
}
