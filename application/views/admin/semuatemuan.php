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

    <div class="col-lg-2 mb-3">
      <label for="menu" class="menu btn btn-primary col-sm-3">jenis barang</label>
      <input type="checkbox" id="menu">
      <div class="menu1">
        <ul class="list-group" id="list-tab" role="tablist">
          <li class="list-group-item active" style="text-align: center">Jenis Barang</li>
          <a href="<?php echo site_url(); ?>temuanpengguna/index/elektronik"><li class="list-group-item">Elektronik<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>temuanpengguna/index/buku"><li class="list-group-item">Buku<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>temuanpengguna/index/kartu"><li class="list-group-item">Kartu<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>temuanpengguna/index/Lainnya"><li class="list-group-item">Lainnya<span class="badge badge-info float-right"></span></li></a>
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

            
            <?php foreach ($tabeltemuan as $temuan) : ?>
              <li class="list-group-item">
          <div class="media">
              
            <div class="col-lg-2">
            <a href="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?>">
              <img class="img-profile" src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?> ">
            </a>
            </div>

            <div class="col-lg-9">
              <div class="text-break" style="color:black">
                <h6>Nama penemu : <?php echo $temuan['nama']; ?></>
                <h6>Nama barang : <b><?php echo $temuan['nama_barang']; ?></b></h6>
                <h6>Waktu temuan : <?php echo $temuan['waktu_temuan']; ?></h6>
                <?php
                    // Menghitung apakah sudah 1 tahun
                          $now = new DateTime();
                          $found = new DateTime($temuan['waktu_temuan']);
                          $interval = $now->diff($found);
                          $diff = $interval->y;
                          if ($diff >= 1) {
                            echo "Status Barang :  <span class='badge badge-pill badge-danger mb-2'><i class='far fa-times-circle'></i> Tidak </span><br> <div class='alert alert-danger' role='alert'>
                                                  Barang sudah melebihi batas 1 tahun, barang menjadi milik penemu.
                                                </div>";
                          } else{
                            echo "Status Barang : <div class='badge badge-pill badge-success mb-2'><i class='far fa-check-circle'></i> Masih</div><br> <div class='alert alert-success' role='alert'>
                                                    Barang Belum Ditemukan.
                                                  </div>";
                          }
                        ?>
              </div>
            </div>

            <div class="col-lg-1">
              <a href="<?php echo base_url('temuanpengguna/ubahdata/'. $temuan['id']. '/'. $jenis); ?>" data-toggle="modal" data-target="#detail" id="<?php $temuan['id']; ?>"">
                <button class="btn btn-sm btn-info mt-1 mb-1"><span class="fa fa-eye"></span></button>
              </a>
              <a href="<?php echo base_url('temuanpengguna/ubahdata/'. $temuan['id']. '/'. $jenis); ?>">
                <button class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></button>
              </a>
              <a href="<?php echo base_url('temuanpengguna/hapus/'. $temuan['id']. '/'. $jenis);  ?>" onclick="return confirm('yakin hapus data ?');">
                <button class="btn btn-sm btn-danger mt-1 mb-1"><span class="fa fa-trash"></span></button>
              </a>
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

<!-- modal detil barang -->
<?php foreach ($tabeltemuan as $temuan) : ?>
<div class="modal fade" id="detail" data-id="<?= $temuan['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">    
        <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Detail temuan Barang</b></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <!-- Modal body -->
      <div class="modal-body">
        <div class="table col-lg-10" >
        <div class="card mt-3 mb-3">
        <div class="card-body">


          <div class="mb-3">
            <?php
                    // Menghitung apakah sudah 1 tahun
                  $now = new DateTime();
                  $found = new DateTime($temuan['waktu_temuan']);
                  $interval = $now->diff($found);
                  $diff = $interval->y;
                  if ($diff >= 1) {
                    echo "Status : <br> <div class='alert alert-danger' role='alert'>
                                          Barang sudah melebihi batas 1 tahun, barang menjadi milik penemu.
                                        </div>";
                  } else{
                    echo "Status : <br> <div class='alert alert-info' role='alert'>
                                            Barang masih ada di penemu.
                                          </div>";
                  }
                ?>
          </div>

          <ul class="card list-group mb-3">
          <a class="ml-auto mr-auto mt-3" href="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?>">
            <img src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?> " style="width: 200px; height: 250px;">
          </a>
            <div class="card-body">
              <label ><b>Detail Informasi<br></b></label>
              <p class="card-text" style="font-family:times new roman;"><i><?php echo $temuan['detail_informasi'];  ?></i></p>
            </div>
          </ul>

        <div class="text-break col-lg">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>Nama Penemu<br> </b>
                  <?php echo $temuan['nama'];?></label>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>Nama Barang<br> </b>
                  <?php echo $temuan['nama_barang'];?></label>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>Jenis Barang<br> </b>
                  <?php echo $temuan['jenis_barang'];?> </label>
                </div>
              </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>Tempat temuan<br> </b>
                  <?php echo $temuan['tempat_temuan'];?> </label>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>Waktu temuan<br> </b>
                  <?php echo $temuan['waktu_temuan'];?> </label>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>Kontak Penemu<br> </b>
                  <p class="mt-2 mb-2 ml-2 mr-2"><?php echo $temuan['nomor_hp'];?></p> </label>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="card-title"><label ><b>ID Line<br> </b>
                  
                    <p class="mt-2 mb-2 ml-2 mr-2"><?php echo $temuan['id_line'];?></p> </label>
                  
                </div>  
              </li>
            </ul>       
            </div>
          </div>
        </div>
      </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>  


  <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->


             <!--  <button class="mb-3" onclick="goBack()">Kembali</button>
              <script>
                  function goBack() {
                  window.history.back();
                }        
              </script>   -->





</div>
