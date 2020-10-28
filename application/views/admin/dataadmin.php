<div class="panel-body">
  <div class="table-responsive">
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
            <a href="<?= base_url('admin/pengguna'); ?>" style="margin-right: 20px; text-decoration: none;">Data Pengguna</a> 
            <a href="<?= base_url('admin/useradmin'); ?>" style="text-decoration: none;">Data Admin</a>
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataPengguna" width="100%" cellspacing="0">
              <thead>
                <tr align="center" style="color: black">
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama Pengguna</th>
                  
                  <th>Email</th>
                  <th>Tahun Pembuatan</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; 
                foreach ($data as $d) : ?>
                  <tr style="color: black">
                    <th><?= $i++; ?>.</th>
                    <td><img class="rounded" style="width: 90px; height: 90px;" src="<?= base_url('Asset/img/profil/') . $d['image']; ?> "></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['email']; ?></td>
                    <td><?= $d['date_create']; ?></td>
                  </tr>               
                <?php endforeach; ?>
              </tbody>
            </table> 
          </div>
        </div>
      </div>
    </div>


        <div>
      </div>
      </div>
      </div>

</div>
 














