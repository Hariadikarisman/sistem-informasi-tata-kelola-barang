<!-- <style type="text/css">
body{
  height: 100%;
   margin:0;
   padding:0;
  background: url(../Asset/img/bg.jpg) no-repeat center center fixed;
  background-size: cover;
}
  .card-body img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
}
.text{
  color: black;
  font-weight: bold;
}
.card-header h4{
  color: black;
  font-weight: bold;
}
</style>

<body id="page-top">
<div id="content">
<div class="container-fluid">
  <div class="row mb-3">
    <div class="card m-auto" style="width:550px">
      <div class="card-header">
        <h4>Masukan data Kehilangan barang</h4>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart('admin/buathilang'); ?>

          <div class="form-group">
            <label class="text" for="nama">Nama Pemilik Barang :</label><br>
            <input type="text" name="nama" id="nama" class="form-control">
            <small class="form-text text-danger"><?= form_error('nama') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="nama_barang">Nama Barang :</label><br>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control">
            <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="jenis_barang">Jenis Barang :</label><br>
              <select class="form-control" name="jenis_barang" id="jenis_barang">
                <option selected>-</option>
                <option >Elektronik</option>
                <option >Buku</option>
                <option >Kartu</option>
                <option >Lainnya</option>
              </select>
            <small class="form-text text-danger"><?= form_error('jenis_barang') ?></small>
          </div>

          <div class="form-group">
            <h6 class="text">Select images:</h6><br> 
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                <label class="custom-file-label" for="gambar">Choose file</label>
              </div>        
            <small class="form-text text-danger"><?= form_error('gambar') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="detail_informasi">Detail Informasi</label>
              <textarea class="form-control" name="detail_informasi" id="detail_informasi" rows="3"></textarea>
            <small class="form-text text-danger"><?= form_error('detail_informasi') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="tempat_kehilangan">Tempat Kehilangan :</label><br>
            <input type="text" name="tempat_kehilangan" id="tempat_kehilangan" class="form-control">
            <small class="form-text text-danger"><?= form_error('tempat_kehilangan') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="waktu_kehilangan">Waktu Kehilangan :</label><br>
            <input type="text" name="waktu_kehilangan" id="waktu_kehilangan" class="form-control">
            <small class="form-text text-danger"><?= form_error('waktu_kehilangan') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="nomor_hp">Nomor Telepon / Whatsapp :</label><br>
            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control">
            <small class="form-text text-danger"><?= form_error('nomor_hp') ?></small>
          </div>

          <div class="form-group">
            <label class="text" for="id_line">ID Line :</label><br>
            <input type="text" name="id_line" id="id_line" class="form-control">
            <small class="form-text text-danger"><?= form_error('id_ine') ?></small>
          </div>

            <button type="submit" name="ubah" class="btn btn-primary mt-3">Tambah Data</button>
            <button type="reset" name="reset" class="btn btn-primary mt-3">Reset</button>

        </form>
      </div>
    </div>
  </div>
</div>
</div>





</body>












 -->
