

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
  <div class="btn btn-secondary" readonly>Elektronik <span> <?php echo $jumlah->jenis_barang; ?></span></div>
  <div class="btn btn-secondary" readonly>Buku <span> <?php echo $jumlah1->jenis_barang; ?></span></div>
  <div class="btn btn-secondary" readonly>Kartu <span> <?php echo $jumlah2->jenis_barang; ?></span></div>
  <div class="btn btn-secondary" readonly>Lainnya <span> <?php echo $jumlah3->jenis_barang; ?></span></div>
</div>
<div class="accordion" id="accordionExample">
  <div class="card mb-3">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus" style="color:blue"></i> <b style="text-decoration: none;">Tambah Laporan Barang Hilang </b>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <div class="row">
      <div class="col-lg-5">
        <?php echo form_open_multipart('admin/buathilang'); ?>

          <div class="form-group">
            <label class="text1" for="nama">Nama Pemilik Barang :</label><br>
            <input type="text" name="nama" id="nama" class="form-control">
            <small class="form-text text-danger"><?= form_error('nama') ?></small>
          </div>

          <div class="form-group">
            <label class="text1" for="nama_barang">Nama Barang :</label><br>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control">
            <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
          </div>

          <div class="form-group">
            <label class="text1" for="jenis_barang">Jenis Barang :</label><br>
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
            <label class="text1" for="gambar">Pilih Gambar :</label><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                <label class="custom-file-label" for="gambar">Choose file</label>
              </div>        
              <small class="form-text text-danger"><?= form_error('gambar') ?></small>
          </div>

          <div class="form-group">
            <label class="text1" for="detail_informasi">Detail Informasi</label>
              <textarea class="form-control" name="detail_informasi" id="detail_informasi" rows="3"></textarea>
            <small class="form-text text-danger"><?= form_error('detail_informasi') ?></small>
          </div>

        
      </div>
      <div class="col-lg-5">
        
          <div class="form-group">
            <label class="text1" for="tempat_kehilangan">Tempat Kehilangan :</label><br>
            <input type="text" name="tempat_kehilangan" id="tempat_kehilangan" class="form-control">
            <small class="form-text text-danger"><?= form_error('tempat_kehilangan') ?></small>
          </div>

          <div class="form-group">
            <label class="text1" for="waktu_kehilangan">Waktu Kehilangan :</label><br>
            <input type="date" name="waktu_kehilangan" id="waktu_kehilangan" class="form-control">
            <small class="form-text text-danger"><?= form_error('waktu_kehilangan') ?></small>
          </div>

          <div class="form-group">
            <label class="text1" for="nomor_hp">Nomor Telepon / Whatsapp :</label><br>
            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control">
            <small class="form-text text-danger"><?= form_error('nomor_hp') ?></small>
            <small><p>** masukan nomor hp pemilik barang hilang</p></small>
          </div>

          <div class="form-group">
            <label class="text1" for="id_line">ID Line :</label><br>
            <input type="text" name="id_line" id="id_line" class="form-control">
            <small class="form-text text-danger"><?= form_error('id_ine') ?></small>
            <small><p>** masukan id line pemilik barang hilang</p></small>
          </div>

            <button type="submit" name="ubah" class="btn btn-primary mt-3">Tambah Data</button>
            <button type="reset" name="reset" class="btn btn-primary mt-3">Reset</button>

      </div>
      </div>
      <?php echo form_close() ?>
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
                    Data Kehilangan <strong> Berhasil!</strong> <?php echo $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="list-group">
            <li class="list-group-item active" style="text-align: center"><h3>Data Laporan Barang Hilang</h3>
            <form class="form-inline" action="<?php echo base_url('baranghilang/index'); ?>" method="get">
                <input class="form-control mr-2" type="text" placeholder="Masukan Nama" name="keyword">  <!-- value="<?= set_value('keyword') ?>" -->
                <input class="btn btn-outline-info mr-5" type="submit" name="submit"> 
              </form>
              <span> jumlah : <?= $total_rows; ?></span>
            </li>

            <?php if (empty($tabelkehilangan)) : ?>
              <div class="alert alert-danger mt-3" role="alert">
                  Data Hilang Tidak Di Temukan 
              </div>
            <?php endif; ?>
            
            <?php foreach ($tabelkehilangan as $hilang) : ?>
            <?php if($hilang['status'] == 1) {
                echo'<li class="list-group-item disabled" style="background-color: rgba(0,0,0,0.1);">';
              } else {
                echo'<li class="list-group-item">';
              }
              ?>

                <div class="media">
                <h6 style="color: black; font-weight: bold"><?= ++$start ?>.</h6>
                <div class="container">
                <div class="row">
                <div class="col-lg-10">
                    <div class="text-break" style="color:black">
                      <h6><b><?php echo $hilang['nama_barang']; ?></b>
                      <br></h6>
                      <p class="font-italic">"<?php echo $hilang['detail_informasi']; ?>"<br>
                    <a  class="float-right  ml-2 mt-2" href=""  id="edit-kategori" data-toggle="modal" data-target="#detail" data-id="<?= $hilang['id']; ?>" 
                      data-nama="<?= $hilang['nama']; ?>" 
                      data-nama_barang="<?= $hilang['nama_barang']; ?>"
                      data-jenis_barang="<?= $hilang['jenis_barang']; ?>"
                      data-detail_informasi="<?= $hilang['detail_informasi']; ?>"
                      data-tempat_kehilangan="<?= $hilang['tempat_kehilangan']; ?>"
                      data-waktu_kehilangan="<?= $hilang['waktu_kehilangan']; ?>"
                      data-nomor_hp="<?= $hilang['nomor_hp']; ?>"
                      data-id_line="<?= $hilang['id_line']; ?>">
                      <button class="btn btn-sm btn-info "><span class="fa fa-eye"></span></button>
                    </a> 

                     <br>
                      <p class="text-monospace text-right">Pemilik Barang : <?php echo $hilang['nama']; ?></p>
                      <p class="text-monospace text-right">Status : <?php echo $hilang['peran'] ?></p>
                      <p class="text-monospace text-right">Waktu Kehilangan : <?php echo $hilang['waktu_kehilangan']; ?></p>
                    </div>
                  </div>
                   <div class="col-l">
                      <?php if (empty($hilang['gambar'])): ?>
                        <img class="rounded ml-3" width="150" src="<?= base_url('Asset/img/kehilangan/no-image.png') ?> ">
                      <?php else: ?>
                        <img class="rounded ml-3" width="150" src="<?= base_url('Asset/img/kehilangan/') . $hilang['gambar']?> ">  
                      <?php endif ?>
                      
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
</div>
</body>


<?php foreach ($tabelkehilangan as $hilang) : ?>
  <div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Informasi Laporan Barang Hilang</h5>
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
              <label for="tempat_kehilangan" class="col-form-label">Tempat Kehilangan</label>
              <input type="text" class="form-control" id="tempat_kehilangan" name="tempat_kehilangan" readonly>
            </div>
            <div class="form-group">
              <label for="waktu_kehilangan" class="col-form-label">Waktu Kehilangan</label>
              <input type="text" class="form-control" id="waktu_kehilangan" name="waktu_kehilangan" readonly>
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

<script src="<?= base_url(); ?>Asset/js/Chart.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.3.1.slim.min.js"></script>

<script type="text/javascript"> 
  $(document).on("click","#edit-kategori", function(){
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var detail_informasi = $(this).data('detail_informasi');
    var tempat_kehilangan = $(this).data('tempat_kehilangan');
    var waktu_kehilangan = $(this).data('waktu_kehilangan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #id").val(id);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #nama_barang").val(nama_barang);
    $("#modal-edit #jenis_barang").val(jenis_barang);
    $("#modal-edit #detail_informasi").val(detail_informasi);
    $("#modal-edit #tempat_kehilangan").val(tempat_kehilangan);
    $("#modal-edit #waktu_kehilangan").val(waktu_kehilangan);
    $("#modal-edit #nomor_hp").val(nomor_hp);
    $("#modal-edit #id_line").val(id_line);
  })
</script>














