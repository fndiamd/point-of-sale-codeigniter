<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		$data = [
			'page' => 'dashboard',
			'title' => 'Dashboard',
			'total_merchant' => $this->db->count_all_results('toko'),
			'total_supplier' => $this->db->count_all_results('supplier'),
			'total_pelanggan' => $this->db->count_all_results('pelanggan'),
			'total_barang' => $this->db->count_all_results('barang')
		];

		$this->load->view('index', $data);
	}
}
