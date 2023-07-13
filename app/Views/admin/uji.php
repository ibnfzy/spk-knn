<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="#" class="btn btn-primary">Tambah Data Uji</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Murid</th>
          <?php foreach ($kriteria as $item): ?>
          <th>
            <?= $item['nama_kriteria'] ?>
          </th>
          <?php endforeach ?>
          <th>Bobot</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>