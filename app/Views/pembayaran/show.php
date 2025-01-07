<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><?= $title; ?></li>
          <li class="breadcrumb-item active">Detail</li>
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
    <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 mb-2">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="no_pembayaran">No Pembayaran</label>
                    <input readonly type="text" id="no_pembayaran" name="no_pembayaran" class="form-control" value="<?= $data['no_pembayaran']; ?>">
                  </div>

                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                    <input readonly type="text" id="tanggal_pembayaran" name="tanggal_pembayaran" class="form-control" value="<?= $data['tanggal_pembayaran']; ?>">
                  </div>

                </div>
              </div>


              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="jenis_aktor">Jenis Aktor</label>
                    <input readonly type="text" class="form-control" value="<?= $data['jenis_aktor']; ?>">
                  </div>

                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="nama_aktor">Nama</label>
                    <input readonly type="text" id="nama_aktor" name="nama_aktor" class="form-control" value="<?= $data['nama_aktor']; ?>">
                  </div>

                </div>
              </div>



              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <input readonly type="text" class="form-control" value="<?= $data['nama_kategori']; ?>">
                  </div>

                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="id_kategori_sub">Kategori Sub</label>
                    <input readonly type="text" class="form-control" value="<?= $data['nama_kategori_sub']; ?>">
                  </div>

                </div>
              </div>


              <div class="row">

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="bayar_nominal">Bayar Nominal</label>
                    <input readonly type="text" id="bayar_nominal" name="bayar_nominal" class="form-control" value="<?= number_format($data['bayar_nominal'], 0, ',', '.'); ?>">
                  </div>

                </div>
              </div>









            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card mb-2">
            <div class="card-body">

              <h5>Detail Transaksi</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Bayar</th>
                  </tr>
                </thead>
                <tbody id="res-item">
                  <?php $a = 1;
                  foreach ($detail as $d): ?>
                    <tr>
                      <td><?= $a++; ?></td>
                      <td><?= $d['item']; ?></td>
                      <td><?= $d['qty']; ?></td>
                      <td><?= number_format($d['alokasi_nominal'], 0, ',', '.'); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

              <a target="_blank" href="<?= base_url($link . '/kwitansi/' . $data['id']); ?>" class="btn btn-info mt-3"><i class="fas fa-print"></i></a>
              <a target="_blank" href="<?= base_url($link . '/kwitansi/' . $data['id'] . '/2'); ?>" class="btn btn-info mt-3"><i class="fas fa-print"></i> <span class="badge badge-light">x2</span></a>
              <a href="<?= base_url($link); ?>" class="btn btn-secondary mt-3">Kembali</a>
            </div>
          </div>

        </div>
      </div>

    </form>


  </div>
</section>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>


<?= $this->endSection('script') ?>