<style type="text/css">
  .card-body{
    color:black;
  }
</style>
         


  <div class="container-fluid">
  <h3 class="mb-2 mt-3 mr-auto ml-auto text-gray-800"><b><?= $judul; ?></b></h3><hr>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4 mt-2">
       <center><img src="<?= base_url('Asset/img/profil/').user()['image'];?>" class="rounded mb-2 mr-4 mt-2" width="150"></center> 
      </div>
      <div class="col-md-8">
        <div class="card-body" style="color: black;">
            <h5 class="card-text" ><b><?= user()['nama'];?></b></h5>
            <p class="card-text"><?= user()['email'];?></p>
            <p class="card-text"><small class="text-muted">Anggota sejak : <?= date('d F Y', user()['date_create']);?></small></p>
          </div>
      </div>
    </div>
  </div>
  <hr>
</div>



<div class="col-lg-7">
<div class="card mb-3">
    <h1 class="h3 mb-3 mt-3 mr-auto ml-auto text-gray-800 "><b>Edit Profile</h1></b> <hr>
      <div class="row">
        <div class="col-lg ml-2 mr-2" style="color:black;">

          <?php echo form_open_multipart('user/edit'); ?>
            <div class="form-group row  ">
              <label for="email" class="col-lg col-form-label">Email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= user()['email']; ?>" readonly>
                </div>
            </div>
           
            <div class="form-group row row ">
              <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-lg">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= user()['nama']; ?>" style="color:black;">
                    <small class="text-danger">
                       <?= form_error('nama')?>
                     </small>
                </div>
            </div>
            <div class="form-group row row ">
              <div class="col-sm-2">Gambar</div>
                <div class="col-lg">
                  <div class="row">
                    <div class="profil col-sm-3 ">
                      <img src="<?= base_url('Asset/img/profil/') . user()['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group row justify-content-end row ">
              <div class="col-lg">
                <button type="submit" class="btn btn-primary">Edit Profil</button>
              </div>
            </div>
          </form>

        </div>
      </div> 
    </div>
  </div>







