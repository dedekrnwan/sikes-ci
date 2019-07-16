<style>
  .bg-custom {
    background: url('<?= base_url() ?>public/assets/images/bg-green.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
</style>

<body class="hold-transition login-page bg-custom">
  <div class="login-box">

    <div class="login-box-body">
      <div class="login-logo">
        <a href="#">
          <font color="#666"><b>SIKES</b> </font>
        </a>
      </div>
      <!-- /.login-logo -->
      <p class="login-box-msg"><b>Sistem Informasi Keuangan Sekolah</b></p>

      <form action="#">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row mb-1">
          <!-- /.col -->
          <div class="col-xs-12">
          <a href="<?= base_url() ?>dashboard">
            <button type="button" class="btn btn-block btn-flat btn-danger login"><i class="fa fa-mail-forward"></i> Login</button>
          </a>
            <!-- <button type="button" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
          </div>
          <!-- /.col -->
        </div>
        <div class="text-center" style="margin-top:10px">
          <i>
            <p><small>Copyright &copy; SIKES 2019</small>
              <p>
          </i>
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->