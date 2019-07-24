<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TransactionTypeModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getTransactionType()
  {
    $this->db->select('*');
    $q = $this->db->get('transaction_type');
    $res = $q->result_array();

    return $res;
  }
}
