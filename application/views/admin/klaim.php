<style type="text/css">
  ol li.active .ter{
    background-color: blue;
    color: white;
    padding: 6px;
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




<h1 align="center" class="mb-3">Daftar Menunggu Barang Temuan</h1>


<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="nav-link active"><a style="text-decoration: none;" class="ter" href="<?= base_url(); ?>admin/klaim">Daftar Menunggu</a></li>
    <li class="nav-link" > <a style="text-decoration: none;" class="ter" href="<?= base_url(); ?>admin/status">Daftar Selesai</a></li>
  </ol>
</nav>

<div class="col-md-7 mb-3">
<span>Filter Berdasarkan Tanggal</span>
<form action="<?php echo base_url('admin/klaim'); ?>" class="form-inline" method="get">
  <div class="col-lg">
  <input type="text" class="form-control date" name="startdate"  placeholder="start date" required>
  </div>
  <div class="col-lg">
  <input type="text" class="form-control date" name="enddate"  placeholder="end date" required>
  </div>
  <button type="submit" class="btn btn-info mr-3"> cari</button>
  <a href="<?php echo base_url('admin/klaim'); ?>">Reset</a>
</form>
</div>


<div class="table-responsive">
<table id="tableid" class="table table-bordered">
  <thead class="thead-light">
  
    <tr >
      <th>No</th>
      <th>Nama Pemilik</th>
      <th>Bukti Barang</th>
      <th>Waktu Pengambilan</th>
      <th>Detil Barang</th>
      <th>gambar</th>
      <th>Status</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; foreach ($klaimbarang as $row) : ?>
  <?php if($row['status'] == 1) {
    echo'<tr >';
  } else {
    echo'<tr>';
    }
  ?>  
        <th scope="row"><?= $i++; ?>.</th>
        <td><?php echo $row['namapemilik']; ?></td>
        <td><p class="text-break"><?php echo $row['bukti']; ?></p></td>
        <td><?php echo $row['waktu']; ?></td>
        
        <td>
          <div>
            <a href="" id="edit-kategori" data-toggle="modal" data-target="#detail" 
               data-id="<?= $row['id']; ?>" 
               data-id_barang="<?= $row['id_barang']; ?>"
               data-gambar="<?= $row['gambar']; ?>" 
               data-nama="<?= $row['nama']; ?>" 
               data-nama_barang="<?= $row['nama_barang']; ?>"
               data-jenis_barang="<?= $row['jenis_barang']; ?>"
               data-detail_informasi="<?= $row['detail_informasi']; ?>"
               data-tempat_temuan="<?= $row['tempat_temuan']; ?>"
               data-waktu_temuan="<?= $row['waktu_temuan']; ?>"
               data-nomor_hp="<?= $row['nomor_hp']; ?>"
               data-id_line="<?= $row['id_line']; ?>">
                <button class="btn btn-sm btn-info"><span class="fa fa-eye"></span>  Lihat</button>
            </a>
          </div>
        </td>
        <td><a href="<?= base_url('Asset/img/temuan/') . $row['gambar']?>">
                      <img class="rounded ml-3" width="150" src="<?= base_url('Asset/img/temuan/') . $row['gambar']?> ">
                    </a>
        </td>
        <td>
          <a href="" id="edit-aktif" data-toggle="modal" data-target="#aktif<?= $row['id']; ?>" data-id="<?= $row['id'] ?>">
          <?php if($row['status'] == 0){
            echo'<button class="btn btn-sm btn-danger mt-1 mb-1"> Masih Aktif </button>';
          } else {
            
          }
          ?>  

          <a href="" id="edit-aktif" data-toggle="modal" data-target="#aktifkan<?= $row['id']; ?>" data-id="<?= $row['id'] ?>">
          <?php if($row['status'] == 1){
            echo'<i class="fas fa-minus-circle" style="color:red"></i> <button class="btn btn-outline-secondary mt-1 mb-1"> Tidak Aktif </button>';
          } else {
            echo'';
          }
          
          ?>
          </a><br>
          <span><?php echo $row['w_klaim']; ?></span>
        
        </td>
         <td>
          <a href="" id="edit-selesai" data-toggle="modal" data-target="#selesai<?= $row['id']; ?>" data-id="<?= $row['id'] ?>">
            <button class="btn btn-sm btn-warning mt-1 mb-1"> Menunggu.. </button>
          </a>
        </td> 
        </div>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
</div>


<?php foreach ($klaimbarang as $row) : ?>
<div class="modal fade" id="aktifkan<?= $row['id']; ?>" role="dialog" aria-labelledby="aktifLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aktifLabel">Aktifkan Barang temuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('barangtemuan/nonaktif/' .$row['id']) ?>" method="post">
      <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
        <div id="edit-aktif" class="modal-body">
          <div class="form-group">
            <label class="text1" for="status">Status :</label><br>
            <input type="radio" name="status" id="status" value="1" required> Aktif Kembali
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aktifkan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>



<?php foreach ($klaimbarang as $row) : ?>
<div class="modal fade" id="selesai<?= $row['id']; ?>" role="dialog" aria-labelledby="selesaiLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="selesaiLabel">Selesai Barang temuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('barangtemuan/selesai/' .$row['id']) ?>" method="post">
      <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
        <div id="edit-selesai" class="modal-body">
            <div class="form-group">
              <label for="namapemilik" class="col-form-label">namapemilik</label>
              <input type="text" class="form-control" id="namapemilik" name="namapemilik" value="<?= $row['namapemilik'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="bukti" class="col-form-label">Bukti Barang</label>
              <input type="textarea" class="form-control" id="bukti" name="bukti" value="<?= $row['bukti'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="waktu" class="col-form-label">Jadwal Ambil</label>
              <input type="text" class="form-control" id="waktu" name="waktu" value="<?= $row['waktu'] ?>" readonly>
            </div>
          <div class="form-group">
            <label class="text1" for="selesai">Status :</label><br>
            <input type="radio" name="selesai" id="selesai" value="1" required> Selesai
              <!-- <select class="form-control" name="selesai" id="selesai">
                <option name="selesai" id="selesai" value="0"> - </option>
                <option name="selesai" id="selesai" value="1"> Selesai</option>
              </select> -->
          </div>
          <div class="form-group">
            <label class="text1" for="keterangan">keterangan :</label><br>
              <select class="form-control" name="keterangan" id="keterangan">
                <option name="keterangan" id="keterangan"> Diambil pemilik Barang</option>
                <option name="keterangan" id="keterangan"> Di Sumbangkan</option>
              </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Selesai </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>


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



<script src="<?= base_url(); ?>Asset/js/Chart.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript"> 
  $(document).on("click","#edit-kategori", function(){
    var id = $(this).data('id');
    var id_barang = $(this).data('id_barang');
    var nama = $(this).data('nama');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var detail_informasi = $(this).data('detail_informasi');
    var tempat_temuan = $(this).data('tempat_temuan');
    var waktu_temuan = $(this).data('waktu_temuan');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #id").val(id);
    $("#modal-edit #id_barang").val(id_barang);
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
  $(document).on("click","#edit-aktif", function(){
    var id = $(this).data('id');
    
    $("#edit-aktif #id").val(id);
  })
</script>

<script type="text/javascript"> 
  $(document).on("click","#edit-selesai", function(){
    var id = $(this).data('id');
    
    $("#edit-selesai #id").val(id);
  })
</script>

<script type="text/javascript">
  $(document).on('click', 'ol li', function(){
    $(this).addClass('active').siblings().removeClass('active')
  })
</script>












