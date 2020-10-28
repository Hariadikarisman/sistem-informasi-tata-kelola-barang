<body id="page-top" style="margin-top: 80px;">
<div id="content">
<div class="container">
  <div class="card mb-3">
    <h1 class="h3 mb-3 mt-3 ml-auto mr-auto text-gray-800 "><b><?= $judul; ?></h1></b> <hr>
      <div class="row">
        <div class="col-lg-8" style="color:black;">

          <?php echo form_open_multipart('user/edit'); ?>
            <div class="form-group row ml-2 ml-auto mr-auto ">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= user()['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row row ml-2 ml-auto mr-auto ">
              <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= user()['nama']; ?>" style="color:black;">
                    <small class="text-danger">
                       <?= form_error('nama')?>
                     </small>
                </div>
            </div>
            <div class="form-group row row ml-2 ml-auto mr-auto ">
              <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
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
            <div class="form-group row justify-content-end row ml-2 ml-auto mr-auto ">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit Profil</button>
              </div>
            </div>
          </form>

        </div>
      </div> 
    </div>
  </div>
</div>
</div>
</body>







