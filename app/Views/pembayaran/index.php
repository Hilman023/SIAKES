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
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
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
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>
        <div class="card">
          <div class="card-header">
            <?= $title; ?>
          </div>
          <div class="card-body table-responsive">
            <table class="table" id="table2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Pembayaran</th>
                  <th>No Transaksi</th>
                  <th>Kategori</th>
                  <th>Kategori Sub</th>
                  <th>Nama Aktor</th>
                  <th>Jenis Aktor</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Method</th>
                  <th>Bayar Nominal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 1;
                foreach ($data as $d): ?>
                  <tr>
                    <td><?= $a++; ?></td>
                    <td><?= $d['no_pembayaran']; ?></td>
                    <td><?= $d['no_transaksi']; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>
                    <td><?= $d['nama_kategori_sub']; ?></td>
                    <td><?= $d['nama_aktor']; ?></td>
                    <td><?= $d['jenis_aktor']; ?></td>
                    <td><?= $d['tanggal_pembayaran']; ?></td>
                    <td><?= $d['method']; ?></td>
                    <td><?= number_format($d['bayar_nominal'], 0, ',', '.'); ?></td>
                    <td>
                      <a class="btn btn-success btn-sm mb-2" href="<?= base_url($link . '/' . $d['id'] . ''); ?>"><i class="far fa-eye"></i></a>
                    </td>
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