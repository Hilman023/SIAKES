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
        <button type="button" class="btn btn-primary mb-3">Saldo : <?= (count($data) > 0) ? number_format($data[0]['saldo'], 0, ',', '.') : 0; ?></button>
        <div class="card">
          <div class="card-body table-responsive">
            <table class="table" id="table2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <th>Saldo</th>
                  <th>Type</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 1;
                foreach ($data as $d) : ?>
                  <tr>
                    <td><?= $a++; ?></td>
                    <td><?= $d['no']; ?></td>
                    <td><?= number_format($d['debit'], 0, ',', '.'); ?></td>
                    <td><?= number_format($d['kredit'], 0, ',', '.'); ?></td>
                    <td><?= number_format($d['saldo'], 0, ',', '.'); ?></td>
                    <td><?= $d['type']; ?></td>
                    <td><?= $d['date']; ?></td>
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