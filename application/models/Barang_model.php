<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $table = "barang";

    public $id_barang;
    public $id_kategori;
    public $user;
    public $nama_barang;
    public $kodebarang;
    public $hargabeli;
    public $hargajual;
    public $stok;
    public $minimalstok;
    public $diskon;
    public $deskripsi;
    public $gbr;


    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_barang" => $id])->row();
    }

    public function save($data){
        $this->db->insert($this->table, $data);
    }
}