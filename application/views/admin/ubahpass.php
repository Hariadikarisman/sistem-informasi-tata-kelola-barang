


        
               
        <div class="container">
        <div class="card mb-3">
                   
<h1 class="h3 mb-3 mt-3 ml-auto mr-auto text-gray-800"><b><?= $judul; ?></h1></b> <hr>

<div class="row">
<div class="col-lg-6">


    <form action="<?= base_url('admin/ubahpass'); ?>" method="post">
    <div class="form-group ml-3">
        <label for="passawal">Password Sekarang</label>
        <input type="password" class="form-control" id="passawal" name="passawal">
        <small class="text-danger"><?= form_error('passawal')?></small>
    </div>
    <div class="form-group ml-3">
        <label for="passbaru">Password Baru</label>
        <input type="password" class="form-control" id="passbaru" name="passbaru">
        <small class="text-danger"><?= form_error('passbaru')?></small>
    </div>
    <div class="form-group ml-3">
        <label for="passulang">Ulangi Password</label>
        <input type="password" class="form-control" id="passulang" name="passulang">
        <small class="text-danger"><?= form_error('passulang')?></small>
    </div>
    <div class="form group mb-3 ml-3 ">
        <button type="submit" class="btn btn-primary">Ubah Password</button>
    </div>
    </form>
</div>
</div>

</div>

</div>
</div>



