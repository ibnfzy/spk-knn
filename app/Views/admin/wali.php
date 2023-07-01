<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('AdminPanel/wali/new'); ?>" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Lengkap Wali Murid</th>
          <th>Nama Siswa</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php $db = \Config\Database::connect(); ?>
        <?php foreach ($data as $item): ?>
        <?php $get = $db->table('murid')->where('id_murid', $item['id_murid'])->get()->getRowArray(); ?>
        <tr>
          <td>
            <?= $i; ?>
          </td>
          <td>
            <?= $item['nama_wali']; ?>
          </td>
          <td>
            <?= $get['nama_lengkap']; ?>
          </td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="<?= base_url('AdminPanel/wali/' . $item['id_wali_murid']); ?>">Edit</a>
              <a class="btn btn-danger"
                href="<?= base_url('AdminPanel/wali/delete/' . $item['id_wali_murid']); ?>">Delete</a>
            </div>
          </td>
        </tr>
        <?php $i++ ;?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>