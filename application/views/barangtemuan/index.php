<style type="text/css">
body{
  height: 100%;
   margin:0;
   padding:0;
  background: url(../../Asset/img/background.jpg) no-repeat center center fixed;
  background-size: cover;
}
  .img-profile{
    width:120px; 
    height:120px
  }
  .img-profile1{
    width:550px; 
    height:550px
  }
  input[type=checkbox],
  .menu{
    display: none;
  }
  @media screen and (max-width:768px){
    .menu{
      display:flex;
      cursor:pointer;
      justify-content: center;
    }
    .menu1{
      display: none;
    }
    input[type=checkbox]:checked ~ .menu1{
      display:block;
    }

  }
  .table {
  width: 100%;
  margin-left: auto;
  margin-right: auto;
}
.card-title {
  color: black;
}
.card-body {
  color: black;
}
.card-text{
  color: black;
}

</style>

<body id="page-top">
<div id="content">
<div class="container-fluid">
    <div class="btn-group mb-3" role="group" aria-label="Basic example">
      <div class="btn btn-secondary" readonly>Elektronik <span> <?php echo $hasil->jenis_barang; ?></span></div>
      <div class="btn btn-secondary" readonly>Buku <span> <?php echo $hasil1->jenis_barang; ?></span></div>
      <div class="btn btn-secondary" readonly>Kartu <span> <?php echo $hasil2->jenis_barang; ?></span></div>
      <div class="btn btn-secondary" readonly>Lainnya <span> <?php echo $hasil3->jenis_barang; ?></span></div>
    </div>
    <div class="accordion" id="accordionExample">
      <div class="card mb-3">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus" style="color:blue"></i> <b style="text-decoration: none;">Tambah Data Informasi Barang temuan </b>
        </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-5">
              <?php echo form_open_multipart('admin/buattemuan'); ?>
                <div class="form-group">
                  <label class="text1" for="nama">Nama Penemu Barang :</label><br>
                  <input type="text" name="nama" id="nama" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('nama') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="peran">Status :</label><br>
                    <select class="form-control" name="peran" id="peran">
                      <option >-</option>
                      <option >Mahasiswa</option>
                      <option >Dosen</option>
                      <option >Masyarakat</option>
                      <option >Tamu Berkunjung</option>
                      <option >Karyawan</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('jenis_barang') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="nama_barang">Nama Barang :</label><br>
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="jenis_barang">Jenis Barang :</label><br>
                    <select class="form-control" name="jenis_barang" id="jenis_barang" required>
                      <option selected>-</option>
                      <option >Elektronik</option>
                      <option >Buku</option>
                      <option >Kartu</option>
                      <option >Lainnya</option>
                    </select>
                  <small class="form-text text-danger"><?= form_error('jenis_barang') ?></small>
                </div>
                <div class="form-group">
                   <label class="text1" for="jenis_barang">Pilih Gambar :</label><br>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" required>
                      <label class="custom-file-label" for="gambar">Choose file</label>
                    </div>        
                  <small class="form-text text-danger"><?= form_error('gambar') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="detail_informasi">Detail Informasi</label>
                    <textarea class="form-control" name="detail_informasi" id="detail_informasi" rows="3" required></textarea>
                  <small class="form-text text-danger"><?= form_error('detail_informasi') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="tempat_temuan">Tempat temuan :</label><br>
                  <input type="text" name="tempat_temuan" id="tempat_temuan" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('tempat_temuan') ?></small>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group">
                  <label class="text1" for="waktu_temuan">Waktu temuan :</label><br>
                  <input type="date" name="waktu_temuan" id="waktu_temuan" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('waktu_temuan') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="nomor_hp">Nomor Telepon / Whatsapp :</label><br>
                  <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('nomor_hp') ?></small>
                  <small><p>** masukan nomor hp admin</p></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="id_line">ID Line :</label><br>
                  <input type="text" name="id_line" id="id_line" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('id_ine') ?></small>
                  <small><p>** beri tanda (-) jika tidak memiliki id line</p></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="email_penemu">Email Penemu :</label><br>
                  <input type="text" name="email_penemu" id="email_penemu" class="form-control" required>
                  <small class="form-text text-danger"><?= form_error('id_ine') ?></small>
                </div>
                <div class="form-group">
                  <label class="text1" for="ket">Keterangan Barang :</label><br>
                    <select class="form-control" name="ket" id="ket" required>
                      <option name="ket" id="ket"> Titipan Penemu</option>
                      <option name="ket" id="ket"> Bukan Titipan</option>
                    </select>
                </div>
                  <button type="submit" name="ubah" class="btn btn-primary mt-3">Tambah Data</button>
                  <button type="reset" name="reset" class="btn btn-primary mt-3">Reset</button>
              </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
    <div class="row">
      <div class="table col-lg ">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <?php if($this->session->flashdata('flash')) : ?>
              <div class="col-md-6">
                <div class="row mt-3">
                  <div class="table" style="width: 100%; margin-left: auto; margin-right: auto;">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data temuan <strong> Berhasil!</strong> <?php echo $this->session->flashdata('flash'); ?>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            
            <div class="list-group">
              <li class="list-group-item active" style="text-align: center"><h3>Data Barang Temuan</h3>
            <form class="form-inline" action="<?php echo base_url('barangtemuan/index'); ?>" method="get">
                <input class="form-control mr-2" type="text" placeholder="Masukan Nama" name="keyword">  <!-- value="<?= set_value('keyword') ?>" -->
                <input class="btn btn-outline-info mr-5" type="submit" name="submit"> 
              </form>
              <span> jumlah : <?= $total_rows; ?></span>
            </li>
              <?php if (empty($tabeltemuan)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Data temuan Tidak Di Temukan 
                </div>
              <?php endif; ?>


              <?php foreach ($tabeltemuan as $temuan) : ?>
                <?php if($temuan['status'] || $temuan['selesai'] == 1) {
                  echo'<li class="list-group-item disabled" style="background-color: rgba(0,0,0,0.1);">';
                } else {
                  echo'<li class="list-group-item">';
                }
                ?>
                <div class="media">

                  <h6 style="color: black; font-weight: bold"><?= ++$start ?>.</h6>
                    <div class="container">
                      <div class="row">
                        <div class=" col-lg-2 ">
                          <a href="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?>">
                            <img class="rounded" width="150" src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']; ?> "">
                          </a>
                        </div>
                        <div class="col-lg-9 ">
                          <div class="text-break" style="color:black">
                            <h6 class="mt-2"><b><?php echo $temuan['nama_barang']; ?></b><br></h6>
                            <p class="font-italic">" <?php echo $temuan['detail_informasi']; ?> "</p><br>
                            
                            <hr>
                            <p class="text-monospace text-right">Penemu : <?php echo $temuan['nama']; ?></p>
                            <p class="text-monospace text-right">Status : <?php echo $temuan['peran'] ?></p>
                            <p class="text-monospace text-right">Waktu Temuan : <?php echo $temuan['waktu_temuan']; ?></p>
                          </div>
                        </div>
                        <div class="col-lg-1 ">
                          <a href="" id="edit-kategori" data-toggle="modal" data-target="#detail" 
                            data-id="<?= $temuan['id']; ?>" 
                            data-nama="<?= $temuan['nama']; ?>" 
                            data-nama_barang="<?= $temuan['nama_barang']; ?>"
                            data-jenis_barang="<?= $temuan['jenis_barang']; ?>"
                            data-detail_informasi="<?= $temuan['detail_informasi']; ?>"
                            data-tempat_temuan="<?= $temuan['tempat_temuan']; ?>"
                            data-waktu_temuan="<?= $temuan['waktu_temuan']; ?>"
                            data-nomor_hp="<?= $temuan['nomor_hp']; ?>"
                            data-id_line="<?= $temuan['id_line']; ?>">
                              <button class="btn btn-sm btn-info mt-1 mb-1"> Lihat </button>
                          </a>
                          
                          <a href=" ">
                            <?php 
                              if($temuan['status'] == 1){
                                if($temuan['selesai'] == 1){
                                  echo'<button class="btn btn-sm btn-success mt-1 mb-1" > <i class="fas fa-check-circle"></i> Selesai </button>';
                                } else {
                                  echo'<button class="btn btn-sm btn-danger mt-1 mb-1" disabled> <i class="fas fa-minus-circle"></i> Sudah Diklaim </button>';
                                }
                              
                              } else { 
                                // echo'<button class="btn btn-sm btn-warning mt-1 mb-1" > Klaim </button>';
                              }
                            ?>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

              
                </li>
              <?php endforeach; ?>
              <div class="mt-4">
              <?= $this->pagination->create_links(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>        
    </div>
</div>
</div>
</body>

<!-- modal klaim barang -->
<?php foreach ($tabeltemuan as $temuan) : ?>
<div class="modal fade" id="klaim<?= $temuan['id']; ?>" role="dialog" aria-labelledby="klaimLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="klaimLabel">Klaim Barang Temuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('barangtemuan/klaimbarang/' .$temuan['id']) ?>" method="post">
      <input type="hidden" name="id_barang" id="id_barang" value="<?= $temuan['id'] ?>">
        <div id="edit-temuan" class="modal-body">
        <input type="hidden" name="id" id="id" value="<?= $temuan['id'] ?>">
          <div class="form-group">
            <label class="text2" for="namapemilik">nama Pemilik Barang :</label><br>
            <input type="text" name="namapemilik" id="namapemilik" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="text2" for="bukti">Bukti Barang :</label><br>
            <textarea type="text" name="bukti" id="bukti" class="form-control" required></textarea> 
          </div>
          <div class="form-group">
            <label class="text2" for="waktu">Waktu Pengambilan barang :</label><br>
            <input type="text" name="waktu" id="waktu" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="text1" for="status">Status :</label><br>
              <select class="form-control" name="status" id="status">
                <option name="status" id="status" value="1"> Tidak Aktif</option>
              </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Klaim</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- akhir modal klaim barang -->

<!-- modal detil barang temuan -->
<?php foreach ($tabeltemuan as $temuan) : ?>
  <div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Informasi Laporan Barang temuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
        <div id="modal-edit" class="modal-body">
            <div class="form-group">
              <label for="nama" class="col-form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" readonly>
            </div>
            <div class="form-group">
              <label for="nama_barang" class="col-form-label">Nama Barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
            </div>
            <div class="form-group">
              <label for="jenis_barang" class="col-form-label">Jenis Barang</label>
              <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" readonly>
            </div>
            <div class="form-group">
              <label for="detail_informasi" class="col-form-label">Detil Informasi</label>
              <textarea type="text-area" class="form-control" id="detail_informasi" name="detail_informasi" readonly></textarea>
            </div>
            <div class="form-group">
              <label for="tempat_temuan" class="col-form-label">Tempat temuan</label>
              <input type="text" class="form-control" id="tempat_temuan" name="tempat_temuan" readonly>
            </div>
            <div class="form-group">
              <label for="waktu_temuan" class="col-form-label">Waktu temuan</label>
              <input type="text" class="form-control" id="waktu_temuan" name="waktu_temuan" readonly>
            </div>
            <div class="form-group">
              <label for="nomor_hp" class="col-form-label">Nomor Hp</label>
              <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" hidden>
              <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" readonly>
            </div>
            <div class="form-group">
              <label for="id_line" class="col-form-label">Id Line</label>
              <input type="number" class="form-control" id="id_line" name="id_line" hidden>
              <input type="text" class="form-control" id="id_line" name="id_line" readonly>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- akhir modal detil barang temuan -->

<script src="<?= base_url(); ?>Asset/js/Chart.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript"> 
  $(document).on("click","#edit-kategori", function(){
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var detail_informasi = $(this).data('detail_informasi');
    var tempat_temuan = $(this).data('tempat_temuan');
    var waktu_temuan = $(this).data('waktu_temuan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #id").val(id);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #nama_barang").val(nama_barang);
    $("#modal-edit #jenis_barang").val(jenis_barang);
    $("#modal-edit #detail_informasi").val(detail_informasi);
    $("#modal-edit #tempat_temuan").val(tempat_temuan);
    $("#modal-edit #waktu_temuan").val(waktu_temuan);
    $("#modal-edit #nomor_hp").val(nomor_hp);
    $("#modal-edit #id_line").val(id_line);
  })
</script>
<script type="text/javascript"> 
  $(document).on("click","#edit-klaim", function(){
    var id = $(this).data('id');
    
    $("#edit-temuan #id").val(id);
  })
</script>

<script type="text/javascript"> 
  $(document).on("click","#edit-aktif", function(){
    var id = $(this).data('id');
    
    $("#edit-aktif #id").val(id);
  })
</script>





