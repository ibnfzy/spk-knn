<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class KNN extends Controller
{
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
  function knn(array $dataset, array $dataBaru, int $k)
  {
    $jarak = array();
    // Menghitung jarak antara data baru dengan setiap data dalam dataset
    foreach ($dataset as $data) {
      $jarak[] = array(
        'kelas' => $data['kelas'],
        'jarak' => $this->hitungJarak($data['atribut'], $dataBaru)
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