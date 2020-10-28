<body id="page-top" style="margin-top: 90px;">
<div id="content">
<div class="container">

<div class="container mt-3">
  <div class="col-lg ">
    <p style="font-size: 25px" align="center"><b>Tata Kelola Barang Temuan dan Barang Hilang</b></p>
    <form class="search" action="" method="get">
      <input type="text" class="input" type="search" placeholder="Masukan Nama Pencarian" name="q" value="<?= $this->input->get('q') ?>">
      <div class="searchbtn">
        <button class="btn btn-warning" type="submit">
          <i class="fas fa-search" style="color: black;"></i>
        </button>
      </div>
      <ul class="list-group" id="result"></ul>
    </form>
  </div>
</div>

<div class="container">  
  <div class="card mt-3 mb-5">
    <div class="card-header" align="center">
      <b>Informasi Data Barang</b>
    </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8"> 
            <div class="table-responsive">
              <table class="table" id="databarang">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Detil</th>
                  </tr>
                </thead>
                <tbody>
            
                <?php foreach ($tabelgabung as $barang) : ?>
                  <tr>
                    <th scope="row"><?= ++$start; ?></th>
                    <td><?php echo $barang['nama']; ?></td>
                    <td><?php echo $barang['nama_barang']; ?></td>
                    <td>
                      <?php if (empty($barang['gambar'])): ?>
                        <a href="<?= base_url('Asset/img/temuan/') . $barang['gambar']?>">
                        <img class="rounded " src="<?= base_url('Asset/img/kehilangan/no-image.png') ?> " style="width: 70px; height: 70px;">
                        </a>
                      <?php elseif($barang['jenis'] == 'temuan') : ?>
                        <a href="<?= base_url('Asset/img/temuan/') . $barang['gambar']?>">
                        <img class="rounded" src="<?= base_url('Asset/img/temuan/') . $barang['gambar']?> " style="width: 70px; height: 70px;"> 
                        </a>
                      <?php else : ?>
                        <a href="<?= base_url('Asset/img/kehilangan/') . $barang['gambar']?>">
                        <img class="rounded" src="<?= base_url('Asset/img/kehilangan/') . $barang['gambar']?> " style="width: 70px; height: 70px;">  
                        </a>
                      <?php endif ?>
                    </td>
                    <td><?php echo $barang['waktu']; ?></td>
                    <td><?php echo $barang['jenis_barang']; ?></td>
                    <td><?php  
                      if( $barang['jenis'] == 'temuan' ){
                        echo"<div class='badge badge-pill badge-primary mb-2'> Temuan</div>";
                      } else {
                        echo"<div class='badge badge-pill badge-warning mb-2' style='color:white'> Kehilangan</div>";
                      }

                      ?>
                    </td>
                    <td>
                      <a id="edit-kategori" data-toggle="modal" data-target="#detail" 
                      data-id="<?= $barang['id']; ?>" 
                      data-gambar="<?= $barang['gambar']; ?>" 
                      data-nama="<?= $barang['nama']; ?>"
                      data-peran="<?= $barang['peran']; ?>" 
                      data-nama_barang="<?= $barang['nama_barang']; ?>"
                      data-jenis_barang="<?= $barang['jenis_barang']; ?>"
                      data-detail="<?= $barang['detail']; ?>"
                      data-tempat="<?= $barang['tempat']; ?>"
                      data-waktu="<?= $barang['waktu']; ?>"
                      data-nomor_hp="<?= $barang['nomor_hp']; ?>"
                      data-id_line="<?= $barang['id_line']; ?>"
                      >
                      <button class="btn btn-sm btn-info"><span class="fa fa-eye"></span></button>
                      </a>
                    </td>
                  </tr>                 
                <?php endforeach; ?>               
                </tbody>
              </table>

               <?php if (empty($tabelgabung)) : ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Data Barang Tidak Di Temukan 
                </div>
              <?php endif; ?>

                <?= $this->pagination->create_links(); ?>
            </div>
          </div>
          <div class="col-lg-4">  
            <div class="table-responsive">
              <table class="table" id="table">
                <thead class="thead-light">
                  <tr>
                    <th>Barang Temuan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Informasi Barang Temuan
                    </td>
                    <td>
                      <a href="<?php echo base_url();?>tamutemuan/index/elektronik">
                        <button class="btn btn-sm btn-info"><span class="fa fa-eye"></span></button>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>                    
            </div> 
            <div class="table-responsive">
              <table class="table" id="table">
                <thead class="thead-light">
                  <tr>
                    <th>Barang Hilang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Laporan Barang Hilang &nbsp&nbsp&nbsp&nbsp
                    </td>
                    <td>
                      <a href="<?php echo base_url();?>tamuhilang/index/elektronik">
                        <button class="btn btn-sm btn-info"><span class="fa fa-eye"></span></button>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>                    
            </div> 
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</body>

<?php foreach ($tabelgabung as $barang) : ?>
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
              <label for="peran" class="col-form-label">Status</label>
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
              <label for="tempat" class="col-form-label">Tempat Temuan</label>
              <input type="text" class="form-control" id="tempat" name="tempat" readonly>
            </div>
            <div class="form-group">
              <label for="waktu" class="col-form-label">Waktu Temuan</label>
              <input type="text" class="form-control" id="waktu" name="waktu" readonly>
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
    var peran = $(this).data('peran');
    var gambar = $(this).data('gambar');
    var nama_barang = $(this).data('nama_barang');
    var jenis_barang = $(this).data('jenis_barang');
    var tempat = $(this).data('tempat');
    var waktu = $(this).data('waktu');
    var nomor_hp = $(this).data('nomor_hp');
    var id_line = $(this).data('id_line');

    $("#modal-edit #id").val(id);
    $("#modal-edit #gambar").val(gambar);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #peran").val(peran);
    $("#modal-edit #nama_barang").val(nama_barang);
    $("#modal-edit #jenis_barang").val(jenis_barang);
    $("#modal-edit #tempat").val(tempat);
    $("#modal-edit #waktu").val(waktu);
    $("#modal-edit #nomor_hp").val(nomor_hp);
    $("#modal-edit #id_line").val(id_line);
  })
</script>














