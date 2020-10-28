<body id="page-top" style="margin-top: 90px;">
<div id="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg">
  <div class="card mb-3 " style="max-width: 740px;">
    <h3 class="mb-2 mt-3 mr-auto ml-auto text-gray-800"><b><?= $judul; ?></b></h3><hr>
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
    <h1 class="h3 mb-3 mt-3 mr-auto ml-auto text-gray-800 "><b>Edit Profile</h1></b> <hr>
      <div class="row">
        <div class="col-lg ml-2 mr-2" style="color:black;">

          <?php echo form_open_multipart('user/edit'); ?>
            <div class="form-group row ml-2 ml-auto mr-auto ">
              <label for="email" class="col-sm-2 form-label">Email</label>
                <div class="col-lg">
                  <input type="text" class="form-control" id="email" name="email" value="<?= user()['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row row ml-2 ml-auto mr-auto ">
              <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-lg">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= user()['nama']; ?>" style="color:black;">
                    <small class="text-danger">
                       <?= form_error('nama')?>
                     </small>
                </div>
            </div>
            <div class="form-group row row ml-2 ml-auto mr-auto ">
              <div class="col-sm-2">Gambar</div>
                <div class="col-lg">
                  <div class="row">
                    <div class="profil col-sm-3 ">
                      <img src="<?= base_url('Asset/img/profil/') . user()['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label mt-3" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group row justify-content-end row ml-2 ml-auto mr-auto ">
              <div class="col-lg">
                <button type="submit" class="btn btn-primary mt-3">Edit Profil</button>
              </div>
            </div>
          </form>

        </div>
      </div> 
    </div>
  </div>
</div>


</div>
</div>
</body>







