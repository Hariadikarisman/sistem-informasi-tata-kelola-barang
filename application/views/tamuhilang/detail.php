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

<body>
<div class="container">
  <div class="row">
    <div class="table col-lg-8" >
      <div class="card mt-3 mb-3">
        <center><h5 class="card-header"><b>Detail kehilangan Barang</b></h5></center>
          <div class="card-body">
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
</body>
 -->
