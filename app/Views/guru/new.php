<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">New <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item">Kelola <?= $title; ?></li>
          <li class="breadcrumb-item active">New</li>
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
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            New <?= $title; ?>
          </div>
          <div class="card-body">
            <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
              <?= csrf_field(); ?>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('nama')) ? 'border-danger' : ''; ?>" id="nama" name="nama" placeholder="nama" value="<?= old('nama'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('nik')) ? 'border-danger' : ''; ?>" id="nik" name="nik" placeholder="nik" value="<?= old('nik'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('tempat_lahir')) ? 'border-danger' : ''; ?>" id="tempat_lahir" name="tempat_lahir" placeholder="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control <?= ($error = validation_show_error('tanggal_lahir')) ? 'border-danger' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control <?= ($error = validation_show_error('tanggal_lahir')) ? 'border-danger' : ''; ?>">
                  <?php foreach ($jk as $d): ?>
                    <option value="<?= $d; ?>"><?= $d; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('email')) ? 'border-danger' : ''; ?>" id="email" name="email" placeholder="email" value="<?= old('email'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('no_hp')) ? 'border-danger' : ''; ?>" id="no_hp" name="no_hp" placeholder="no_hp" value="<?= old('no_hp'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>



              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>
<?= $this->endSection('script') ?>