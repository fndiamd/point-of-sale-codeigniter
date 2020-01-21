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

    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'Nama Toko')
      ->setCellValue('B1', 'Nama Pelanggan')
      ->setCellValue('C1', 'No. Invoice')
      ->setCellValue('D1', 'Tanggal Transaksi')
      ->setCellValue('E1', 'Pembayaran')
      ->setCellValue('F1', 'Keterangan')
      ->setCellValue('G1', 'Total Order')
      ->setCellValue('H1', 'Total Bayar')
      ->setCellValue('I1', 'Kembalian')
      ->setCellValue('J1', 'Status Transaksi')
      ->setCellValue('K1', 'Tanggal Jatuh Tempo')
      ->setCellValue('L1', 'Operator');

    $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);

    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

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
