<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url('auth');?>" ><img class="rounded ml-3" width="120" src="<?php echo base_url();?>Asset/img/LOGO.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100 justify-content-end">
      <li class="nav-item active">
        <a class="nav-item nav-link " href="<?= base_url(); ?>auth/login" style="color:blue" > <b>Login</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link " href="<?= base_url(); ?>auth/registrasi" style="color:blue"  ><b>Registrasi</b></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jenis Barang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo site_url(); ?>tamutemuan/index/elektronik">Elektronik</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>tamutemuan/index/buku">Buku</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>tamutemuan/index/kartu">Kartu</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>tamutemuan/index/lainnya">Lainnya</a>
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
          <a href="<?php echo site_url(); ?>tamutemuan/index/elektronik" class="text-decoration-none"><li class="list-group-item">Elektronik<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>tamutemuan/index/buku" class="text-decoration-none"><li class="list-group-item">Buku<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>tamutemuan/index/kartu" class="text-decoration-none"><li class="list-group-item">Kartu<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>tamutemuan/index/Lainnya" class="text-decoration-none"><li class="list-group-item">Lainnya<span class="badge badge-info float-right"></span></li></a>
        </ul>
      </div> 
    </div>


    
    <div class="table col-lg-10 ">
      <div class=" mb-5">

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
          
              <li class="list-group-item">
                <div class="media">
                  <h6 style="color: black; font-weight: bold"><?= $i++; ?>.</h6>
                  <div class="col-l">
                    <a href="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?>">
                      <img class="rounded ml-3" width="150" src="<?= base_url('Asset/img/temuan/') . $temuan['gambar']?> ">
                    </a>
                  </div>

                  <div class="col-lg-10">
                    <div class="text-break" style="color:black">
                      <h6><b><?php echo $temuan['nama_barang']; ?></b>
                      <br></h6> 
                      <p class="font-italic">" <?php echo $temuan['detail_informasi']; ?><br><a  class="float-right  ml-2 mt-2" href=""  id="edit-kategori" data-toggle="modal" data-target="#detail" data-id="<?= $temuan['id']; ?>"
                        data-nama="<?= $temuan['nama']; ?>" 
                        data-peran="<?= $temuan['peran']; ?>" 
                        data-nama_barang="<?= $temuan['nama_barang']; ?>"
                        data-jenis_barang="<?= $temuan['jenis_barang']; ?>"
                        data-detail_informasi="<?= $temuan['detail_informasi']; ?>"
                        data-tempat_temuan="<?= $temuan['tempat_temuan']; ?>"
                        data-waktu_temuan="<?= $temuan['waktu_temuan']; ?>"
                        data-nomor_hp="<?= $temuan['nomor_hp']; ?>"
                        data-id_line="<?= $temuan['id_line']; ?>">
                      <button class="btn btn-sm btn-info "><span class="fa fa-eye"></span></button>
                    </a> <br>

                      <p class="text-monospace text-right mt-4">Penemu : <?php echo $temuan['nama']; ?></p>
                      <p class="text-monospace text-right ">Status : <?php echo $temuan['peran']; ?></p>
                      <p class="text-monospace text-right">Waktu Temuan : <?php echo $temuan['waktu_temuan']; ?></p>
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
            <label class="text" for="selesai">selesai :</label><br>
              <select class="form-control" name="selesai" id="selesai">
                <option name="selesai" id="selesai" value="0" selected>Menunggu</option>
                <option name="selesai" id="selesai" value="1"> Selesai</option>
              </select>
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
              <label for="peran" class="col-form-label">Nama Barang</label>
              <input type="text" class="form-control" id="peran" name="peran" readonly>
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
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var peran = $(this).data('peran');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var tempat_temuan = $(this).data('tempat_temuan');
    var waktu_temuan = $(this).data('waktu_temuan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

   
    $("#modal-edit #id").val(id);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #peran").val(peran);
    $("#modal-edit #nama_barang").val(nama_barang);
    $("#modal-edit #jenis_barang").val(jenis_barang);
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


