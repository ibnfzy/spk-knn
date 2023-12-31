<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>

<!-- Default box -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>
          <?= $siswa; ?>
        </h3>

        <p>Total Siswa</p>
      </div>
      <div class="icon">
        <i class="fas fa-shopping-cart"></i>
      </div>

    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>
          <?= $wali; ?>
        </h3>

        <p>Total Wali Siswa</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>
          <?= $guru; ?>
        </h3>

        <p>Total Guru</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-plus"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>
          <?= $kriteria; ?>
        </h3>

        <p>Total Kriteria</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-pie"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="col-lg-12">

</div>

<?= $this->endSection(); ?>