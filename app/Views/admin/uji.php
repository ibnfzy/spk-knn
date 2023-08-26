<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('AdminPanel/uji/new'); ?>" class="btn btn-primary">Tambah Data Uji</a>
    <a href="#" class="btn btn-success">Uji Data</a>
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
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db = \Config\Database::connect();
        $i = 1;
        ; ?>
        <?php foreach ($data as $item): ?>
        <tr>
          <td>
            <?= $i++ ?>
          </td>
          <td>
            <?= $item['nama_murid'] ?>
          </td>
          <?php foreach ($kriteria as $node): ?>
          <?php $getUjiKriteria = $db->table('uji_kriteria')->where('id_kriteria', $node['id_kriteria'])->get()->getRowArray(); ?>
          <td>
            <?= $getUjiKriteria['bobot']; ?>
          </td>
          <?php endforeach ?>
          <td><a href="<?= base_url('AdminPanel/uji/delete/'.$item['unique_key']) ?>" class="btn btn-danger">Hapus
              Data</a></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>