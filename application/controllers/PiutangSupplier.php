<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PiutangSupplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MPiutangSupplier', 'piutangSupplier');
    $this->load->model('MToko', 'toko');
  }

  public function index()
  {
    $now = new DateTime();
    $back = $now->sub(DateInterval::createFromDateString('30 days'));

    $data = [
      'page' => 'piutang-supplier/index',
      'title' => 'History Piutang Supplier',
      'bulan_lalu' => $back->format('Y-m-d')
    ];

    $this->load->view('index', $data);
  }

  public function load(){
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query = $this->db->get("historipiutangsupplier");
    $data = []; $no = 1;

    foreach ($this->piutangSupplier->getAll() as $row) {
      $data[] = array(
        $no++,
        $row->nama_toko,
        $row->nama_supplier,
        $row->no_invoice, 
        'Rp'.number_format($row->nominal, 0, ",", ".").',-',
        date_format(date_create($row->tanggal), "d M Y"),
        $row->status
      );
    }

    $result = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );

    echo json_encode($result);
    exit();
  }

  public function report()
  {
    $id_toko = $this->input->post('id_toko');
    $toko = $this->toko->getById($id_toko);
    $tanggal_awal = $this->input->post('tanggal_awal');
    $tanggal_akhir = $this->input->post('tanggal_akhir');

    if (empty($id_toko)) {
      $dataPiutang = $this->piutangSupplier->report(null, $tanggal_awal, $tanggal_akhir);
      $filename = 'History-Piutang-Supplier-' . $tanggal_awal . '_' . $tanggal_akhir;
    } else {
      $dataPiutang = $this->piutangSupplier->report($id_toko, $tanggal_awal, $tanggal_akhir);
      $filename = 'History-Piutang-Supplier-' . $toko->nama_toko . '-' . $tanggal_awal . '_' . $tanggal_akhir;
    }

    $spreadsheet = new Spreadsheet;
    $columnTitle = [
      'Nama Toko','Nama Supplier','No. Invoice', 'Nominal', 'Tanggal', 'Status'
    ];

    $index = $cell = 1;
    
    foreach(range('A', 'F') as $column){
      $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.''.$cell, $columnTitle[$index-1]);
      $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
      $index++;
    }

    $spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
    $row = 2;

    foreach ($dataPiutang as $data) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $data->nama_toko)
        ->setCellValue('B' . $row, $data->nama_supplier)
        ->setCellValue('C' . $row, $data->no_invoice)
        ->setCellValue('D' . $row, $data->nominal)
        ->setCellValue('E' . $row, $data->tanggal)
        ->setCellValue('F' . $row, $data->status);
      $row++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
  }

  public function coba(){
    print_r($this->piutangSupplier->report(null, '2019-10-01', '2020-01-01'));
  }

}


/* End of file PiutangSupplier.php */
/* Location: ./application/controllers/PiutangSupplier.php */
