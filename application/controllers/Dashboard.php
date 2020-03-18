<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MDataPembelian', 'dataPembelian');
		$this->load->model('MDataPenjualan', 'dataPenjualan');
		$this->load->model('MBarang', 'barang');
	}

	public function index()
	{
		$transaksiPembelian = [];
		$transaksiPenjualan = [];
		$barangMasuk = [];

		for ($day = 6; $day >= 0; $day--) {
			$date = date('Y-m-d', strtotime('-' . $day . ' days'));
			array_push($transaksiPenjualan, $this->dataPenjualan->reportCount($date));
			array_push($transaksiPembelian, $this->dataPembelian->reportCount($date));
		}

		$data = [
			'page' => 'dashboard',
			'title' => 'Dashboard',
			'total_merchant' => $this->totalMerchant(),
			'total_supplier' => $this->totalSupplier(),
			'total_pelanggan' => $this->totalPelanggan(),
			'total_barang' => $this->totalBarang(),
			'transaksiPenjualan' => json_encode($transaksiPenjualan),
			'transaksiPembelian' => json_encode($transaksiPembelian)
		];

		$this->load->view('index', $data);
	}

	private function totalMerchant()
	{
		if ($this->session->userdata('app_id') == 'wismilak') {
			$this->db->select('toko.*');
			$this->db->from('toko');
			$this->db->join('users', 'users.master=toko.user');
			$this->db->where('users.app_id', 'wismilak');
			return $this->db->count_all_results();
		} else {
			return $this->db->count_all_results('toko');
		}
	}

	private function totalSupplier()
	{
		if ($this->session->userdata('app_id') == 'wismilak') {
			$this->db->select('supplier.*');
			$this->db->from('supplier');
			$this->db->join('users', 'users.master=supplier.user');
			$this->db->where('users.app_id', 'wismilak');
			return $this->db->count_all_results();
		} else {
			return $this->db->count_all_results('supplier');
		}
	}

	private function totalBarang()
	{
		if ($this->session->userdata('app_id') == 'wismilak') {
			$this->db->from('barang');
			$this->db->join('users', 'users.master=barang.user');
			$this->db->where('users.app_id', 'wismilak');
			$this->db->where('barang.user !=', 0);
			return $this->db->count_all_results();
		} else {
			return $this->db->count_all_results('toko');
		}
	}

	private function totalPelanggan()
	{
		if ($this->session->userdata('app_id') == 'wismilak') {
			$this->db->select('pelanggan.*');
			$this->db->from('pelanggan');
			$this->db->join('users', 'users.master=pelanggan.user');
			$this->db->where('users.app_id', 'wismilak');
			return $this->db->count_all_results();
		}else{
			return $this->db->count_all_results('pelanggan');
		}
	}
}
