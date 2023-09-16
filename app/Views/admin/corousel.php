<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah Data</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $item): ?>

          <tr>
            <td>
              <?= $i++; ?>
            </td>
            <td>
              <img width="100" src="<?= base_url('uploads/' . $item['gambar']); ?>" alt="">
            </td>
            <td>
              <div class="btn-group">
                <a class="btn btn-danger"
                  href="<?= base_url('AdminPanel/Corousel/' . $item['id_corousel']); ?>">Delete</a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="kLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('AdminPanel/Corousel') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="file" name="gambar" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>