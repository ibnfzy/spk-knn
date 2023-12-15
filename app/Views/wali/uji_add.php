<?= $this->extend('wali/base'); ?>

<?= $this->section('content'); ?>
<?php $db = \Config\Database::connect();
$getMurid = $db->table('murid')->where('id_murid', $_SESSION['id_murid'])->get()->getRowArray();
?>
<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('WaliPanel/Add'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Pilih Murid</label>
        <select name="id_murid" id="id_murid" class="form-control">
          <option selected value="<?= $_SESSION['id_murid'] ?>">
            <?= $getMurid['nama_lengkap'] ?>
          </option>
        </select>
      </div>

      <?php $db = \Config\Database::connect(); ?>

      <?php foreach ($kriteria as $node) : ?>
      <hr>

      <h5 class="font-weight-bold">
        <?= $node['nama_kriteria']; ?>
      </h5>

      <?php
        $get = $db->table('kuisoner')->where('kriteria', $node['nama_kriteria'])->get()->getResultArray();
        $i = 1;
        ?>

      <?php foreach ($get as $val) : ?>
      <div class="form-group col-6">
        <label>
          <?= $val['pertanyaan']; ?>
        </label>
        <select name="pertanyaan[<?= $node['nama_kriteria'] ?>][<?= $i ?>]" id="pertanyaan" class="form-control">
          <?php if (str_contains($val['pertanyaan'], 'lancar')) : ?>
          <?php if (fmod($i, 2) == 1) : ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="35">1. Sangat Lancar</option>
          <option value="25">2. Lancar</option>
          <option value="20">3. Biasa</option>
          <option value="15">4. Tidak Lancar</option>
          <option value="5">5. Sangat Tidak Lancar</option>
          <?php else : ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="30">1. Sangat Lancar</option>
          <option value="25">2. Lancar</option>
          <option value="20">3. Biasa</option>
          <option value="15">4. Tidak Lancar</option>
          <option value="10">5. Sangat Tidak Lancar</option>
          <?php endif ?>
          <?php elseif (str_contains($val['pertanyaan'], 'dapat')) : ?>
          <?php if (fmod($i, 2) == 1) : ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="35">1. Sangat Bisa</option>
          <option value="25">2. Bisa</option>
          <option value="20">3. Cukup Bisa</option>
          <option value="15">4. Kurang Bisa</option>
          <option value="5">5. Tidak Bisa</option>
          <?php else : ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="30">1. Sangat Bisa</option>
          <option value="25">2. Bisa</option>
          <option value="20">3. Cukup Bisa</option>
          <option value="15">4. Kurang Bisa</option>
          <option value="10">5. Tidak Bisa</option>
          <?php endif ?>
          <?php else : ?>
          <?php if (fmod($i, 2) == 1) : ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="35">1. Sangat Setuju</option>
          <option value="25">2. Setuju</option>
          <option value="20">3. Netral</option>
          <option value="15">4. Tidak Setuju</option>
          <option value="5">5. Sangat Tidak Setuju</option>
          <?php else : ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="30">1. Sangat Setuju</option>
          <option value="25">2. Setuju</option>
          <option value="20">3. Netral</option>
          <option value="15">4. Tidak Setuju</option>
          <option value="10">5. Sangat Tidak Setuju</option>
          <?php endif ?>
          <?php endif ?>
        </select>
      </div>

      <?php $i++; ?>
      <?php endforeach ?>
      <?php endforeach ?>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>