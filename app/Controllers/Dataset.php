<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Dataset extends BaseController
{
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/dataset', [
      'data' => $this->db->table('dataset')->get()->getResultArray()
    ]);
  }

  public function new()
  {
    return view('admin/dataset_add', [
      'option' => $this->db->table('kriteria')->get()->getResultArray()
    ]);
  }

  public function create()
  {
    $data = [
      'kriteria' => $this->request->getPost('kriteria')
    ];

    $this->db->table('dataset')->insert($data);

    $getLastID = $this->db->table('dataset')->select('LAST_INSERT_ID()')->get()->getRowArray();

    $data_pertanyaan = [
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p1')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p2')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p3')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p4')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p5')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p6')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p7')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p8')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p9')
      ],
      [
        'id_dataset' => $getLastID['id_dataset'],
        'nilai_pertanyaan' => $this->request->getPost('p10')
      ],
    ];

    $this->db->table('dataset_detail')->insertBatch($data_pertanyaan);

    return redirect()->to(base_url('AdminPanel/dataset'))->with('type-status', 'success')->with('message', 'Data berhasil ditambah');
  }

  public function delete($id)
  {
    $this->db->table('dataset')->where('id_dataset', $id)->delete();
    $this->db->table('dataset_detail')->where('id_dataset', $id)->delete();

    return redirect()->to(base_url('AdminPanel/dataset'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }

  public function reset()
  {
    $this->db->table('dataset')->truncate();
    $this->db->table('dataset_detail')->truncate();

    return redirect()->to(base_url('AdminPanel/dataset'))->with('type-status', 'success')->with('message', 'Data berhasil direset');
  }
}