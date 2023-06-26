<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/murid') ;?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Lengkap Siswa</label>
        <input type="text" class="form-control" name="nama">
      </div>
      <div class="form-group">
        <label>NIS</label>
        <input type="text" class="form-control" name="nis">
      </div>
      <div class="form-group">
        <label>Kelas</label>
        <input type="text" class="form-control" name="kelas">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>