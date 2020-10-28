

<body style="margin-top: 50px;">
  <div class="container">    
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 60px">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
              

              <form class="user" method="post" action="<?= base_url();?>auth/registrasi">
              <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Username" value="<?= set_value('nama') ?>">
                  <small class="text-danger">
                    <?= form_error('nama')?>
                  </small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                  <small class="text-danger">
                    <?= form_error('email')?>
                  </small>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <small class="text-danger">
                    <?= form_error('password1')?>
                  </small>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                    <small class="text-danger">
                    <?= form_error('password2')?>
                  </small>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/forgetpass'); ?>">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url(); ?>auth/login">Sudah Punya Akun? Login!</a>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</div>






