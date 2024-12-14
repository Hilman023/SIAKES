<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Kelola <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item">Kelola <?= $title; ?></li>
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
      <div class="col-6">

        <div class="card">
          <div class="card-body ">
            <h2>Kategori Kelas</h2>
            <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2">New</a>
            <div class="table-responsive">

              <table class="table " id="table2">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $a = 1;
                  foreach ($kelas as $d): ?>
                    <tr>
                      <td><?= $a++; ?></td>
                      <td><?= $d['nama']; ?></td>
                      <td>
                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id'] . '/edit'); ?>">Edit</a>
                        <form class="d-inline" action='<?= base_url($link . '/' . $d['id']); ?>' method='post' enctype='multipart/form-data'>
                          <?= csrf_field(); ?>
                          <input type='hidden' name='_method' value='DELETE' />
                          <!-- GET, POST, PUT, PATCH, DELETE-->
                          <button type='button' onclick='deleteTombol(this)' class='btn btn-sm mb-2 btn-danger'>Delete</button>
                        </form>
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


  </div>
</section>
<?= $this->endSection('content') ?>