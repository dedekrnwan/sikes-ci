<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class MessageSentModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_message_sent',
      'column_order' => [null, 'message_type', 'date_added', 'nis', 'nama', 'no_ortu', 'tarif_tipe', 'nominal', 'message_text'],
      'column_search' => ['message_type', 'date_added', 'nis', 'nama', 'no_ortu', 'tarif_tipe', 'nominal', 'message_text'],
      'order' => ['message_sent_id' => 'asc']
    ];
  }

  function countMessageSent()
  {
    $this->db->select('*');
    $q = $this->db->get('message_sent');
    $res = $q->num_rows();

    return $res;
  }

  function getMessageSent()
  {
    $this->db->select('*');
    $q = $this->db->get('message_sent');
    $res = $q->result_array();

    return $res;
  }

  function insertMessageSent($d)
  {
    $this->db->insert('message_sent', $d);
    return $this->db->affected_rows();
  }

  function updateMessageSent($id, $d)
  {
    $this->db->where('message_sent_id', $id);
    $this->db->update('message_sent', $d);
    return $this->db->affected_rows();
  }

  function getMessageSentById($id)
  {
    $q = $this->db->get_where('message_sent', ['message_sent_id' => $id]);
    $res = $q->row_array();

    return $res;
  }
}
