<div class="container-fluid">
<h4 class="mb-3"><center><b>Daftar Barang 1 tahun</b></center></h4>
<div class="table-responsive">
<table class="table table-bordered">

  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Gambar</th>
      <th>Nama Penemu</th>
      <th>Jenis Barang</th>
      <th>Info Barang</th>
      <th>Email</th>
      <th>Status</th>
    </tr>
    <?= $this->session->flashdata('message')?>
  </thead>

  
  
  <tbody>
  <?php $i = 1; foreach ($tabeltemuan as $row) : ?>
  <tr class="text-break">
    <th scope="row"><?= $i++; ?>.</th>
    <td><?php echo $row['nama_barang'] ?></td>
    <td>
      <a href="<?= base_url('Asset/img/temuan/') . $row['gambar']?>">
                            <img class="rounded" width="150" src="<?= base_url('Asset/img/temuan/') . $row['gambar']; ?> "">
                          </a>
    </td>
    <td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['jenis_barang'] ?></td>
    <td>
      <a href="" id="edit-kategori" data-toggle="modal" data-target="#detail" 
               data-id="<?= $row['id']; ?>" 
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
    </td>
    <td>

    <a>
      <form class="user" method="post" action="<?= base_url('admin/kirimEmail'); ?>" href="" id="edit-kirim" data-toggle="modal" data-target="#kirim<?= $row['id']; ?>" data-id="<?= $row['email'] ?>">
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" readonly>
           <?php if($row['terkirim'] == 0) {
            echo'<button text="submit" class="btn btn-sm btn-primary mt-2">
            Kirim
          </button> ';
          } else {
           
          }
          ?> 
          
            
        </div> 
      </form>
      </a>
    </td>
    <td>
      <?php if($row['terkirim'] == 0){
      echo'<span class="badge badge-sm badge-danger mt-1 mb-1" > <i class="fas fa-times-circle"></i>  Pesan Belum Dikirim </span>';
    } else {
      echo'<span class="badge badge-sm badge-success mt-1 mb-1" > <i class="fas fa-check-circle"></i>  Pesan Sudah Dikirim </span>';
    }
       ?>

    </td>
  </tr>
  </div>
  <?php endforeach; ?>
  </tbody>


</table>
</div>
</div>
</div>

<div class="modal fade" id="kirim<?= $row['id']; ?>" role="dialog" aria-labelledby="kirimLabel" aria-hidden="false">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kirimLabel">Status Pesan Barang temuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/kirim/' .$row['id']) ?>" method="post">
      <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
        <div id="edit-kirim" class="modal-body">
          <div class="form-group">
            <label class="text1" for="terkirim">Status :</label><br>
              <input type="radio" name="terkirim" id="terkirim" value="1" required checked> Terkirim
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>


<?php $i = 1; foreach ($tabeltemuan as $row) : ?>
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
              <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" readonly>
            </div>
            <div class="form-group">
              <label for="id_line" class="col-form-label">Id Line</label>
              <input type="text" class="form-control" id="id_line" name="id_line" readonly>
            </div>
            <div class="form-group">
              <label for="email" class="col-form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" readonly>
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
  $(document).on("click","#edit-kirim", function(){
    var id = $(this).data('id');
    
    $("#edit-kirim #id").val(id);
  })
</script>

