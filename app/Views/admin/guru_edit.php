<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/guru/' . $item['id_guru']); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Lengkap Guru</label>
        <input type="text" class="form-control" name="fullname" value="<?= $item['fullname']; ?>">
      </div>
      <div class="form-group">
        <label>NIP</label>
        <input type="text" class="form-control" name="nip" value="<?= $item['nip']; ?>">
      </div>
      <div class="form-group">
        <label>Password Baru (Kosongkan jika tidak ingin merubah)</label>
        <input type="password" class="form-control" name="password">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>