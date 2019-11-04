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
  <div class="col-md-4 col-md-offset-4" style="margin-top: 70px">
    <div id="box-login" class="box box-warning">
      <div class="box-header text-center">
        <h3 class="box-title" style="font-size: 30px;">
          <b>SIKES</b>
        </h3>
        <p style="font-size: 15px;"><b>(Sistem Informasi Keuangan Sekolah)</b></p>
      </div>
      <div class="box-body">
        <form id="form-login">
          <input type="hidden" name="type" value="ortu">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="NIS">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="password" class="form-control datepicker" placeholder="Tgl Lahir">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row mb-1">
            <!-- /.col -->
            <div class="col-xs-12">
              <button btn-login type="button" class="btn btn-block btn-flat btn-warning">
                <i class="fa fa-mail-forward"></i> Login
              </button>
              <!-- <button type="button" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
            </div>
            <!-- /.col -->
          </div>
          <div class="row mb-2">
            <!-- /.col -->
            <div class="col-xs-12 text-center">
              <a href="<?= base_url() ?>auth/login"><i><small>Klik disini untuk login sebagai admin</small></i></a>
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
    </div>
  </div>