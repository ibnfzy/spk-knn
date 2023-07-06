<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/kriteria/' . $data['id_kriteria']); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Kriteria</label>
        <input type="text" class="form-control" name="nama_kriteria">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>