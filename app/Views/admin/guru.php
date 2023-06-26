<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('AdminPanel/guru/new'); ?>" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Lengkap</th>
          <th>NIP</th>
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
            <?= $item['fullname']; ?>
          </td>
          <td>
            <?= $item['nis']; ?>
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="<?= base_url('AdminPanel/guru/' . $item['id_guru']); ?>">Edit</a>
              <a class="btn btn-danger" href="<?= base_url('AdminPanel/guru/delete/' . $item['id_guru']); ?>">Delete</a>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>