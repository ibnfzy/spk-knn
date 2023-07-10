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
    return view('admin/dataset_add');
  }

  public function create()
  {
    $data = [
      'label' => $this->request->getPost('label')
    ];

    $this->db->table('dataset')->insert($data);

    $getLastID = $this->db->table('dataset')->select('LAST_INSERT_ID()')->get()->getRowArray();

    $data_pertanyaan = [
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p1')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p2')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p3')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p4')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p5')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p6')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p7')
      ],
      [
        'id_dataset' => $getLastID['LAST_INSERT_ID()'],
        'bobot_atribut' => $this->request->getPost('p8')
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

  public function generate_dataset()
  {
    $label = [
      'Tinggi',
      'Sedang',
      'Rendah'
    ];

    $data = [
      'label' => $label[array_rand($label)]
    ];

    $this->db->table('dataset')->insert($data);

    $getLastID = $this->db->table('dataset')->select('LAST_INSERT_ID() as id')->get()->getRowArray();

    $data_pertanyaan = [];
    $q = 8;

    for ($i = 0; $i < $q; $i++) {
      $data_pertanyaan[] = [
        'id_dataset' => $getLastID['id'],
        'bobot_atribut' => rand(1, 100)
      ];
    }

    $this->db->table('dataset_detail')->insertBatch($data_pertanyaan);

    return redirect()->to(base_url('AdminPanel/dataset'))->with('type-status', 'success')->with('message', 'Data berhasil ditambah');
  }
}