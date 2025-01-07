<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
      </div>
      <!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <form action="" method="get">
      <div class="row">
        <div class="col-md-3 mb-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="Start">Mulai</span>
            </div>
            <input type="date" class="form-control" name="start" id="start" value="<?= $start; ?>">
          </div>
        </div>
        <div class="col-md-3 mb-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="end">Selesai</span>
            </div>
            <input type="date" class="form-control" name="end" id="end" value="<?= $end; ?>">
          </div>
        </div>
        <div class="col-md-2 mb-2">
          <button type="submit" id="submit" class="btn  btn-primary">Simpan</button>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table class="table" id="table2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Kategori</th>
                  <th>Kategori Sub</th>
                  <th>Nama</th>
                  <th>Jenis Aktor</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Nominal</th>
                  <th>Bayar Nominal</th>
                  <th>Sisa Nominal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 1;
                foreach ($data as $d) : ?>
                  <tr>
                    <td><?= $a++; ?></td>
                    <td><?= $d['no_transaksi']; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>
                    <td><?= $d['nama_kategori_sub']; ?></td>
                    <td><?= $d['nama_aktor']; ?></td>
                    <td><?= $d['jenis_aktor']; ?></td>
                    <td><?= $d['tanggal_transaksi']; ?></td>
                    <td>Rp. <?= number_format($d['total_nominal'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($d['bayar_nominal'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($d['sisa_nominal'], 0, ',', '.'); ?></td>
                    <td><?= $d['status']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
<?= $this->endSection('content') ?>