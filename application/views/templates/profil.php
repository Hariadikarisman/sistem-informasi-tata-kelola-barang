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
</div>
