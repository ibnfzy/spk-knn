<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GuruController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('guru/uji', [
            'kriteria' => $this->db->table('kriteria')->get()->getResultArray(),
            'data' => $this->db->table('uji_knn')->get()->getResultArray()
        ]);
    }

    public function uji_add()
    {
        return view('guru/uji_add', [
            'murid' => $this->db->table('murid')->get()->getResultArray(),
            'kriteria' => $this->db->table('kriteria')->get()->getResultArray()
        ]);
    }

    public function uji_save()
    {

        $rules = [
            'id_murid' => 'required',
            'pertanyaan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('GuruPanel/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $getMurid = $this->db->table('murid')->where('id_murid', $this->request->getPost('id_murid'))->get()->getRowArray();

        $uniqueKey = date('Ymd_H:i:s');

        $dataUji = [
            'id_murid' => $this->request->getPost('id_murid'),
            'unique_key' => $uniqueKey,
            'nama_murid' => $getMurid['nama_lengkap']
        ];

        $dataKriteria = [];

        // dd($this->request->getPost('pertanyaan'));

        foreach ($this->request->getPost('pertanyaan') as $key => $value) {
            // dd([$key => $value]);
            $getKriteria = $this->db->table('kriteria')->where('nama_kriteria', $key)->get()->getRowArray();

            $dataKriteria[] = [
                'unique_key' => $uniqueKey,
                'id_kriteria' => $getKriteria['id_kriteria'],
                'nama_kriteria' => $key,
                'bobot' => array_sum($value)
            ];
        }

        $this->db->table('uji_knn')->insert($dataUji);
        $this->db->table('uji_kriteria')->insertBatch($dataKriteria);

        return redirect()->to(base_url('GuruPanel'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
    }

    public function uji_delete($uid)
    {
        $this->db->table('uji_knn')->where('unique_key', $uid)->delete();
        $this->db->table('uji_kriteria')->where('unique_key', $uid)->delete();

        return redirect()->to(base_url('GuruPanel'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
    }

    public function uji_exec()
    {
        $data = $this->db->table('dataset')->get()->getResultArray();
        $dataset = [];

        foreach ($data as $item) {
            $get = $this->db->table('dataset_detail')->where('id_dataset', $item['id_dataset'])->get()->getResultArray();

            $attr = [];

            foreach ($get as $node) {
                $attr[] = (int) $node['bobot_atribut'];
            }

            $dataset[] = [
                'atribut' => $attr,
                'kelas' => $item['label']
            ];
        }

        return view('guru/uji_exec', [
            'data' => $data,
            'k' => $this->request->getPost('k'),
            'kriteria' => $this->db->table('kriteria')->get()->getResultArray(),
            'uji' => $this->db->table('uji_knn')->get()->getResultArray(),
            'dataset' => $dataset
        ]);
    }
}