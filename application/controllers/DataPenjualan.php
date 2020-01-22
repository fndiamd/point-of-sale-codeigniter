<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataPenjualan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MDataPenjualan', 'dataPenjualan');
    $this->load->model('MToko', 'toko');
  }

  public function index()
  {

    $now = new DateTime();
    $back = $now->sub(DateInterval::createFromDateString('30 days'));

    $data = [
      'title' => 'Data Penjualan',
      'page' => 'data-penjualan/index',
      'dataPenjualan' => $this->dataPenjualan->getAll(),
      'merchant' => $this->db->get('toko')->result(),
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

    if(empty($id_toko)){
      $dataPenjualan = $this->dataPenjualan->report(null, $tanggal_awal, $tanggal_akhir);
      $filename = 'Data-Penjualan-'.$tanggal_awal.'_'.$tanggal_akhir;
    }else{
      $dataPenjualan = $this->dataPenjualan->report($id_toko, $tanggal_awal, $tanggal_akhir);
      $filename = 'Data-Penjualan-'.$toko->nama_toko.'-'.$tanggal_awal.'_'.$tanggal_akhir;
    }

    $columnTitle = [
      'Nama Toko','Nama Pelanggan', 'No. Invoice', 'Tanggal Transaksi','Pembayaran','Keterangan',
      'Total Order','Total Bayar','Kembalian','Status Transaksi','Tanggal Jatuh Tempo', 'Operator'
    ];

    $spreadsheet = new Spreadsheet;

    $index = $cell = 1;
    foreach(range('A', 'L') as $column){
      $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.''.$cell, $columnTitle[$index-1]);
      $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
      $index++;
    }

    $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
    $row = 2;

    foreach($dataPenjualan as $data){
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$row, $data->nama_toko)
        ->setCellValue('B'.$row, $data->nama_pelanggan)
        ->setCellValue('C'.$row, $data->no_invoice)
        ->setCellValue('D'.$row, $data->tanggal)
        ->setCellValue('E'.$row, $data->pembayaran)
        ->setCellValue('F'.$row, $data->keterangan)
        ->setCellValue('G'.$row, $data->totalorder)
        ->setCellValue('H'.$row, $data->totalbayar)
        ->setCellValue('I'.$row, $data->kembalian)
        ->setCellValue('J'.$row, $data->status)
        ->setCellValue('K'.$row, $data->jatuh_tempo)
        ->setCellValue('L'.$row, $data->operator);
      $row++;
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }
}


/* End of file DataPenjualan.php */
/* Location: ./application/controllers/DataPenjualan.php */
