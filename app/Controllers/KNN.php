<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class KNN extends Controller
{

//   $dataset = array(
//     array('atribut' => array(25, 120, 3.8), 'kelas' => 'rendah'),
//     array('atribut' => array(30, 140, 4.2), 'kelas' => 'rendah'),
//     array('atribut' => array(35, 160, 4.5), 'kelas' => 'sedang'),
//     array('atribut' => array(40, 180, 4.9), 'kelas' => 'sedang'),
//     array('atribut' => array(45, 200, 5.3), 'kelas' => 'tinggi'),
//     // Tambahkan data lainnya...
// );

  // Fungsi untuk menghitung jarak antara dua data
  function hitungJarak($data1, $data2)
  {
    $jarak = 0;
    for ($i = 0; $i < count($data1); $i++) {
      $jarak += pow($data1[$i] - $data2[$i], 2);
    }
    return sqrt($jarak);
  }

  // Fungsi untuk melakukan prediksi dengan KNN
  function knn($dataset, $dataBaru, $k)
  {
    $jarak = array();
    $knn = new KNN();
    // Menghitung jarak antara data baru dengan setiap data dalam dataset
    foreach ($dataset as $data) {
      $jarak[] = array(
        'kelas' => $data['kelas'],
        'jarak' => $knn->hitungJarak($data['atribut'], $dataBaru)
      );
    }

    // Mengurutkan jarak dari terkecil ke terbesar
    usort($jarak, function ($a, $b) {
      return $a['jarak'] <=> $b['jarak'];
    });

    // Mengambil k tetangga terdekat
    $tetangga = array_slice($jarak, 0, $k);

    // Menghitung voting mayoritas
    $voting = array();
    foreach ($tetangga as $data) {
      $kelas = $data['kelas'];
      if (isset($voting[$kelas])) {
        $voting[$kelas]++;
      } else {
        $voting[$kelas] = 1;
      }
    }

    // Mengambil kelas dengan voting terbanyak
    $prediksi = array_search(max($voting), $voting);

    return $prediksi;
  }
}