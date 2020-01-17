<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MPiutangSupplier extends CI_Model {

  private $table = 'historipiutangsupplier';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'tanggal', $sort = 'desc'){
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier='.$this->table.'.id_supplier', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    $this->db->order_by($column, $sort);
    return $this->db->get()->result();
  }

}

/* End of file MPiutangSupplier_model.php */
/* Location: ./application/models/MPiutangSupplier_model.php */