<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <button onclick="history.back()" class="btn btn-primary">Kembali</button>
  </div>
  <form action="<?= base_url('AdminPanel/kuisoner/' . $data['id_kuisoner']); ?>" method="post">
    <div class="card-body">
      <div class="form-group">
        <label>Pertanyaan</label>
        <textarea name="tanya" id="tanya" class="form-control"><?= $data['pertanyaan']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="">Kriteria</label>
        <select class="form-control" name="kriteria" id="kriteria">
          <?php foreach ($option as $item): ?>
          <option <?= ($data['kriteria'] == $item['nama_kriteria']) ? 'selected' : '' ?>
            value="<?= $item['nama_kriteria'] ?>"><?= $item['nama_kriteria'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>