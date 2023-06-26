<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/murid/'.$item['id_murid']) ;?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Lengkap Siswa</label>
        <input type="text" class="form-control" name="nama" value="<?= $item['nama_lengkap'] ;?>">
      </div>
      <div class="form-group">
        <label>NIS</label>
        <input type="text" class="form-control" name="nis" value="<?= $item['nis'] ;?>">
      </div>
      <div class="form-group">
        <label>Kelas</label>
        <input type="text" class="form-control" name="kelas" value="<?= $item['kelas'] ;?>">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>