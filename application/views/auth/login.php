<body style="margin-top: 50px;">
  <div class="container">    
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 90px">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                 
                  <?= $this->session->flashdata('message')?>

                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email') ?>">
                      <small class="text-danger">
                    <?= form_error('email')?>
                  </small>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <small class="text-danger">
                    <?= form_error('password')?>
                  </small>
                    </div>
                    <button text="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    
                  </form>

                  <hr>

                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/forgetpass'); ?>">Lupa Password ?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url(); ?>auth/registrasi">Buat Akun Baru !</a>
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



