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
          <a class="dropdown-item" href="<?php echo site_url(); ?>kehilangan/index/elektronik">Elektronik</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>kehilangan/index/buku">Buku</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>kehilangan/index/kartu">Kartu</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>kehilangan/index/lainnya">Lainnya</a>
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

<body id="page-top" style="margin-top: 90px;">
<div id="content">
<div class="container-fluid">
  <div class="row">

    <div class="col-lg-2 mb-3">
      <div class="menu1">
        <ul class="list-group" id="list-tab" role="tablist">
          <li class="list-group-item active" style="text-align: center">Jenis Barang</li>
          <a href="<?php site_url(); ?>elektronik" class="text-decoration-none"><li class="list-group-item">Elektronik<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php site_url(); ?>buku" class="text-decoration-none"><li class="list-group-item">Buku<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php site_url(); ?>kartu" class="text-decoration-none"><li class="list-group-item">Kartu<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php site_url(); ?>Lainnya" class="text-decoration-none"><li class="list-group-item">Lainnya<span class="badge badge-info float-right"></span></li></a>
        </ul>
      </div>
    </div>
   
<div class="table col-lg-10 ">
  <div class="accordion" id="accordionExample">
  <div class="card mb-3">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus" style="color:blue"></i> <b style="text-decoration: none;">Tambah laporan informasi Barang Hilang </b> 
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <div class="row">
      <div class="col-lg-5">
        <?php echo form_open_multipart('kehilangan/buat'); ?>
          <div class="form-group">
            <label class="text1" for="nama">Nama Pemilik Barang :</label><br>
            <input type="text" name="nama" id="nama" class="form-control" required>
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
          </div>

          <div class="form-group">
            <label class="text1" for="gambar">Pilih Gambar :</label><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                <label class="custom-file-label" for="gambar">Choose file</label>
              </div>
          </div>

          <div class="form-group">
            <label class="text1" for="detail_informasi">Detail Informasi</label>
              <textarea class="form-control" name="detail_informasi" id="detail_informasi" rows="3" required></textarea>
          </div>

        
      </div>
      <div class="col-lg-5">
        
          <div class="form-group">
            <label class="text1" for="tempat_kehilangan">Tempat kehilangan :</label><br>
            <input type="text" name="tempat_kehilangan" id="tempat_kehilangan" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="text1" for="waktu_kehilangan">Waktu kehilangan :</label><br>
            <input type="date" name="waktu_kehilangan" id="waktu_kehilangan" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="text1" for="nomor_hp">Nomor Telepon / Whatsapp :</label><br>
            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="text1" for="id_line">ID Line :</label><br>
            <input type="text" name="id_line" id="id_line" class="form-control" required>
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
      <div class=" mb-5">

          <?php if($this->session->flashdata('flash')) : ?>
            <div class="col-md-6">
              <div class="row">
                <div class="table" style="width: 100%; margin-left: auto; margin-right: auto;">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data hilang <strong> Berhasil!</strong> <?php echo $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="list-group">
            <li class="list-group-item active" style="text-align: center"><h3>Data hilang <?= ucfirst($jenis) ?></h3>
              <form class="form-inline" action="" method="post">
                <input class="form-control mr-2" type="search" placeholder="Masukan Nama" name="keyword">
                <button class="btn btn-light" type="submit"><span class="fa fa-search" style="color: blue;"></span></button>
              </form>
            </li>

            <?php if (empty($tabelkehilangan)) : ?>
              <div class="alert alert-danger mt-3" role="alert">
                  Data hilang Tidak Di Temukan 
              </div>
            <?php endif; ?>

            
            <?php $i=1; foreach ($tabelkehilangan as $hilang) : ?>
             
              <li class="list-group-item">
                <div class="media">
                  <h6 style="color: black; font-weight: bold"><?= $i++; ?>.</h6>
                  <div class="container">
                  <div class="row">
                
                  <div class="col-lg-10 mb-2">
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
                      <p class="text-monospace text-right mt-4">Pemilik Barang : <?php echo $hilang['nama']; ?></p>
                      <p class="text-monospace text-right">Status : <?php echo $hilang['peran']; ?></p>
                      <h6 class="font-italic text-right"><b><?php echo $hilang['waktu_kehilangan']; ?></b></h6>
                    </div>
                  </div>
                   <div class="col-l">
                    <a href="<?= base_url('Asset/img/kehilangan/') . $hilang['gambar']?>">
                      <?php if (empty($hilang['gambar'])): ?>
                        <img class="rounded ml-2 mt-4" width="150" src="<?= base_url('Asset/img/kehilangan/no-image.png') ?> ">
                      <?php else : ?>
                        <img class="rounded ml-3" width="150" src="<?= base_url('Asset/img/kehilangan/') . $hilang['gambar']?> ">  
                      <?php endif ?>
                      
                    </a>
                  </div>
                  </div>
                  </div>
                  </div>
                  
        </li>
            <?php endforeach; ?>
            <?= $this->pagination->create_links(); ?>
          </div>
        </div>
           
  </div>
</div>
</div>
</body>



<!-- <?php foreach ($tabelkehilangan as $hilang) : ?> -->
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
              <label for="tempat_kehilangan" class="col-form-label">Tempat kehilangan</label>
              <input type="text" class="form-control" id="tempat_kehilangan" name="tempat_kehilangan" readonly>
            </div>
            <div class="form-group">
              <label for="waktu_kehilangan" class="col-form-label">Waktu kehilangan</label>
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
<!-- <?php endforeach; ?> -->

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

