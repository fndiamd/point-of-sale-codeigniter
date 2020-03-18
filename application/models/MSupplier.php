<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MSupplier extends CI_Model
{

  private $table = 'supplier';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll($column = 'id_supplier', $sort = 'desc')
  {
    if ($this->session->userdata('app_id') == 'wismilak') {
      $this->db->select($this->table . '.*');
      $this->db->from($this->table);
      $this->db->join('users', 'users.master=' . $this->table . '.user');
      $this->db->where('users.app_id', 'wismilak');
      $this->db->order_by($column, $sort);
      return $this->db->get()->result();
    } else {
      $this->db->order_by($column, $sort);
      return $this->db->get($this->table)->result();
    }
  }

  public function getById($value)
  {
    $this->db->select('supplier.*, toko.nama_toko');
    $this->db->from('supplier');
    $this->db->join('toko', 'toko.user=supplier.user', 'left');
    $this->db->where('supplier.id_supplier', $value);
    return $this->db->get()->row();
  }

  public function supplierUser($user)
  {
    $this->db->where('user', $user);
    return $this->db->get('supplier')->result();
  }

  public function delete($idsupplier)
  {
    $this->db->where('id_supplier', $idsupplier);
    $this->db->delete($this->table);
  }
}

/* End of file MPelanggan_model.php */
/* Location: ./application/models/MPelanggan_model.php */
