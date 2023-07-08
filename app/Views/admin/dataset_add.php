<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/dataset'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Label</label>
        <select class="form-control" name="kriteria" id="kriterai">
          <option value="Tinggi">1. Tinggi</option>
          <option value="Sedang">2. Sedang</option>
          <option value="Rendah">3. Rendah</option>
        </select>
      </div>
      <div class="form-group">
        <label>Atribut 1</label>
        <input type="number" class="form-control" name="p1">
      </div>
      <div class="form-group">
        <label>Atribut 2</label>
        <input type="number" class="form-control" name="p2">
      </div>
      <div class="form-group">
        <label>Atribut 3</label>
        <input type="number" class="form-control" name="p3">
      </div>
      <div class="form-group">
        <label>Atribut 4</label>
        <input type="number" class="form-control" name="p4">
      </div>
      <div class="form-group">
        <label>Atribut 5</label>
        <input type="number" class="form-control" name="p5">
      </div>
      <div class="form-group">
        <label>Atribut 6</label>
        <input type="number" class="form-control" name="p6">
      </div>
      <div class="form-group">
        <label>Atribut 7</label>
        <input type="number" class="form-control" name="p7">
      </div>
      <div class="form-group">
        <label>Atribut 8</label>
        <input type="number" class="form-control" name="p8">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>