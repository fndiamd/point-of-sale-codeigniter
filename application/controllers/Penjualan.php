<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penjualan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MPenjualan', 'penjualan');
    $this->load->model('MPelanggan', 'pelanggan');
    $this->load->model('MBarang', 'barang');
    $this->load->model('MToko', 'toko');
  }

  public function index()
  {
    $now = new DateTime();
    $back = $now->sub(DateInterval::createFromDateString('30 days'));

    $data = [
      'title' => 'Detail Penjualan',
      'page' => 'penjualan/index',
      'penjualan' => $this->penjualan->getAll(),
      'merchant' => $this->toko->getAll(),
      'bulan_lalu' => $back->format('Y-m-d')
    ];

    $this->load->view('index', $data);
  }

  public function report()
  {
    $id_toko = $this->input->post('id_toko');
    $toko = $this->toko->getById($id_toko);
    $tanggal_awal = $this->input->post('tanggal_awal');
    $tanggal_akhir = $this->input->post('tanggal_akhir');

    if (empty($id_toko)) {
      $detailPenjualan = $this->penjualan->report(null, $tanggal_awal, $tanggal_akhir);
      $filename = 'Detail-Penjualan-' . $tanggal_awal . '_' . $tanggal_akhir;
    } else {
      $detailPenjualan = $this->penjualan->report($id_toko, $tanggal_awal, $tanggal_akhir);
      $filename = 'Detail-Penjualan-' . $toko->nama_toko . '-' . $tanggal_awal . '_' . $tanggal_akhir;
    }

    $spreadsheet = new Spreadsheet;
    $columnTitle = [
      'Nama Toko','Nama Pelanggan','Nama Barang','No. Invoice','Jumlah','Harga',
      'Total Harga','Total Modal','Tanggal Transaksi','Catatan','Sisa Stok','Status Transaksi'
    ];

    $index = $cell = 1;
    
    foreach(range('A', 'L') as $column){
      $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.''.$cell, $columnTitle[$index-1]);
      $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
      $index++;
    }

    $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
    $row = 2;

    foreach ($detailPenjualan as $data) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $data->nama_toko)
        ->setCellValue('B' . $row, $data->nama_pelanggan)
        ->setCellValue('C' . $row, $data->nama_barang)
        ->setCellValue('D' . $row, $data->no_invoice)
        ->setCellValue('E' . $row, $data->jumlah)
        ->setCellValue('F' . $row, $data->harga)
        ->setCellValue('G' . $row, $data->totalharga)
        ->setCellValue('H' . $row, $data->totalmodal)
        ->setCellValue('I' . $row, $data->tanggal)
        ->setCellValue('J' . $row, $data->catatan)
        ->setCellValue('K' . $row, $data->sisa_stok)
        ->setCellValue('L' . $row, $data->status);
      $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }
}


/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
