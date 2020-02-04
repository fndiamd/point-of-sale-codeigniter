<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $configUpload = [
      'upload_path' => './assets/uploads/barang/',
      'allowed_types' => 'gif|jpeg|jpg|png',
      'max_size' => 10000,
      'overwrite' => true
    ];
    $this->load->library('upload', $configUpload);
    $this->load->model('MBarang', 'barang');
    $this->load->model('MKategori', 'kategori');
    $this->load->model('MUser', 'user');
  }

  public function index()
  {
    $data = [
      'title' => 'Manajemen Barang Master',
      'page' => 'barang/index'
    ];

    $this->load->view('index', $data);
  }

  public function load()
  {
    $data = [];
    $no = 1;

    foreach ($this->barang->getAllMaster() as $row) {
      $data[] = array(
        $no++,
        $row->kodebarang,
        $row->nama_kategori,
        $row->nama_barang,
        $row->hargabeli,
        $row->hargajual,
        $row->stok,
        '<button type="button" class="btn btn-primary detail-button" data-toggle="modal" data-target="#modal-detail" data-id="' . $row->id_barang . '">
          <i class="fa fa-eye"></i>
        </button>
        <a href="' . base_url('barang/edit/' . $row->id_barang) . '" class="btn btn-warning"><i class="fa fa-edit"></i></a>
        <button class="delete-button btn btn-danger" row-data="barang-' . $row->id_barang . '" data-url="' . base_url('barang/delete/' . $row->id_barang) . '">
            <i class="fa fa-trash"></i>
        </button>'
      );
    }

    $result = array(
      "data" => $data
    );

    echo json_encode($result);
    exit();
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Barang Master',
      'page' => 'barang/form_tambah',
      'kategori' => $this->kategori->getAllMaster(),
    ];

    $this->load->view('index', $data);
  }

  public function store()
  {

    if (!$this->upload->do_upload('gambar')) {

      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect(base_url('barang/create'));
    } else {

      $gambar = $this->upload->data();
      $data = [
        'nama_barang' => $this->input->post('nama_barang'),
        'kodebarang' => $this->input->post('kodebarang'),
        'user' => '0',
        'id_kategori' => $this->input->post('kategori'),
        'hargabeli' => $this->input->post('hargabeli'),
        'hargajual' => $this->input->post('hargajual'),
        'stok' => $this->input->post('stok'),
        'minimalstok' => $this->input->post('minimalstok'),
        'diskon' => $this->input->post('diskon'),
        'deskripsi' => $this->input->post('deskripsi'),
        'gbr' => $gambar['file_name'],
        'tampilkan' => 0
      ];

      $this->barang->save($data);
      $this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
      redirect(base_url('barang'));
    }
  }

  public function edit($idbarang)
  {
    $barang = $this->barang->getById($idbarang);
    $data = [
      'title' => 'Update Barang - '.$barang->nama_barang,
      'page' => 'barang/form_update',
      'barang' => $barang,
      'kategori' => $this->kategori->getAllMaster(),
    ];

    $this->load->view('index', $data);
  }

  public function update($idbarang)
  {
    $data = [
      'nama_barang' => $this->input->post('nama_barang'),
      'kodebarang' => $this->input->post('kodebarang'),
      'user' => '0',
      'id_kategori' => $this->input->post('kategori'),
      'hargabeli' => $this->input->post('hargabeli'),
      'hargajual' => $this->input->post('hargajual'),
      'stok' => $this->input->post('stok'),
      'minimalstok' => $this->input->post('minimalstok'),
      'diskon' => $this->input->post('diskon'),
      'deskripsi' => $this->input->post('deskripsi'),
      'tampilkan' => 0
    ];

    if (!empty($_FILES['gambar']['name'])) {
      if (!$this->upload->do_upload('gambar')) {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('barang/create'));
      } else {
        $gambar = $this->upload->data();
        $data['gbr'] = $gambar['file_name'];
      }
    }

    $this->db->where('id_barang', $idbarang);
    $this->db->update('barang', $data);
    $this->session->set_flashdata('success', 'Barang berhasil diubah');
    redirect(base_url('barang'));
  }

  public function detail()
  {
    $id = $this->input->post('id');
    header('Content-Type: application/json');
    echo json_encode($this->barang->getById($id));
  }

  public function delete($id)
  {
    $barang = $this->barang->getById($id);
    $this->barang->delete($id);
    if ($barang->gbr != '' && file_exists('assets/uploads/barang/' . $barang->gbr)) {
      unlink(FCPATH . 'assets/uploads/barang/' . $barang->gbr);
    }
    header('Content-Type: application/json');
    echo json_encode(['section' => 'Barang Master', 'data' => $barang->nama_barang]);
  }

  public function import()
  {
    $allowFile = ['xls', 'xlsx', 'csv', 'xlt'];
    if (isset($_FILES['excelbarang']['name'])) {
      $arr_file = explode('.', $_FILES['excelbarang']['name']);
      $extension = end($arr_file);
      if (in_array($extension, $allowFile)) {
        if ('csv' == $extension) {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
          $kodebarang = 0;
          $barang = 1;
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          $kodebarang = 1;
          $barang = 2;
        }

        $spreadsheet = $reader->load($_FILES['excelbarang']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        for ($i = 0; $i < count($sheetData); $i++) {
          $data = [
            'kodebarang' => $sheetData[$i][$kodebarang],
            'nama_barang' => $sheetData[$i][$barang],
            'user' => '0',
            'id_kategori' => 1
          ];
          $this->barang->save($data);
        }
        $this->session->set_flashdata('success', 'Data barang berhasil diimport');
        redirect(base_url('barang'));
      } else {
        $this->session->set_flashdata('error', 'Tipe file tidak sesuai, gunakan file dengan format xls, xlsx, xlt atau csv');
        redirect(base_url('barang'));
      }
    }
  }
}


/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
