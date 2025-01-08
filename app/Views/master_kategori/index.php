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
      <div class="col-6 mb-2">

        <div class="card">
          <div class="card-body ">
            <h4>Kategori Kelas</h4>
            <a href="<?= base_url($link . '/kelas/new'); ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">

              <table class="table " id="">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $a = 1;
                  foreach ($kelas as $d): ?>
                    <tr>
                      <td><?= $a++; ?></td>
                      <td><?= $d['nama']; ?></td>
                      <td>
                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/kelas/' . $d['id'] . '/edit'); ?>"><i class="far fa-edit"></i></a>
                        <form class="d-inline" action='<?= base_url($link . '/kelas/' . $d['id']); ?>' method='post' enctype='multipart/form-data'>
                          <?= csrf_field(); ?>
                          <input type='hidden' name='_method' value='DELETE' />
                          <!-- GET, POST, PUT, PATCH, DELETE-->
                          <button type='button' onclick='deleteTombol(this)' class='btn btn-sm mb-2 btn-danger'><i class="fas fa-trash-alt"></i></button>
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

      <div class="col-6 mb-2">

        <div class="card">
          <div class="card-body ">
            <h4>Kategori Jurusan</h4>
            <a href="<?= base_url($link . '/jurusan/new'); ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">

              <table class="table " id="">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $a = 1;
                  foreach ($jurusan as $d): ?>
                    <tr>
                      <td><?= $a++; ?></td>
                      <td><?= $d['nama']; ?></td>
                      <td>
                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/jurusan/' . $d['id'] . '/edit'); ?>"><i class="far fa-edit"></i></a>
                        <form class="d-inline" action='<?= base_url($link . '/jurusan/' . $d['id']); ?>' method='post' enctype='multipart/form-data'>
                          <?= csrf_field(); ?>
                          <input type='hidden' name='_method' value='DELETE' />
                          <!-- GET, POST, PUT, PATCH, DELETE-->
                          <button type='button' onclick='deleteTombol(this)' class='btn btn-sm mb-2 btn-danger'><i class="fas fa-trash-alt"></i></button>
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


      <div class="col-6 mb-2">

        <div class="card">
          <div class="card-body ">
            <h4>Tahun Ajar</h4>
            <a href="<?= base_url($link . '/tahun/new'); ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">

              <table class="table " id="table3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Ajar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $a = 1;
                  foreach ($tahun as $d): ?>
                    <tr>
                      <td><?= $a++; ?></td>
                      <td><?= $d['nama']; ?></td>
                      <td>
                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/tahun/' . $d['id'] . '/edit'); ?>"><i class="far fa-edit"></i></a>
                        <form class="d-inline" action='<?= base_url($link . '/tahun/' . $d['id']); ?>' method='post' enctype='multipart/form-data'>
                          <?= csrf_field(); ?>
                          <input type='hidden' name='_method' value='DELETE' />
                          <!-- GET, POST, PUT, PATCH, DELETE-->
                          <button type='button' onclick='deleteTombol(this)' class='btn btn-sm mb-2 btn-danger'><i class="fas fa-trash-alt"></i></button>
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