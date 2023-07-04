<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/dataset'); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Kriteria</label>
        <select class="form-control" name="kriteria" id="kriterai">
          <?php $i = 1; ?>
          <?php foreach ($option as $item): ?>
          <option value="<?= $item['nama_kriteria'] ?>"><?= $i++ ?>. <?= $item['nama_kriteria'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Pertanyaan 1</label>
        <input type="number" class="form-control" name="p1">
      </div>
      <div class="form-group">
        <label>Pertanyaan 2</label>
        <input type="number" class="form-control" name="p2">
      </div>
      <div class="form-group">
        <label>Pertanyaan 3</label>
        <input type="number" class="form-control" name="p3">
      </div>
      <div class="form-group">
        <label>Pertanyaan 4</label>
        <input type="number" class="form-control" name="p4">
      </div>
      <div class="form-group">
        <label>Pertanyaan 5</label>
        <input type="number" class="form-control" name="p5">
      </div>
      <div class="form-group">
        <label>Pertanyaan 6</label>
        <input type="number" class="form-control" name="p6">
      </div>
      <div class="form-group">
        <label>Pertanyaan 7</label>
        <input type="number" class="form-control" name="p7">
      </div>
      <div class="form-group">
        <label>Pertanyaan 8</label>
        <input type="number" class="form-control" name="p8">
      </div>
      <div class="form-group">
        <label>Pertanyaan 9</label>
        <input type="number" class="form-control" name="p9">
      </div>
      <div class="form-group">
        <label>Pertanyaan 10</label>
        <input type="number" class="form-control" name="p10">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>