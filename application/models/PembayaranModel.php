<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'DatatablesSSDModel.php';
class PembayaranModel extends DatatablesSSDModel
{
  function __construct()
  {
    parent::__construct();
    $this->configSSD = [
      'table' => 'v_pembayaran',
      'column_order' => [null, 'nis', 'nama', 'tarif_tipe', 'ta', 'kelas', 'bulan_ke', 'nominal_sisa', 'status'],
      'column_search' => ['nis', 'nama', 'tarif_tipe', 'ta', 'kelas', 'bulan_ke', 'nominal_sisa', 'status'],
      'order' => ['t_pembayaran_id' => 'asc']
    ];
  }
}
