<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['penjualan/data-penjualan'] = 'DataPenjualan';
$route['penjualan/data-penjualan/load'] = 'DataPenjualan/load';
$route['penjualan/data-penjualan/detail'] = 'DataPenjualan/detail';
$route['penjualan/data-penjualan/report'] = 'DataPenjualan/report';

$route['penjualan/detail-penjualan'] = 'Penjualan';
$route['penjualan/detail-penjualan/load'] = 'Penjualan/load';
$route['penjualan/detail-penjualan/detail'] = 'Penjualan/detail';
$route['penjualan/detail-penjualan/report'] = 'Penjualan/report';

$route['pembelian/data-pembelian'] = 'DataPembelian';
$route['pembelian/data-pembelian/report'] = 'DataPembelian/report';

$route['pembelian/detail-pembelian'] = 'Pembelian';
$route['pembelian/detail-pembelian/report'] = 'Pembelian/report';

$route['history/piutang-pelanggan'] = 'PiutangPelanggan';
$route['history/piutang-pelanggan/load'] = 'PiutangPelanggan/load';
$route['history/piutang-pelanggan/report'] = 'PiutangPelanggan/report';

$route['history/piutang-supplier'] = 'PiutangSupplier';
$route['history/piutang-supplier/load'] = 'PiutangSupplier/load';
$route['history/piutang-supplier/report'] = 'PiutangSupplier/report';

$route['log-pembayaran/hutang-pelanggan'] = 'HutangPelanggan';
$route['log-pembayaran/hutang-pelanggan/load'] = 'HutangPelanggan/load';
$route['log-pembayaran/hutang-pelanggan/report'] = 'HutangPelanggan/report';

$route['log-pembayaran/hutang-supplier'] = 'HutangSupplier';
$route['log-pembayaran/hutang-supplier/load'] = 'HutangSupplier/load';
$route['log-pembayaran/hutang-supplier/report'] = 'HutangSupplier/report';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
