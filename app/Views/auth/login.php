<?= $this->extend('template/auth') ?>

<?= $this->section('content') ?>

<style>
  .login-page {
    background-color: #00BCD4;
    background: url('<?= base_url('public/assets/dist/img/bg_login.png'); ?>') no-repeat top center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-left: 0;
    max-width: 360px;
    margin: 5% auto;
    overflow-x: hidden;
  }

  .login-page,
  .register-page {
    height: 70vh;
  }

  .login-card-body {
    border-radius: .25rem;
    background-color: #E6ECFE;
  }

  .login-card-body .input-group .input-group-text,
  .register-card-body .input-group .input-group-text {
    /* border-left: inherit; */
    /* border: 1px solid #ced4da; */
    border: 1px solid var(--primary-color);
    border-right: 0;
    border-radius: .25rem;
    background-color: var(--primary-color);
    color: white;
  }

  .login-card-body .input-group .form-control,
  .register-card-body .input-group .form-control {
    /* border-right: inherit; */
    /* border: 1px solid #ced4da; */
    border: 1px solid var(--primary-color);
  }
</style>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="row mb-3">
          <div class="col-3 mr-2 pt-2">
            <img src="<?= base_url(); ?>public/assets/dist/img/siakes_logo.png" alt="">
          </div>
          <div class="col">
            <h1 class="p-0 m-0" style="font-size: 48px;font-weight: 700;color: var(--primary-color)">SIAKES</h1>
            <p class="p-0 m-0" style="font-size: 24px;font-weight: 400;color:black">SMK Nurul Gina Abidin</p>
          </div>
        </div>

        <form action="<?= base_url($link); ?>" method="post">
          <?= csrf_field(); ?>
          <div class="input-group">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?= old('username'); ?>">
          </div>
          <div class="mb-3 text-danger"><?= validation_show_error('username'); ?></div>
          <div class="input-group">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="mb-3 text-danger"><?= validation_show_error('password'); ?></div>
          <div class="row">
            <div class="col-9">
            </div>
            <!-- /.col -->
            <div class="col-3">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <?= $this->endSection('content') ?>