<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('AdminPanel/kriteria/new'); ?>" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Kriteria</th>
          <th>Bobot</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $item): ?>
        <tr>
          <td>
            <?= $i; ?>
          </td>
          <td>
            <?= $item['nama_kriteria']; ?>
          </td>
          <td>
            <?= $item['bobot']; ?>
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="<?= base_url('AdminPanel/kriteria/' . $item['id_kriteria']); ?>">Edit</a>
              <a class="btn btn-danger"
                href="<?= base_url('AdminPanel/kriteria/delete/' . $item['id_kriteria']); ?>">Delete</a>
            </div>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>