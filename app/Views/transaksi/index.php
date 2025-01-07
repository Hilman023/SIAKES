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
                  <th>No Transaksi</th>
                  <th>Jenis</th>
                  <th>Jenis Bayar</th>
                  <th>Nama</th>
                  <th>Jenis Aktor</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Nominal</th>
                  <th>Bayar Nominal</th>
                  <th>Sisa Nominal</th>
                  <th>Status</th>
                  <th>Aksi</th>
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
                    <td>
                      <a href="<?= base_url($link . '/' . $d['id']); ?>" class="btn btn-success mb-2 btn-sm"><i class="fas fa-eye"></i></a>
                      <?php if ($d['status'] != 'Paid'): ?>

                        <a href="<?= base_url($link . '/' . $d['id'] . '/edit'); ?>" class="btn btn-warning mb-2 btn-sm"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-info btn-sm mb-2" target="_blank" href="<?= base_url('pembayaran/new?id=' . $d['id']); ?>"><i class="fas fa-paper-plane"></i></a>
                        <form class="d-inline" action='<?= base_url($link . '/' . $d['id']); ?>' method='post' enctype='multipart/form-data'>
                          <?= csrf_field(); ?>
                          <input type='hidden' name='_method' value='DELETE' />
                          <!-- GET, POST, PUT, PATCH, DELETE-->
                          <button type='button' onclick='deleteTombol(this)' class='btn btn-sm mb-2 btn-danger'><i class="fas fa-trash-alt"></i></button>
                        </form>
                      <?php else: ?>

                      <?php endif; ?>
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