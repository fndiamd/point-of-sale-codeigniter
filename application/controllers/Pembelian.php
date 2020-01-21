<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembelian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MPembelian', 'pembelian');
    $this->load->model('MToko', 'toko');
  }

  public function index()
  {
    $now = new DateTime();
    $back = $now->sub(DateInterval::createFromDateString('30 days'));

    $data = [
      'title' => 'Detail Pembelian',
      'page' => 'pembelian/index',
      'pembelian' => $this->pembelian->getAll(),
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
      $detailPembelian = $this->pembelian->report(null, $tanggal_awal, $tanggal_akhir);
      $filename = 'Detail-Pembelian-' . $tanggal_awal . '_' . $tanggal_akhir;
    } else {
      $detailPembelian = $this->pembelian->report($id_toko, $tanggal_awal, $tanggal_akhir);
      $filename = 'Detail-Pembelian-' . $toko->nama_toko . '-' . $tanggal_awal . '_' . $tanggal_akhir;
    }

    $spreadsheet = new Spreadsheet;
    $columnTitle = [
      'Nama Toko', 'Nama Supplier', 'Nama Barang', 'No. Invoice', 'Jumlah', 'Harga',
      'Total Harga', 'Tanggal Transaksi', 'Catatan', 'Status Transaksi'
    ];

    $index = $cell = 1;

    foreach (range('A', 'J') as $column) {
      $spreadsheet->setActiveSheetIndex(0)->setCellValue($column . '' . $cell, $columnTitle[$index - 1]);
      $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
      $index++;
    }

    $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
    $row = 2;

    foreach ($detailPembelian as $data) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $data->nama_toko)
        ->setCellValue('B' . $row, $data->nama_supplier)
        ->setCellValue('C' . $row, $data->nama_barang)
        ->setCellValue('D' . $row, $data->no_invoice)
        ->setCellValue('E' . $row, $data->jumlah)
        ->setCellValue('F' . $row, $data->harga)
        ->setCellValue('G' . $row, $data->totalharga)
        ->setCellValue('H' . $row, $data->tanggal)
        ->setCellValue('I' . $row, $data->catatan)
        ->setCellValue('J' . $row, $data->status);
      $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }
}


/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */
