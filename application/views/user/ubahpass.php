<body id="page-top" style="margin-top: 90px;">
<div id="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg">
  <div class="card mb-3 " style="max-width: 740px;">
    <h3 class="mb-2 mt-3 mr-auto ml-auto text-gray-800"><b>Profil</b></h3><hr>
      <div class="row no-gutters">
        <div class="col">
          <img src="<?= base_url('Asset/img/profil/').user()['image'];?>" class="card-img mb-2 ml-2">
        </div>
        <div class="col">
          <div class="card-body" style="color: black;">
            <h5 class="card-text" ><b><?= user()['nama'];?></b></h5>
            <p class="card-text"><?= user()['email'];?></p>
            <p class="card-text"><small class="text-muted">Anggota sejak : <?= date('d F Y', user()['date_create']);?></small></p>
          </div>
        </div>
      </div>
  </div>
</div>


<div class="col-lg-7">
<div class="card mb-3">             
    <h1 class="h3 mb-3 mt-3 ml-auto mr-auto "><b><?= $judul; ?></h1></b> <hr>
        <div class="col-lg" style="color: black;">
          <form action="<?= base_url('user/ubahpass'); ?>" method="post">
            <div class="form-group">
                <label for="passawal">Password Sekarang</label>
                <input type="password" class="form-control" id="passawal" name="passawal">
                <small class="text-danger"><?= form_error('passawal')?></small>
            </div>
            <div class="form-group">
                <label for="passbaru">Password Baru</label>
                <input type="password" class="form-control" id="passbaru" name="passbaru">
                <small class="text-danger"><?= form_error('passbaru')?></small>
            </div>
            <div class="form-group">
                <label for="passulang">Ulangi Password</label>
                <input type="password" class="form-control" id="passulang" name="passulang">
                <small class="text-danger"><?= form_error('passulang')?></small>
            </div>
            <div class="form group mb-3">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
            </div>
          </form>
        </div>
  </div>


</div>
</div>
</body>












