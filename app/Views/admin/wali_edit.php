<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/wali'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Nama Lengkap Wali Murid</label>
        <input type="text" class="form-control" name="nama_wali" value="<?= $data['']; ?>">
      </div>
      <div class="form-group">
        <label>Pilih Siswa</label>
        <select name="id_murid" id="id_murid" class="form-control">
          <?php $i = 1; ?>
          <?php foreach ($item as $node): ?>
            <option value="<?= $node['id_murid']; ?>" <?= ($node['id_murid'] == $data['id_murid']) ? 'selected' : ''; ?>>
              <?= $i; ?>. <?= $node['nama_lengkap']; ?></option>
            <?php $i++; ?>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Nomor Telephone (Whatsapp) </label>
        <input type="text" class="form-control" name="nomor_hp" value="<?= $node['nomor_hp']; ?>">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>