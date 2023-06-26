<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/guru'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Lengkap Guru</label>
        <input type="text" class="form-control" name="fullname">
      </div>
      <div class="form-group">
        <label>NIP (4 Digit terakhir akan menjadi password)</label>
        <input type="text" class="form-control" name="nip">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>