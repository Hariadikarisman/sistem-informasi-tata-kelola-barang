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
<div class="container">
  <div class="row">
    <div class="table col-lg-8" >
      <div class="card mt-3 mb-3">
        <center><h5 class="card-header"><b>Detail temuan Barang</b></h5></center>
          <div class="card-body">
            <div class="col-lg m-auto" >
                <div class="col-lg m-auto" >
                <div>
                    <img class="img-profile" src="<?= base_url('Asset/img/kehilangan/') . $tabelkehilangan['gambar']?> " style="width: 300px; height: 250px">
                </div>
              </div> 

              <div class="text-break col-lg">
                  <div class="card-title"><label ><b>Nama Penemu<br> </b>
                    <?php echo $tabelkehilangan['nama'];?></label>
                  </div>

                  <div class="card-title"><label ><b>Nama Barang<br> </b>
                    <?php echo $tabelkehilangan['nama_barang'];?></label>
                  </div>

                  <div class="card-title"><label ><b>Jenis Barang<br> </b>
                    <?php echo $tabelkehilangan['jenis_barang'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Gambar<br> </b>
                    <?php echo $tabelkehilangan['gambar'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Detail Informasi<br> </b>
                    <div class="card bg-info ml-3">
                    <p class="mt-2 mb-2 ml-2 mr-2" style="font-family:times new roman;"><i><?php echo $tabelkehilangan['detail_informasi'];  ?></i></p></label>
                    </div>
                  </div>

                  <div class="card-title"><label ><b>Tempat kehilangan<br> </b>
                    <?php echo $tabelkehilangan['tempat_kehilangan'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Waktu kehilangan<br> </b>
                    <?php echo $tabelkehilangan['waktu_kehilangan'];?> </label>
                  </div>

                  <div class="card-title"><label ><b>Nomor HP<br> </b>
                    <div class=" card bg-warning ml-3">
                      <p class="mt-2 mb-2 ml-2 mr-2"><?php echo $tabelkehilangan['nomor_hp'];?></p> </label>
                    </div>
                  </div>
                  
                  <div class="card-title"><label ><b>ID Line<br> </b>
                    <div class=" card bg-warning ml-3">
                    <p class="mt-2 mb-2 ml-2 mr-2"><?php echo $tabelkehilangan['id_line'];?></p> </label>
                    </div>
                  </div>
              
                  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>




<form action="<?= site_url('barangtemuan/klaimbarang');  ?>" method="post">
                  <div id="klaim" class="modal fade klaim" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-s">
                      <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" align="center"><b>Klaim Barang Temuan</b></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label class="text" for="nama">Nama Pemilik Barang :</label><br>
                          <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label class="text" for="bukti">Bukti Barang :</label><br>
                          <textarea type="text" name="bukti" id="bukti" class="form-control" required></textarea> 
                        </div>
                        <div class="form-group">
                          <label class="text" for="waktu">Waktu Pengambilan barang :</label><br>
                          <input type="text" name="waktu" id="waktu" class="form-control" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Klaim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                        
                      </div>
                    </div>    
                  </div>
                  </form>
