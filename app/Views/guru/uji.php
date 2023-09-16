<?= $this->extend('guru/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('GuruPanel/Add'); ?>" class="btn btn-primary">Tambah Data Uji</a>
    <button class="btn btn-success" data-toggle="modal" data-target="#k">Uji Data</button>
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
              <?php $getUjiKriteria = $db->table('uji_kriteria')->where('id_kriteria', $node['id_kriteria'])->where('unique_key', $item['unique_key'])->get()->getRowArray(); ?>
              <td>
                <?= $getUjiKriteria['bobot']; ?>
              </td>
            <?php endforeach ?>
            <td><a href="<?= base_url('AdminPanel/Delete/' . $item['unique_key']) ?>" class="btn btn-danger">Hapus
                Data</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="k" tabindex="-1" role="dialog" aria-labelledby="kLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tentukan Jarak (K) Tetangga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('GuruPanel/Exec') ?>" method="post">
        <div class="modal-body">
          <input type="text" value="3" name="k" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Uji Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>