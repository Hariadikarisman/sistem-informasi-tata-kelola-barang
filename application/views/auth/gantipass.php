<body style="margin-top: 50px">
<div id="content">
<div class="container-fluid">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">

                  <div class="text-center">
                    <h3 class="h2 text-gray-900 ">Ganti Password Untuk</h3>
                    <h5 class="mb-2"><?= $this->session->userdata('reset_email'); ?></h5>
                  </div>

                  <?= $this->session->flashdata('message')?>

                  <form class="user" method="post" action="<?= base_url('auth/gantipass'); ?>">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password1" placeholder="Enter Password Baru..." name="password1">
                      <small class="text-danger">
                    <?= form_error('password1')?>
                    </small> 
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password2" placeholder="Ulangi Password Baru..." name="password2">
                      <small class="text-danger">
                    <?= form_error('password2')?>
                    </small> 
                    </div>
                    <button text="submit" class="btn btn-primary btn-user btn-block">
                      Ganti Password
                    </button>                    
                  </form>

                </div>
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

