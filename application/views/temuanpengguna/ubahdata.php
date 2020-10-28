<body id="page-top" style="margin-top: 90px;">
<div id="content">
<div class="container-fluid">
  <div class="row mb-3">
    <div class="card m-auto" style="width: 550px;">
      <div class="card-header">
        <h4>ubah data temuan barang</h4>
      </div>

      <div class="card-body">
        <?php echo form_open_multipart('temuanpengguna/ubahdata/'.$id); ?>
          <input type="hidden" name="id" value="<?= $temuan['id'] ?>">
            <div class="form-group">
              <label for="nama">Nama Pemilik Barang :</label><br>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $temuan['nama']; ?>">
              <small class="form-text text-danger"><?= form_error('nama') ?></small>
            </div>

            <div class="form-group">
              <label for="peran">Jenis Barang :</label><br>
                <select class="custom-select" id="peran" name="peran" >
                  <?php foreach ($peran as $jb) : ?>
                    <?php if( $jb == $temuan['peran']) : ?>
                      <option value="<?= $jb; ?>" selected><?= $jb; ?></option>
                    <?php else : ?>
                      <option value="<?= $jb; ?>"><?= $jb; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              <small class="form-text text-danger"><?= form_error('peran') ?></small>
            </div>

            <div class="form-group">
              <label for="nama_barang">Nama Barang :</label><br>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $temuan['nama_barang']; ?>">
              <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
            </div>

            <div class="form-group">
              <label for="jenis_barang">Jenis Barang :</label><br>
                <select class="custom-select" id="jenis_barang" name="jenis_barang" >
                  <?php foreach ($jenis_barang as $jb) : ?>
                    <?php if( $jb == $temuan['jenis_barang']) : ?>
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
                    <img src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?> " class="img-thumbnail" style="width: 100%; height: 100%" >
                  </div> 
                  <div class="col-lg-7">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar" value="<?= $temuan['gambar']; ?>" accept="image/*">
                      <label class="custom-file-label" for="gambar">Choose file</label>
                    </div> 
                  </div>
                </div>
              <small class="form-text text-danger"><?= form_error('gambar') ?></small>
            </div>

              <div class="form-group">
                <label for="detail_informasi">Detail Informasi</label>
                <input type="textarea" class="form-control" name="detail_informasi" id="detail_informasi" rows="3" value="<?= $temuan['detail_informasi']; ?>">
                <small class="form-text text-danger"><?= form_error('detail_informasi') ?></small>
              </div>

              <div class="form-group">
                <label for="tempat_temuan">Tempat temuan :</label><br>
                <input type="text" name="tempat_temuan" id="tempat_temuan" class="form-control" value="<?= $temuan['tempat_temuan']; ?>">
                <small class="form-text text-danger"><?= form_error('tempat_temuan') ?></small>
              </div>

              <div class="form-group">
                <label for="waktu_temuan">Waktu temuan :</label><br>
                <input type="date" name="waktu_temuan" id="waktu_temuan" class="form-control" value="<?= $temuan['waktu_temuan']; ?>">
                <small class="form-text text-danger"><?= form_error('waktu_temuan') ?></small>
              </div>

              <div class="form-group">
                <label for="nomor_hp">Nomor Telepon / Whatsapp :</label><br>
                <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="<?= $temuan['nomor_hp']; ?>">
                <small class="form-text text-danger"><?= form_error('nomor_hp') ?></small>
              </div>

              <div class="form-group">
                <label for="id_line">ID Line :</label><br>
                <input type="text" name="id_line" id="id_line" class="form-control" value="<?= $temuan['id_line']; ?>">
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
