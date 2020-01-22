<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class HutangSupplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MHutangSupplier', 'hutangSupplier');
    $this->load->model('MToko', 'toko');
  }

  public function index()
  {
    $now = new DateTime();
    $back = $now->sub(DateInterval::createFromDateString('30 days'));

    $data = [
      'page' => 'hutang-supplier/index',
      'title' => 'Pembayaran Hutang Supplier',
      'hutangSupplier' => $this->hutangSupplier->getAll(),
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

    if (empty($id_toko)) {
      $data = $this->hutangSupplier->report(null, $tanggal_awal, $tanggal_akhir);
      $filename = 'Log-Pembayaran-Hutang-Supplier-' . $tanggal_awal . '_' . $tanggal_akhir;
    } else {
      $data = $this->hutangSupplier->report($id_toko, $tanggal_awal, $tanggal_akhir);
      $filename = 'Log-Pembayaran-Hutang-Supplier-' . $toko->nama_toko . '-' . $tanggal_awal . '_' . $tanggal_akhir;
    }

    $spreadsheet = new Spreadsheet;
    $columnTitle = [
      'Nama Toko','Nama Supplier','No. Invoice', 'Nominal', 'Tanggal'
    ];

    $index = $cell = 1;
    
    foreach(range('A', 'E') as $column){
      $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.''.$cell, $columnTitle[$index-1]);
      $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
      $index++;
    }

    $spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
    $row = 2;

    foreach ($data as $data) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $data->nama_toko)
        ->setCellValue('B' . $row, $data->nama_supplier)
        ->setCellValue('C' . $row, $data->no_invoice)
        ->setCellValue('D' . $row, $data->nominal)
        ->setCellValue('E' . $row, $data->tanggal);
      $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }
}


/* End of file HutangSupplier.php */
/* Location: ./application/controllers/HutangSupplier.php */
