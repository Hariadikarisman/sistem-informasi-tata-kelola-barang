<style type="text/css">
  .card-title {
    text-align: center;
    color: #000000;
    color: black;
    text-align: justify;
  }
  .card-body img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 25%;
  }
  .table {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
  }
  .text-break {
    color: black;
  }
</style>

<body>
<div class="container-fluid">
  <div class="card mb-3" style="max-width: 740px;">
    <div class="row no-gutters">
      <div class="col-md-4 mt-2">
        <img src="<?= base_url('Asset/img/profil/').$user['image'];?>" class="card-img mb-2 mr-4">
      </div>
      <div class="col-md-8">
        <div class="card-body ml-4" style="color: black;">
          <h5 class="card-text" ><b><?= $user['nama'];?></b></h5>
          <p class="card-text"><?= $user['email'];?></p>
          <p class="card-text"><small class="text-muted">Anggota sejak : <?= date('d F Y', $user['date_create']);?></small></p>
        </div>
      </div>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div class="row">
      <div class="table col-lg-8" >
        <div class="card mt-3 mb-3">
          <center><h5 class="card-header"><b>Detail temuan Barang</b></h5></center>
            <div class="card-body">
              <div class="col-lg m-auto" >
                <div>
                    <img class="img-profile" src="<?= base_url('Asset/img/temuan/') . $tabeltemuan['gambar']?> " style="width: 300px; height: 250px">
                </div>
              </div> 

              <div class="text-break col-lg">
                  <div class="card-title"><label ><b>Nama Penemu<br> </b>
                    <?php echo $tabeltemuan['nama'];?></label>
                  </div>

                  <div class="card-title"><label ><b>Nama Barang<br> </b>
                    <?php echo $tabeltemuan['nama_barang'];?></label>
                  </div>

                  <div class="card-title"><label ><b>Jenis Barang<br> </b>
                    <?php echo $tabeltemuan['jenis_barang'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Gambar<br> </b>
                    <?php echo $tabeltemuan['gambar'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Detail Informasi<br> </b>
                    <div class="card bg-info ml-3">
                    <p class="mt-2 mb-2 ml-2 mr-2" style="font-family:times new roman;"><i><?php echo $tabeltemuan['detail_informasi'];  ?></i></p></label>
                    </div>
                  </div>

                  <div class="card-title"><label ><b>Tempat temuan<br> </b>
                    <?php echo $tabeltemuan['tempat_temuan'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Waktu temuan<br> </b>
                    <?php echo $tabeltemuan['waktu_temuan'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Nomor HP<br> </b>
                    <div class=" card bg-warning ml-3">
                      <p class="mt-2 mb-2 ml-2 mr-2"><?php echo $tabeltemuan['nomor_hp'];?></p> </label>
                    </div>
                  </div>
                  
                  <div class="card-title"><label ><b>ID Line<br> </b>
                    <div class=" card bg-warning ml-3">
                    <p class="mt-2 mb-2 ml-2 mr-2"><?php echo $tabeltemuan['id_line'];?></p> </label>
                    </div>
                  </div>
              
                  <button class="mb-3" onclick="goBack()">Kembali</button>
                  <script>
                      function goBack() {
                      window.history.back();
                    }        
                  </script>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
