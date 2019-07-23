<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <!-- <small>Data Master & Pembayaran</small> -->
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Siswa</span>
            <span class="info-box-number"><?= $countSiswa ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-map-signs"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Tahun Ajaran</span>
            <span class="info-box-number"><?= $countTahunAjaran ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Tipe Tarif</span>
            <span class="info-box-number"><?= $countTarifTipe ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total User</span>
            <span class="info-box-number"><?= $countUser ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <!-- /.row -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><sup style="font-size: 20px">Rp</sup> <?= $sumLastMonth ?></h3>

            <p>Total Pemayaran Bulan Lalu</p>
          </div>
          <div class="icon">
            <i class="fa fa-mail-reply"></i>
          </div>
          <a href="<?= base_url() ?>pembayaran/page" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><sup style="font-size: 20px">Rp</sup> <?= $sumThisMonth ?></h3>

            <p>Total Pembayaran Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?= base_url() ?>pembayaran/page" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><sup style="font-size: 20px">Rp</sup>  <?= $sumAll ?></h3>

            <p>Total Pembayaran Keseluruhan</p>
          </div>
          <div class="icon">
            <i class="fa fa-money"></i>
          </div>
          <a href="<?= base_url() ?>pembayaran/page" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->