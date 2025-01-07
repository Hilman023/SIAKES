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
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
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
      <div class="col-12">
        <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>
        <div class="card">
          <div class="card-header">
            Kelola <?= $title; ?>
          </div>
          <div class="card-body table-responsive">
            <table class="table" id="table2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Poto profil</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Status akun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 1;
                foreach ($data as $d) : ?>
                  <tr>
                    <td><?= $a++; ?></td>
                    <td>
                      <img width="70" src="<?= base_url(); ?>public/assets/uploads/users/<?= $d['image']; ?>" alt="">
                    </td>
                    <td><?= $d['username']; ?></td>
                    <td><?= $d['name']; ?></td>
                    <td><?= $d['title']; ?></td>
                    <td><?= $d['email']; ?></td>
                    <td>
                      <?php if ($d['is_active'] == 1) : ?>
                        <a class="btn btn-success btn-sm" href="<?= base_url($link . '/active/' . $d['id'] . '/0'); ?>">
                          <i class="fas fa-check"></i>
                        </a>
                      <?php else : ?>
                        <a class="btn btn-danger btn-sm" href="<?= base_url($link . '/active/' . $d['id'] . '/1'); ?>">
                          <i class="fas fa-times"></i>
                        </a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id'] . '/edit'); ?>"><i class="far fa-edit"></i></a>
                      <form class="d-inline" action='<?= base_url($link . '/' . $d['id']); ?>' method='post' enctype='multipart/form-data'>
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
</section>
<?= $this->endSection('content') ?>