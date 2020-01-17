<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MHutangSupplier extends CI_Model {

  private $table = 'logpembayaranhutangsupplier';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(){
    $this->db->from($this->table);
    $this->db->join('supplier', 'supplier.id_supplier='.$this->table.'.id_supplier', 'left');
    $this->db->join('toko', 'toko.user='.$this->table.'.user', 'left');
    return $this->db->get()->result();
  }
}

/* End of file HutangSupplier_model.php */
/* Location: ./application/models/HutangSupplier_model.php */