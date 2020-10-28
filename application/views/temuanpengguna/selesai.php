<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url('user');?>" ><img class="rounded ml-3" width="120" src="<?php echo base_url();?>Asset/img/LOGO.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100 justify-content-end">
      <li class="nav-item mt-2">
        <a class="nav-item nav-link " href="" style="color:green" data-toggle="modal" data-target="#myModal"><i class="fab fa-leanpub" ></i> <b>Informasi</b></a>
      </li>
      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jenis Barang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo site_url(); ?>temuanpengguna/index/elektronik">Elektronik</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>temuanpengguna/index/buku">Buku</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>temuanpengguna/index/kartu">Kartu</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>temuanpengguna/index/lainnya">Lainnya</a>
        </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>
          <li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline small" style="color: black"><?= user()['nama'];?></span>
              <img class="img-profile rounded-circle" style="width: 40px; height: 40px" src="<?= base_url('Asset/img/profil/') . user()['image']?> ">
            </a>               
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item " href="<?= base_url(); ?>temuanpengguna/index/elektronik">
                  <i class="fas fa-fw fa-address-book fa-sm fa-fw mr-2 text-gray-400 "></i> 
                  Data Barang
              </a>
              <a class="dropdown-item" href="<?= base_url();?>user/profile" >
                  <i class="fas fa-fw fa-user fa-sm fa-fw mr-2 text-gray-400"></i>  
                  My Profile 
              </a>
              <a class="dropdown-item" href="<?= base_url();?>user/ubahpass" >
                  <i class="fas fa-fw fa-key fa-sm fa-fw mr-2 text-gray-400"></i>  
                  Ubah Password 
              </a>             
              <a class="dropdown-item" href="<?= base_url();?>auth/logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-fw fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>  
                  Logout 
              </a>
            </div>
          </li>
    </ul>
  </div>
</nav>
</header>



<body id="page-top" style=" margin-top: 90px; background-size: cover; background-color:#DCDCDC;">
<div id="content">
<div class="container-fluid">
<div class="row">

  <div class="col-lg-2 mb-3">
    <div class="menu1">
        <ul class="list-group" id="list-tab" role="tablist">
          <li class="list-group-item active" style="text-align: center">Jenis Barang</li>
          <a href="<?php echo site_url(); ?>temuanpengguna/selesai/elektronik" class="text-decoration-none"><li class="list-group-item">Elektronik<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>temuanpengguna/selesai/buku" class="text-decoration-none"><li class="list-group-item">Buku<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>temuanpengguna/selesai/kartu" class="text-decoration-none"><li class="list-group-item">Kartu<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>temuanpengguna/selesai/Lainnya" class="text-decoration-none"><li class="list-group-item">Lainnya<span class="badge badge-info float-right"></span></li></a>
        </ul>
    </div>
  </div>
    
  <div class="table col-lg-10 ">
    <div class="mb-5">
        <?php if($this->session->flashdata('flash')) : ?>
            <div class="col-md-6">
              <div class="row">
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
        <li class="list-group-item active" style="text-align: center"><h3>Data Barang Temuan Selesai " <?= ucfirst($jenis) ?> "</h3>
          <form class="form-inline" action="" method="post">
            <input class="form-control mr-2" type="search" placeholder="Masukan Nama" name="keyword" value="<?= set_value('keyword') ?>">
            <button class="btn btn-light" type="submit"><span class="fa fa-search" style="color: blue;"></span></button>
          </form>
        </li>
        
        <?php if (empty($tabeltemuan)) : ?>
          <div class="alert alert-danger mt-3" role="alert">
            Data temuan Tidak Di Temukan 
          </div>
        <?php endif; ?>

        <?php $i=1; foreach ($tabeltemuan as $temuan) : ?>
          <?php if($temuan['selesai'] == 1) {
            echo'<li class="list-group-item disabled" >';
          } else {
            echo'<li class="list-group-item">';
          }
        ?>

        <div class="media">
          <h6 style="color: black; font-weight: bold"><?= $i++; ?>.</h6>
          <div class="container">
          <div class="row">
            <div class="col-lg-2">
              <a href="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?>">
                <img class="rounded" width="150" src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?> ">
              </a>
            </div>

          <div class="col-lg-10">
            <div class="text-break" style="color:black">
              <h6><b><?php echo $temuan['nama_barang']; ?></b> 
                      
              <?php if($temuan['selesai'] == 1){
                  echo'<span class="badge badge-sm badge-success mt-1 mb-1" disabled> <i class="fas fa-check-circle"></i> Selesai </span>';     
                } else if($temuan['tahunan'] == 1) {
                  echo'<span class="badge badge-sm badge-warning mt-1 mb-1" disabled> <i class="fas fa-info-circle"></i> Barang Temuan Sudah 1 tahun  </span>'; 
                } else {
                  echo'<span class="badge badge-sm badge-danger mt-1 mb-1"> <i class="fas fa-minus-circle"></i> Menunggu </span>';
                }
              ?> 
              
              
              </h6> 

              <p class="font-italic">"<?php echo $temuan['detail_informasi']; ?>" </p> <br>
              
              <a href="" id="edit-done" data-toggle="modal" data-target="#done<?= $temuan['id']; ?>" data-id="<?= $temuan['id'] ?>">
                <?php if($temuan['selesai'] == 1){
                    echo' <button class="btn btn-sm btn-dark float-right ml-2 mt-2" disabled><span class="fa fa-power-off"></span></button>';     
                  } else if($temuan['tahunan'] == 1) {
                    echo''; 
                  } else {
                    echo'<button class="btn btn-sm btn-outline-success float-right ml-2 mt-2"><span class="fa fa-power-off" style="color:green"></span></button>';
                  }
                ?>
              </a>   

              <a  class="float-right  ml-2 mt-2" href=""  id="edit-kategori" data-toggle="modal" data-target="#detail" data-id="<?= $temuan['id']; ?>" 
                  data-gambar="<?= $temuan['gambar']; ?>" 
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

              <a href="<?php echo base_url('temuanpengguna/ubahdata/'. $temuan['id']. '/'. $jenis); ?>">
                <button class="btn btn-sm btn-warning float-right ml-2 mt-2"><span class="fa fa-edit"></span></button>
              </a> 

              <a href="<?php echo base_url('temuanpengguna/hapus/'. $temuan['id']. '/'. $jenis);  ?>" onclick="return confirm('yakin hapus data ?');">
                <button class="btn btn-sm btn-danger float-right mt-2"><span class="fa fa-trash"></span></button>
              </a> <br>

              <!-- <div class="row"> -->
                <div class="mt-4">
                  <?php if($temuan['tahunan'] == 1){
                      echo'<div class="alert alert-dark" role="alert">Barang Temuan Sudah Mencapai 1 Tahun atau Lebih, Barang Temuan Menjadi Milk Anda. </div>';
                    } else {
                      echo''; 
                    }
                  ?>
                  </div>
                  <div class="text-break">
                  <p class="text-monospace text-right ">Penemu : <?php echo $temuan['nama']; ?></p>
                  <p class="text-monospace text-right ">Tempat Temuan : <?php echo $temuan['tempat_temuan']; ?></p>
                  <p class="text-monospace text-right ">Waktu Temuan : <?php echo $temuan['waktu_temuan']; ?></p>
                </div>
            </div>  
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
</body>

<!-- modal selesai temuanpengguna  -->
<?php foreach ($tabeltemuan as $temuan) : ?>
<div class="modal fade" id="done<?= $temuan['id']; ?>" role="dialog" aria-labelledby="doneLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="doneLabel">Non selesai Barang temuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('temuanpengguna/done/' .$temuan['id']) ?>" method="post">
      <input type="hidden" name="id" id="id" value="<?= $temuan['id'] ?>">
        <div id="edit-done" class="modal-body">
          <div class="form-group">
            <label class="text1" for="selesai">Status :</label><br>
              <input type="radio" name="selesai" id="selesai" value="1" required checked> Selesai
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Selesai</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- akhir modal -->

<!-- modal detil barang -->
<?php foreach ($tabeltemuan as $temuan) : ?>
  <div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
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
              <label for="detail_informasi" class="col-form-label">Detail Informasi</label>
              <textarea type="text-area" class="form-control" id="detail_informasi" name="detail_informasi" readonly></textarea>
            </div>
            <div class="form-group">
              <label for="tempat_temuan" class="col-form-label">Tempat Temuan</label>
              <input type="text" class="form-control" id="tempat_temuan" name="tempat_temuan" readonly>
            </div>
            <div class="form-group">
              <label for="waktu_temuan" class="col-form-label">Waktu Temuan</label>
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
<!-- akhir modal -->
<script src="<?= base_url(); ?>Asset/js/Chart.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.3.1.slim.min.js"></script>

<script type="text/javascript"> 
  $(document).on("click","#edit-kategori", function(){
    var gambar = $(this).data('gambar');
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var detail_informasi = $(this).data('detail_informasi');
    var tempat_temuan = $(this).data('tempat_temuan');
    var waktu_temuan = $(this).data('waktu_temuan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #gambar").val(gambar);
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
  $(document).on("click","#edit-done", function(){
    var id = $(this).data('id');
    
    $("#edit-done #id").val(id);
  })
</script>


