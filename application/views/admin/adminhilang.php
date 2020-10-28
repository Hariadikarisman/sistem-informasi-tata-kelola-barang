<style type="text/css">
body{
  height: 100%;
   margin:0;
   padding:0;
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
          <a href="<?php echo site_url(); ?>admin/adminhilang/elektronik"><li class="list-group-item">Elektronik<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>admin/adminhilang/buku"><li class="list-group-item">Buku<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>admin/adminhilang/kartu"><li class="list-group-item">Kartu<span class="badge badge-info float-right"></span></li></a>
          <a href="<?php echo site_url(); ?>admin/adminhilang/Lainnya"><li class="list-group-item">Lainnya<span class="badge badge-info float-right"></span></li></a>
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
                <button class="btn btn-outline-info" type="submit">Temukan</button>
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
                <h6 style="color: black; font-weight: bold"><?= $i++ ?>.</h6>
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
                              <a href="<?php echo base_url('admin/ubahdatahilang/'. $hilang['id']. '/'. $jenis); ?>">
                                <button class="btn btn-sm btn-warning float-right ml-2 mt-2"><span class="fa fa-edit"></span></button>
                              </a> 
                              <a href="<?php echo base_url('admin/hapusdatahilang/'. $hilang['id']. '/'. $jenis);  ?>" onclick="return confirm('yakin hapus data ?');">
                                <button class="btn btn-sm btn-danger float-right mt-2"><span class="fa fa-trash"></span></button>
                              </a> <br>
                              <p class="text-monospace text-right mt-4">Pemilik Barang : <?php echo $hilang['nama']; ?></p>
                              <p class="text-monospace text-right">Waktu Kehilangan : <?php echo $hilang['waktu_kehilangan']; ?></p>
                        </div>
                      </div>
                       <div class="col-lg-2">
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
              <label for="tempat_kehilangan" class="col-form-label">tempat_kehilangan</label>
              <input type="text" class="form-control" id="tempat_kehilangan" name="tempat_kehilangan" readonly>
            </div>
            <div class="form-group">
              <label for="waktu_kehilangan" class="col-form-label">waktu_kehilangan</label>
              <input type="text" class="form-control" id="waktu_kehilangan" name="waktu_kehilangan" readonly>
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
    var gambar = $(this).data('gambar');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var detail_informasi = $(this).data('detail_informasi');
    var tempat_kehilangan = $(this).data('tempat_kehilangan');
    var waktu_kehilangan = $(this).data('waktu_kehilangan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #id").val(id);
    $("#modal-edit #gambar").val(gambar);
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
