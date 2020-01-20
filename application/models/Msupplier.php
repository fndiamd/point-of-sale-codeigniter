<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSupplier extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function getAll(){
    return $this->db->get('supplier')->result();
  }

  public function getById($value){
    $this->db->where('supplier.id_supplier', $value);
    
    return $this->db->get('supplier')->row();
  }

  public function supplierUser($user){
    $this->db->where('user', $user);
    return $this->db->get('supplier')->result();
  }
}

/* End of file MPelanggan_model.php */
/* Location: ./application/models/MPelanggan_model.php */