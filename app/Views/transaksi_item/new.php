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
                <label for="id_kategori_sub">Kategori</label>
                <select name="id_kategori_sub" id="id_kategori_sub" class="form-control <?= ($error = validation_show_error('id_kategori_sub')) ? 'border-danger' : ''; ?>">
                  <?php foreach ($kategori_sub as $d) : ?>
                    <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> (<?= $d['nama_kategori']; ?> - <?= ($d['is_manual'] == 1) ? 'Manual' : 'Auto'; ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" class="form-control <?= ($error = validation_show_error('nominal')) ? 'border-danger' : ''; ?>" id="nominal" name="nominal" placeholder="nominal" value="<?= old('nominal'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


              <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" class="form-control <?= ($error = validation_show_error('qty')) ? 'border-danger' : ''; ?>" id="qty" name="qty" placeholder="qty" value="<?= old('qty'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="total">Total</label>
                <input type="number" readonly class="form-control <?= ($error = validation_show_error('total')) ? 'border-danger' : ''; ?>" id="total" name="total" placeholder="total" value="<?= old('total'); ?>">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control <?= ($error = validation_show_error('total')) ? 'border-danger' : ''; ?>" name="keterangan" id="keterangan"><?= old('keterangan'); ?></textarea>
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
<script>
  function calTotal() {
    var nominal = parseFloat($('#nominal').val());
    var qty = parseFloat($('#qty').val());
    var total = nominal * qty;

    $('#total').val(total)
  }
  $('#nominal').on('keyup', calTotal);
  $('#qty').on('keyup', calTotal);
</script>
<?= $this->endSection('script') ?>