<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('AdminPanel/dataset/new'); ?>" class="btn btn-primary">Tambah Data</a>
    <a href="<?= base_url('AdminPanel/dataset/reset'); ?>" class="btn btn-danger"
      onclick="return confirm('Semua data akan terhapus')">Reset Data</a>
    <a <?= (env('CI_ENVIRONMENT') == 'development') ? '' : 'hidden'; ?>
      href="<?= base_url('AdminPanel/dataset/generate'); ?>" class="btn btn-success"
      onclick="return confirm('Buat sebuah Dataset, diperuntukan untuk pengembangan bukan untuk versi rilis')">Tambah
      dataset fiktif Random</a>
  </div>
  <div class="card-body">
    <table id='datatable' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Label</th>
          <th>Atribut</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        $db = \Config\Database::connect(); ?>
        <?php foreach ($data as $item): ?>
          <?php $get = $db->table('dataset_detail')->where('id_dataset', $item['id_dataset'])->get()->getResultArray();
          $getLength = count($get);
          $q = 1;
          ?>
          <tr>
            <td>
              <?= $i; ?>
            </td>
            <td>
              <?= $item['label']; ?>
            </td>
            <td>
              (
              <?php foreach ($get as $node): ?>
                <?= ($q >= $getLength) ? $node['bobot_atribut'] : $node['bobot_atribut'] . ', ' ?>
                <?php $q++; ?>
              <?php endforeach ?>
              )
            </td>
            <td>
              <div class="btn-group">
                <a class="btn btn-danger"
                  href="<?= base_url('AdminPanel/dataset/delete/' . $item['id_dataset']); ?>">Delete</a>
              </div>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>