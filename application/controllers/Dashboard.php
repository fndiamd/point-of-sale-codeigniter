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
			'total_merchant' => $this->db->count_all_results('toko'),
			'total_supplier' => $this->db->count_all_results('supplier'),
			'total_pelanggan' => $this->db->count_all_results('pelanggan'),
			'total_barang' => $this->db->count_all_results('barang'),
			'transaksiPenjualan' => json_encode($transaksiPenjualan),
			'transaksiPembelian' => json_encode($transaksiPembelian)
		];

		$this->load->view('index', $data);
	}
}
