<style type="text/css">
    body{
  height: 100%;
   margin:0;
   padding:0;
  background-color:   #DCDCDC;
  background-size: cover;
   
 
}

</style>


<body id="page-top">


<div class="container-fluid">
  <div class="card mb-3" style="max-width: 740px;">
    <div class="row no-gutters">
      <div class="col-md-4 mt-2">
        <img src="<?= base_url('Asset/img/profil/').$user['image'];?>" class="card-img mb-2 mr-4">
      </div>
      <div class="col-md-8">
        <div class="card-body ml-4" style="color: black;">
          <h5 class="card-text" ><b><?= $user['nama'];?></b></h5>
          <p class="card-text"><?= $user['email'];?></p>
          <p class="card-text"><small class="text-muted">Anggota sejak : <?= date('d F Y', $user['date_create']);?></small></p>
        </div>
      </div>
    </div>
  </div>
  <hr>
</div>

<div id="content">
<div class="container-fluid">
  <div class="row mb-3">
    <div class="card m-auto" style="width: 550px;">
      <div class="card-header">
        <h4>ubah data Kehilangan barang</h4>
      </div>

      <div class="card-body">
        <?php echo form_open_multipart('datahilang/ubah/'.$id_user); ?>
          <input type="hidden" name="id" value="<?= $tabelkehilangan['id'] ?>">
            <div class="form-group">
              <label for="nama">Nama Pemilik Barang :</label><br>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $tabelkehilangan['nama']; ?>">
              <small class="form-text text-danger"><?= form_error('nama') ?></small>
            </div>

            <div class="form-group">
              <label for="nama_barang">Nama Barang :</label><br>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $tabelkehilangan['nama_barang']; ?>">
              <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
            </div>

            <div class="form-group">
              <label for="jenis_barang">Jenis Barang :</label><br>
                <select class="custom-select" id="jenis_barang" name="jenis_barang" >
                  <?php foreach ($jenis_barang as $jb) : ?>
                    <?php if( $jb == $tabelkehilangan['jenis_barang']) : ?>
                      <option value="<?= $jb; ?>" selected><?= $jb; ?></option>
                    <?php else : ?>
                      <option value="<?= $jb; ?>"><?= $jb; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              <small class="form-text text-danger"><?= form_error('jenis_barang') ?></small>
            </div>

            <div class="form-group">
              <h6 >Select images:</h6>
                <div class="row">
                  <div class="col-lg-5">
                    <img src="<?= base_url('Asset/img/kehilangan/') . $tabelkehilangan['gambar']?> " class="img-thumbnail" style="width: 100%; height: 100%" >
                  </div> 
                  <div class="col-lg-7">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar" value="<?= $tabelkehilangan['gambar']; ?>" accept="image/*">
                      <label class="custom-file-label" for="gambar">Choose file</label>
                    </div> 
                  </div>
                </div>
              <small class="form-text text-danger"><?= form_error('gambar') ?></small>
            </div>

              <div class="form-group">
                <label for="detail_informasi">Detail Informasi</label>
                <input type="textarea" class="form-control" name="detail_informasi" id="detail_informasi" rows="3" value="<?= $tabelkehilangan['detail_informasi']; ?>">
                <small class="form-text text-danger"><?= form_error('detail_informasi') ?></small>
              </div>

              <div class="form-group">
                <label for="tempat_kehilangan">Tempat kehilangan :</label><br>
                <input type="text" name="tempat_kehilangan" id="tempat_kehilangan" class="form-control" value="<?= $tabelkehilangan['tempat_kehilangan']; ?>">
                <small class="form-text text-danger"><?= form_error('tempat_kehilangan') ?></small>
              </div>

              <div class="form-group">
                <label for="waktu_kehilangan">Waktu kehilangan :</label><br>
                <input type="date" name="waktu_kehilangan" id="waktu_kehilangan" class="form-control" value="<?= $tabelkehilangan['waktu_kehilangan']; ?>">
                <small class="form-text text-danger"><?= form_error('waktu_kehilangan') ?></small>
              </div>

              <div class="form-group">
                <label for="nomor_hp">Nomor Telepon / Whatsapp :</label><br>
                <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="<?= $tabelkehilangan['nomor_hp']; ?>">
                <small class="form-text text-danger"><?= form_error('nomor_hp') ?></small>
              </div>

              <div class="form-group">
                <label for="id_line">ID Line :</label><br>
                <input type="text" name="id_line" id="id_line" class="form-control" value="<?= $tabelkehilangan['id_line']; ?>">
                <small class="form-text text-danger"><?= form_error('id_ine') ?></small>
              </div>

              <button type="submit" name="ubah" class="btn btn-primary mt-3">Ubah Data</button>      
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>

