<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataPembelian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MDataPembelian', 'dataPembelian');
    $this->load->model('MToko', 'toko');
  }

  public function index()
  {
    $now = new DateTime();
    $back = $now->sub(DateInterval::createFromDateString('30 days'));
    $data = [
      'title' => 'Data Pembelian',
      'page' => 'data-pembelian/index',
      'dataPembelian' => $this->dataPembelian->getAll(),
      'merchant' => $this->toko->getAll(),
      'bulan_lalu' => $back->format('Y-m-d')
    ];

    $this->load->view('index', $data);
  }

  public function load(){
    $data = [];
    $no = 1;

    foreach ($this->dataPembelian->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_toko,
        $row->nama_supplier,
        $row->no_invoice,
        'Rp' . number_format($row->totalorder, 0, ",", ".") . ',-',
        date_format(date_create($row->tanggal), "d M Y"),
        '<button type="button" class="btn btn-primary detail-button" data-toggle="modal" data-target="#modal-detail" data-id="'.$row->id_datapembelian.'">
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
    echo json_encode($this->dataPembelian->getById($id));
  }

  public function report()
  {
    $id_toko = $this->input->post('id_toko');
    $toko = $this->toko->getById($id_toko);
    $tanggal_awal = $this->input->post('tanggal_awal');
    $tanggal_akhir = $this->input->post('tanggal_akhir');

    if (empty($id_toko)) {
      $dataPembelian = $this->dataPembelian->report(null, $tanggal_awal, $tanggal_akhir);
      $filename = 'Detail-Pembelian-' . $tanggal_awal . '_' . $tanggal_akhir;
    } else {
      $dataPembelian = $this->dataPembelian->report($id_toko, $tanggal_awal, $tanggal_akhir);
      $filename = 'Detail-Pembelian-' . $toko->nama_toko . '-' . $tanggal_awal . '_' . $tanggal_akhir;
    }

    $columnTitle = [
      'Nama Toko', 'Nama Supplier', 'No. Invoice', 'Tanggal Transaksi', 'Pembayaran', 'Keterangan',
      'Total Order', 'Total Bayar', 'Kembalian', 'Status Transaksi', 'Tanggal Jatuh Tempo', 'Operator'
    ];

    $spreadsheet = new Spreadsheet;

    $index = $cell = 1;
    foreach (range('A', 'L') as $column) {
      $spreadsheet->setActiveSheetIndex(0)->setCellValue($column . '' . $cell, $columnTitle[$index - 1]);
      $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
      $index++;
    }

    $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
    $row = 2;

    foreach ($dataPembelian as $data) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $data->nama_toko)
        ->setCellValue('B' . $row, $data->nama_supplier)
        ->setCellValue('C' . $row, $data->no_invoice)
        ->setCellValue('D' . $row, $data->tanggal)
        ->setCellValue('E' . $row, $data->pembayaran)
        ->setCellValue('F' . $row, $data->keterangan)
        ->setCellValue('G' . $row, $data->totalorder)
        ->setCellValue('H' . $row, $data->totalbayar)
        ->setCellValue('I' . $row, $data->kembalian)
        ->setCellValue('J' . $row, $data->status)
        ->setCellValue('K' . $row, $data->jatuh_tempo)
        ->setCellValue('L' . $row, $data->operator);
      $row++;
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }
}


/* End of file DataPembelian.php */
/* Location: ./application/controllers/DataPembelian.php */
