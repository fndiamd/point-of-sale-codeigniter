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
      'bulan_lalu' => $back->format('Y-m-d')
    ];

    $this->load->view('index', $data);
  }

  public function load(){
    $data = [];
    $no = 1;

    foreach ($this->penjualan->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_toko,
        $row->nama_pelanggan,
        $row->no_invoice,
        'Rp' . number_format($row->totalharga, 0, ",", ".") . ',-',
        date_format(date_create($row->tanggal), "d M Y"),
        '<button type="button" class="btn btn-primary detail-button" data-toggle="modal" data-target="#modal-detail" data-id="'.$row->id_penjualan.'">
          <i class="fa fa-eye"></i>
        </button>'
      );
    }

    $result = array(
      "data" => $data
    );

    echo json_encode($result);
    exit();
  }

  public function detail(){
    $id = $this->input->post('id');
    header('Content-Type: application/json');
    echo json_encode($this->penjualan->getById($id));
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
