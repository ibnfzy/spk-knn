<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/kuisoner'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Pertanyaan</label>
        <textarea name="tanya" id="tanya" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Jenis Pertanyaan</label>
        <select name="jenis" id="jenis" class="form-control">
          <option value="Positif">1. Positif</option>
          <option value="Negatif">2. Negatif</option>
        </select>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>