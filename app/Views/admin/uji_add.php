<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/uji'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Pilih Murid</label>
        <select name="id_murid" id="id_murid" class="form-control">
          <option selected disabled>-- PILIH MURID --</option>
          <?php $i = 1;
          foreach ($murid as $item): ?>
          <option value="<?= $item['id_murid']; ?>">
            <?= $i++ . '. ' . $item['nama_lengkap'] . ' | NIS. ' . $item['nis']; ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <?php $db = \Config\Database::connect(); ?>

      <?php foreach ($kriteria as $node): ?>
      <hr>

      <h5 class="font-weight-bold">
        <?= $node['nama_kriteria']; ?>
      </h5>

      <?php
        $get = $db->table('kuisoner')->where('kriteria', $node['nama_kriteria'])->get()->getResultArray()
        ;
        $i = 1;
        ?>

      <?php foreach ($get as $val): ?>
      <div class="form-group col-6">
        <label>
          <?= $val['pertanyaan']; ?>
        </label>
        <select name="pertanyaan[<?= $node['nama_kriteria'] ?>][<?= $i ?>]" id="pertanyaan" class="form-control">
          <?php if (fmod($i, 2) == 1): ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="35">1. Sangat Setuju</option>
          <option value="25">2. Setuju</option>
          <option value="20">3. Netral</option>
          <option value="15">4. Tidak Setuju</option>
          <option value="5">5. Sangat Tidak Setuju</option>
          <?php else: ?>
          <option selected disabled>PILIH JAWABAN</option>
          <option value="30">1. Sangat Setuju</option>
          <option value="25">2. Setuju</option>
          <option value="20">3. Netral</option>
          <option value="15">4. Tidak Setuju</option>
          <option value="10">5. Sangat Tidak Setuju</option>
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