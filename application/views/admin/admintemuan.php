<style type="text/css">
body{
  height: 100%;
   margin:0;
   padding:0;
  background: url(../../Asset/img/background.jpg) no-repeat center center fixed;
  background-size: cover;
}
  .img-profile{
    width:150px; 
    height:150px
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
  <div class="row">
<div class="container-fluid">
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/admintemuan/elektronik">Data Temuan</a></li>
    <li class="breadcrumb-item" > <a href="<?= base_url(); ?>admin/adminhilang/elektronik">Data Hilang</a></li>
  </ol>
</nav>
</div>

    <div class="col-lg-2 mb-3">
      <label for="menu" class="menu btn btn-primary col-sm-3">jenis barang</label>
      <input type="checkbox" id="menu">
      <div class="menu1">
        <ul class="list-group" id="list-tab" role="tablist">
          <li class="list-group-item active" style="text-align: center">Jenis Barang</li>
          <a href="<?php echo site_url(); ?>admin/admintemuan/elektronik"><li class="list-group-item">Elektronik<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>admin/admintemuan/buku"><li class="list-group-item">Buku<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>admin/admintemuan/kartu"><li class="list-group-item">Kartu<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>admin/admintemuan/Lainnya"><li class="list-group-item">Lainnya<span class="badge badge-info float-right"></span></li></a>
        </ul>
      </div>
    </div>
    
    <div class="table col-lg-10 ">
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
            <li class="list-group-item active" style="text-align: center"><h3>Data temuan <?= ucfirst($jenis) ?></h3>
              <form class="form-inline" action="" method="post">
                <input class="form-control mr-2" type="search" placeholder="Masukan Nama" name="keyword">
                <button class="btn btn-outline-info" type="submit">Temukan</button>
              </form>
            </li>

            <?php if (empty($tabeltemuan)) : ?>
              <div class="alert alert-danger mt-3" role="alert">
                  Data temuan Tidak Di Temukan 
              </div>
            <?php endif; ?>

            
            <?php $i=1; foreach ($tabeltemuan as $temuan) : ?>
            <?php if($temuan['status'] || $temuan['selesai'] == 1) {
                  echo'<li class="list-group-item disabled" style="background-color: rgba(0,0,0,0.04);">';
                } else {
                  echo'<li class="list-group-item">';
                }
                ?>
                <div class="media">
                  <h6 style="color: black; font-weight: bold"><?= $i++; ?>.</h6>
                  <div class="container">
                  <div class="row">
                  <div class=" col-lg-2 ">
                    <a href="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?>">
                      <img class="rounded" width="150" src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']; ?> ">
                    </a>
                  </div>

                  <div class="col-lg-10">
                    <div class="text-break ml-4" style="color:black">
                      <h6><b><?php echo $temuan['nama_barang']; ?></b>
                      <?php if($temuan['selesai'] == 1){
                          echo'<span class="badge badge-sm badge-success mt-1 mb-1" disabled> <i class="fas fa-check-circle"></i> Selesai </span>';
                        
                          } else {
                            echo'<span class="badge badge-sm badge-danger mt-1 mb-1"> <i class="fas fa-minus-circle"></i> Menunggu </span>';
                          }
                        ?><br></h6>
                      <p class="font-italic"> " <?php echo $temuan['detail_informasi']; ?> " <br><a  class="float-right  ml-2 mt-2" href=""  id="edit-kategori" data-toggle="modal" data-target="#detail" data-id="<?= $temuan['id']; ?>" 
                      data-nama="<?= $temuan['nama']; ?>" 
                      data-nama_barang="<?= $temuan['nama_barang']; ?>"
                      data-jenis_barang="<?= $temuan['jenis_barang']; ?>"
                      data-detail_informasi="<?= $temuan['detail_informasi']; ?>"
                      data-tempat_temuan="<?= $temuan['tempat_temuan']; ?>"
                      data-waktu_temuan="<?= $temuan['waktu_temuan']; ?>"
                      data-nomor_hp="<?= $temuan['nomor_hp']; ?>"
                      data-id_line="<?= $temuan['id_line']; ?>">
                      <button class="btn btn-sm btn-info "><span class="fa fa-eye"></span></button>
                    </a> 

                    

                    <a href="<?php echo base_url('admin/ubahdatatemuan/'. $temuan['id']. '/'. $jenis); ?>">
                      <button class="btn btn-sm btn-warning float-right ml-2 mt-2"><span class="fa fa-edit"></span></button>
                    </a> 



                    <a href="<?php echo base_url('admin/hapusdatatemuan/'. $temuan['id']. '/'. $jenis);  ?>" onclick="return confirm('yakin hapus data ?');">
                      <button class="btn btn-sm btn-danger float-right mt-2"><span class="fa fa-trash"></span></button>
                    </a> 

                     <a href="" id="edit-klaim" data-toggle="modal" data-target="#klaim<?= $temuan['id']; ?>" data-id="<?= $temuan['id'] ?>">
                            <?php 
                              if($temuan['status'] == 1){
                                if($temuan['selesai'] == 1){
                                  echo'<button class="btn btn-sm btn-success mt-2 mr-2 float-right" > <i class="fas fa-check-circle"></i> Selesai </button>';
                                } else {
                                  echo'<button class="btn btn-sm btn-danger mt-2 mr-2 float-right" disabled> <i class="fas fa-minus-circle"></i> Sudah Diklaim </button>';
                                }
                              
                              } else { 
                                echo'<button class="btn btn-sm btn-warning mt-2 mr-2 float-right" > Klaim </button>';
                              }
                            ?>
                          </a> <br> 

                    <!-- </p> -->
                      <p class="text-monospace text-right mt-4">Penemu : <?php echo $temuan['nama']; ?></p>
                      <p class="text-monospace text-right">Email : <?php echo $temuan['email_penemu']; ?></p>
                      <p class="text-monospace text-right">Waktu Temuan : <?php echo $temuan['waktu_temuan']; ?></p>
                      <p class="text-monospace text-right">Keterangan : <?php echo $temuan['ket']; ?></p>
                    </div>
                  </div>
                  </div>
                  </div>
        </li>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
           
  </div>
</div>
</div>
</div>
</body>


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
            <input type="date" name="waktu" id="waktu" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="text1" for="status">Status :</label><br>
            <input type="radio" name="status" id="status" value="1" required> Tidak Aktif
             <!--  <select class="form-control" name="status" id="status">
                <option name="status" id="status" value="0"> - </option>
                <option name="status" id="status" value="1"> Tidak Aktif</option>
              </select> -->
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



<?php foreach ($tabeltemuan as $temuan) : ?>
  <div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
        <div id="modal-edit" class="modal-body">
            <div class="form-group">
              <label for="nama" class="col-form-label">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama" readonly>
            </div>
            <div class="form-group">
              <label for="nama_barang" class="col-form-label">nama_barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
            </div>
            <div class="form-group">
              <label for="jenis_barang" class="col-form-label">jenis_barang</label>
              <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" readonly>
            </div>
            <div class="form-group">
              <label for="detail_informasi" class="col-form-label">detail_informasi</label>
              <textarea type="text-area" class="form-control" id="detail_informasi" name="detail_informasi" readonly></textarea>
            </div>
            <div class="form-group">
              <label for="tempat_temuan" class="col-form-label">tempat_temuan</label>
              <input type="text" class="form-control" id="tempat_temuan" name="tempat_temuan" readonly>
            </div>
            <div class="form-group">
              <label for="waktu_temuan" class="col-form-label">waktu_temuan</label>
              <input type="text" class="form-control" id="waktu_temuan" name="waktu_temuan" readonly>
            </div>
            <div class="form-group">
              <label for="nomor_hp" class="col-form-label">nomor_hp</label>
              <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" hidden>
              <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" readonly>
            </div>
            <div class="form-group">
              <label for="id_line" class="col-form-label">id_line</label>
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





