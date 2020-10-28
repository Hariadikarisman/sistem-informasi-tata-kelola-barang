<style type="text/css">
  ol li.active .ter{
    background-color: blue;
    color: white;
    padding: 6px;
    /*margin: 0;*/
  }
</style>

<div class="container-fluid">
<?php if($this->session->flashdata('flash')) : ?>
  <div class="col-md-6">
    <div class="row mt-3">
      <div class="table" style="width: 100%; margin-left: auto; margin-right: auto;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Klaim Barang <strong> Berhasil!</strong> <?php echo $this->session->flashdata('flash'); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>



<h1 align="center" class="mb-3">Daftar Selesai Barang Temuan</h1>

<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="nav-link"><a style="text-decoration: none;" class="ter" href="<?= base_url(); ?>admin/klaim">Daftar Menunggu</a></li>
    <li class="nav-link active" > <a style="text-decoration: none;" class="ter" href="<?= base_url(); ?>admin/status">Daftar Selesai</a></li>
  </ol>
</nav>

<div class="col-md-7 mb-3">
<span>Filter Berdasarkan Tanggal</span>
<form action="<?php echo base_url('admin/status'); ?>" class="form-inline" method="get">
  <div class="col-lg">
  <input type="text" class="form-control date" name="startdate"  placeholder="start date" required>
  </div>
  <div class="col-lg">
  <input type="text" class="form-control date" name="enddate"  placeholder="end date" required>
  </div>
  <button type="submit" class="btn btn-info mr-3"> cari</button>
  <a href="<?php echo base_url('admin/status'); ?>">Reset</a>
</form>
</div>

<div class="table-responsive">
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Nama Pemilik</th>
      <th>Bukti Barang</th>
      <th>Janjian Pengambilan</th>
      <th>Detil Barang</th>
      <th>gambar</th>
      <th>Status</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  
  <tbody>
  <?php $i = 1; foreach ($statusbarang as $row) : ?>
  <tr>
    <th scope="row"><?= $i++; ?>.</th>
    <td><?php echo $row['namapemilik'] ?></td>
    <td><p class="text-break"><?php echo $row['bukti']; ?></p></td>
    <td><?php echo $row['waktu']; ?></td>
    <td>
      <div>
        <a href="" id="edit-kategori" data-toggle="modal" data-target="#detail" data-id="<?= $row['id']; ?>"
        data-gambar="<?= $row['gambar']; ?>" 
                            data-nama="<?= $row['nama']; ?>" 
                            data-nama_barang="<?= $row['nama_barang']; ?>"
                            data-jenis_barang="<?= $row['jenis_barang']; ?>"
                            data-detail_informasi="<?= $row['detail_informasi']; ?>"
                            data-tempat_temuan="<?= $row['tempat_temuan']; ?>"
                            data-waktu_temuan="<?= $row['waktu_temuan']; ?>"
                            data-nomor_hp="<?= $row['nomor_hp']; ?>"
                            data-id_line="<?= $row['id_line']; ?>">
          <button class="btn btn-sm btn-info"><span class="fa fa-eye"></span> Lihat</button>
        </a>
      </div>
    </td>
    <td><a href="<?= base_url('Asset/img/temuan/') . $row['gambar']?>">
                      <img class="rounded ml-3" width="150" src="<?= base_url('Asset/img/temuan/') . $row['gambar']?> ">
                    </a>
        </td>
    <td>
      <div class="badge badge-sm badge-success mb-1"> <i class="fas fa-check-circle"></i> Selesai </div> <br>
      <?php echo $row['terambil']; ?>
    </td>
    <td><?php echo $row['keterangan']; ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  
</table>
</div>
</div>
</div>

<div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Informasi Laporan Barang klaim</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
        <div id="modal-edit" class="modal-body">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
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
              <label for="tempat_klaim" class="col-form-label">Tempat temuan</label>
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
  

<script src="<?= base_url(); ?>Asset/js/Chart.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript"> 
  $(document).on("click","#edit-kategori", function(){
    var id = $(this).data('id');
    var id_status = $(this).data('id_status');
    var nama = $(this).data('nama');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var detail_informasi = $(this).data('detail_informasi');
    var tempat_temuan = $(this).data('tempat_temuan');
    var waktu_temuan = $(this).data('waktu_temuan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #id").val(id);
    $("#modal-edit #id_status").val(id_status);
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
  $(document).on('click', 'ol li', function(){
    $(this).addClass('active').siblings().removeClass('active')
  })
</script>

