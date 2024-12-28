<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <p>Penerimaan bulan ini</p>
            <!-- data yang ditampilkan dari total jumlah pemasukan perbulan -->
            <font size="5">Rp. </font>
            <font size="6"><b><?= number_format($pemasukan, 0, ',', '.'); ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-download"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <p>Pengeluaran bulan ini</p>
            <!-- data yang ditampilkan dari total jumlah pengeluaran perbulan -->
            <font size="5">Rp. </font>
            <font size="6"><b><?= number_format($pengeluaran, 0, ',', '.'); ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-upload"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <p>Saldo Kas</p>
            <!-- data yang ditampilkan dari total sisa jumlah uang -->
            <font size="5">Rp. </font>
            <font size="6"><b><?= (count($saldo) > 0) ? number_format($saldo[0]['saldo'], 0, ',', '.') : 0; ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-money-bill-wave-alt"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <p>Total Siswa</p>
            <!-- data yang ditampilkan dari jumlah crud siswa yang dibuat -->
            <font size="6"><b><?= $siswa; ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
    </div>

    <!-- ./col -->
    <div class="row">
      <!-- BAR CHART -->
      <div class="col-lg-6 col-3">
        <div class="card bg-white">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar mr-1"></i>
              Grafik Pemasukan & Pengeluaran
            </h3>
          </div>
          <div class="card-body bg-white">
            <div class="chart">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Calender -->
      <div class="col-lg-6 col-3">
        <div class="card bg-white">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-calendar-alt mr-1"></i>
              Kalender
              <b class="calendar-current-date ml-1"></b>
              <div class="calendar-navigation">
                <span id="calendar-prev" class="fas fa-caret-square-left">
                </span>
                <span id="calendar-next" class="fas fa-caret-square-right">
                </span>
              </div>
            </h3>
          </div>

          <div class=" calendar-body">
            <ul class="calendar-weekdays">
              <li>Minggu</li>
              <li>Senin</li>
              <li>Selasa</li>
              <li>Rabu</li>
              <li>Kamis</li>
              <li>Jumat</li>
              <li>Sabtu</li>
            </ul>
            <ul class="calendar-dates"></ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- /.row 
    <div class="row">
      <div class="col-md-6 mb-2">
        <div class="calendar-container">
          <header class="calendar-header">
            <p class="calendar-current-date"></p>
            <div class="calendar-navigation">
              <span id="calendar-prev" class="fas fa-chevron-circle-left">
              </span>
              <span id="calendar-next" class="fas fa-chevron-circle-right">
              </span>
            </div>
          </header>

          <div class=" calendar-body">
            <ul class="calendar-weekdays">
              <li>Min</li>
              <li>Sen</li>
              <li>Sel</li>
              <li>Rab</li>
              <li>Kam</li>
              <li>Jum</li>
              <li>Sab</li>
            </ul>
            <ul class="calendar-dates"></ul>
          </div>
        </div>
      </div>
    </div> -->
  </div><!-- /.container-fluid -->
</section>

<!-- /.content -->
<?= $this->endSection('content') ?>