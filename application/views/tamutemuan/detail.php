<!-- <style type="text/css">
body{
  height: 100%;
   margin:0;
   padding:0;
  background: url(../../Asset/img/background.jpg) no-repeat center center fixed;
  background-color:   #DCDCDC;
  background-size: cover;
}
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

<body id="page-top">
<div id="content">
<div class="container-fluid">
  <div class="row">
    <div class="table col-lg-6" >
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

              <div class="card-title"><label ><b>Tempat Temuan<br> </b>
                <?php echo $tabeltemuan['tempat_temuan'];?> </label>
              </div>

              <div class="card-title"><label ><b>Waktu Temuan<br> </b>
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
</div>
</body>

 -->
