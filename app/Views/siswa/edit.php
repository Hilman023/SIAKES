<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item">Kelola <?= $title; ?></li>
          <li class="breadcrumb-item active">Edit</li>
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
    <form action="<?= base_url($link . '/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-5 mb-2">
          <div class="card">
            <div class="card-body">

              <?= csrf_field(); ?>
              <input type='hidden' name='_method' value='PUT' />
              <!-- GET, POST, PUT, PATCH, DELETE-->
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('nama')) ? 'border-danger' : ''; ?>" id="nama" name="nama" placeholder="nama" value="<?= old('nama', $data['nama']); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="nipd">NIPD</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('nipd')) ? 'border-danger' : ''; ?>" id="nipd" name="nipd" placeholder="NIPD" value="<?= old('nipd', $data['nipd']); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>



              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('tempat_lahir')) ? 'border-danger' : ''; ?>" id="tempat_lahir" name="tempat_lahir" placeholder="tempat_lahir" value="<?= old('tempat_lahir', $data['tempat_lahir']); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control <?= ($error = validation_show_error('tanggal_lahir')) ? 'border-danger' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" value="<?= old('tanggal_lahir', $data['tanggal_lahir']); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control <?= ($error = validation_show_error('tanggal_lahir')) ? 'border-danger' : ''; ?>">
                  <?php foreach ($jk as $d): ?>
                    <?php if ($data['jk'] == $d): ?>
                      <option selected value="<?= $d; ?>"><?= $d; ?></option>
                    <?php else: ?>
                      <option value="<?= $d; ?>"><?= $d; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('email')) ? 'border-danger' : ''; ?>" id="email" name="email" placeholder="email" value="<?= old('email', $data['email']); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" class="form-control <?= ($error = validation_show_error('no_hp')) ? 'border-danger' : ''; ?>" id="no_hp" name="no_hp" placeholder="no_hp" value="<?= old('no_hp', $data['no_hp']); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


              <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select name="id_kelas" id="id_kelas" class="form-control <?= ($error = validation_show_error('no_hp')) ? 'border-danger' : ''; ?>">
                  <?php foreach ($kelas as $d): ?>
                    <?php if ($data['id_kelas'] == $d['id']): ?>
                      <option selected value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php else: ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="id_jurusan">Jurusan</label>
                <select name="id_jurusan" id="id_jurusan" class="form-control <?= ($error = validation_show_error('no_hp')) ? 'border-danger' : ''; ?>">
                  <?php foreach ($jurusan as $d): ?>
                    <?php if ($data['id_jurusan'] == $d['id']): ?>
                      <option selected value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php else: ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="id_tahun">Tahun</label>
                <select name="id_tahun" id="id_tahun" class="form-control <?= ($error = validation_show_error('no_hp')) ? 'border-danger' : ''; ?>">
                  <?php foreach ($tahun as $d): ?>
                    <?php if ($data['id_tahun'] == $d['id']): ?>
                      <option selected value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php else: ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
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