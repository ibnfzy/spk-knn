<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<div class="card">
  <div class="card-header">
    <a onclick="window.history.back()" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <div class="card-title col-12">DATASET</div>
    <table id='' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Label</th>
          <th>Atribut</th>
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
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="card-title">
      <table id='' class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Murid</th>
            <?php foreach ($kriteria as $item): ?>
            <th>
              <?= $item['nama_kriteria'] ?>
            </th>
            <?php endforeach ?>
            <th>Label</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $db = \Config\Database::connect();
          $i = 1;
          ; ?>
          <?php foreach ($data as $item): ?>
          <tr>
            <td>
              <?= $i++ ?>
            </td>
            <td>
              <?= $item['nama_murid'] ?>
            </td>
            <?php foreach ($kriteria as $node): ?>
            <?php $getUjiKriteria = $db->table('uji_kriteria')->where('id_kriteria', $node['id_kriteria'])->get()->getRowArray(); ?>
            <td>
              <?= $getUjiKriteria['bobot']; ?>
            </td>
            <?php endforeach ?>
            <td></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>