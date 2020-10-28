<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>Lost And Found</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url(); ?>Asset/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>/Asset/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/Asset/css/style.css">
  <link href="<?= base_url(); ?>Asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
  #container{
    min-height:100%;
    position:relative;
  }
  #content{
    padding-bottom: 20px;
  }
  .logo img {
    height: 40px;
    width: 120px;
  }
  .modal-title {
    color: black;
    font-size: 30px;
  }
  .modal-body{
    color: black;
  }
</style>

<header class="mb-3">
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url('user');?>" ><img class="rounded ml-3" width="120" src="<?php echo base_url();?>Asset/img/LOGO.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100 justify-content-end">
      <li class="nav-item mt-2">
        <a class="nav-item nav-link " href="" style="color:green;" data-toggle="modal" data-target="#myModal"><i class="fab fa-leanpub" ></i> <b>Informasi</b></a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-item nav-link " href="<?= base_url(); ?>temuanpengguna/index/elektronik" style="color:green;"  ><i class="fas fa-address-book "></i> <b>Data Barang</b></a>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item ">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline small" style="color: black"><?= user()['nama'];?></span>
              <img class="img-profile rounded-circle" style="width: 40px; height: 40px" src="<?= base_url('Asset/img/profil/') . user()['image']?> ">
          </a>               
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url();?>user/profile" >
              <i class="fas fa-fw fa-user fa-sm fa-fw mr-2 text-gray-400"></i>  
                  My Profile 
            </a>
            <a class="dropdown-item" href="<?= base_url();?>user/ubahpass" >
              <i class="fas fa-fw fa-key fa-sm fa-fw mr-2 text-gray-400"></i>  
                  Ubah Password 
            </a>             
            <a class="dropdown-item" href="<?= base_url();?>auth/logout" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-fw fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>  
                  Logout 
            </a>
 

          </div>
        </li>
    </ul>
  </div>
</nav>
</header>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><b>Hukum Dan Tata Cara Kelola Barang</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
         <p>Sebagaimana sabda Rasulullah shallallahu alaihi wa sallam dari Zaid bin kholid al-juhani berkata : 
           <br>
           <br>
          “Kenalilah wadah atau tutupnya, dan pengikatnya, lalu umumkan satu tahun, jika tidak diketahui (pemiliknya) maka gunakanlah dan hendaknya barang itu bagaikan titipan di sisimu, tetapi jika datang pemiliknya mencari barang itu suatu saat hari dari masa, maka serahkanlah barang itu padanya” (Hr.Bukhori 2249, dan Muslim 3249, dan lafadhnya dari Muslim).
          <br>
          <br>
          Dan bagi orang yang memungut barang temuan tersebut maka disyariatkan untuk mengangkat saksi atas penemuan barang tersebut sebagaimana dalam hadist :
          <br>
          <br>
          “Barangsiapa menemukan barang temuan (luqothoh) maka hendaklah ia mengangkat saksi seseorang atau beberapa orang jujur, kemudian tidak boleh menyembunyikannya, jika datang pemiliknya, maka pemiliknya berhak dengan barangnya, jika tidak dijumpai pemiliknya maka barang itu adalah milik Allah yang diberikan kepada orang yang Dia kehendaki” (HR.Abu Dawud 1503, dan dishahikan oleh al-Albani dalam Shahih wa Dho’if Sunan Ibnu Majah, dan Misykatul Mashobih 3039) (Abu Ibrohim Muhammad Ali AM, 2012).<br><br>

          <h4><b>" Jika barang temuan sudah mencapai 1 tahun, maka barang tersebut berhak menjadi milik si penemu barang, dan informasi barang temuan tersebut akan dikirim ke email pengguna. "</b></h4><br>
          <h4><b>" Jika Barang Temuan dan Kehilangan Sudah Diambil Atau Sudah Di Temukan, Maka Wajib Bagi Pengguna Untuk Menonaktikfkan Data Barang Tersebut. "</b></h4>
        </p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<body id="page-top">
<div id="container">
<div id="content">




    


