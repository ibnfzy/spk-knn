<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('AdminPanel/murid/new') ;?>" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Lengkap</th>
          <th>NIS</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ;?>
        <?php foreach ($data as $item) : ?>
        <tr>
          <td><?= $i ;?></td>
          <td><?= $item['nama_lengkap'] ;?></td>
          <td><?= $item['nis'] ;?></td>
          <td><?= $item['kelas'] ;?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="<?= base_url('AdminPanel/murid/'.$item['id_murid']) ;?>">Edit</a>
              <a class="btn btn-danger" href="<?= base_url('AdminPanel/murid/delete/'.$item['id_murid']) ;?>">Delete</a>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>