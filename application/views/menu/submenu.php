<style type="text/css">
  .table {
  width: 100%;
  margin-left: auto;
  margin-right: auto;
}
</style>


<body>
  <div class=" col-lg-10 mt-3">
    <?php if($this->session->flashdata('flash')) : ?>
      <div class="row mt-3">
        <div class="table" style="width: 100%; margin-left: auto; margin-right: auto;">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Menu <strong> Berhasil!</strong> <?php echo $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  
<div class="container-fluid">
  <h3 class="mb-2 mt-3 mr-auto ml-auto text-gray-800"><b><?= $judul; ?></b></h3><hr>
    <div class="row">
      <div class="col-lg">
        <?php if(validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
          </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#SubMenuBaruModal">Tambah SubMenu Baru</a>
<div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Menu</th>
              <th scope="col">Url</th>
              <th scope="col">Icon</th>
              <th scope="col">Active</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
              <?php foreach ($subMenu as $sm) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $sm['judul']; ?></td>
                  <td><?= $sm['menu']; ?></td>
                  <td><?= $sm['url']; ?></td> 
                  <td><?= $sm['icon']; ?></td>
                  <td><?= $sm['is_active']; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>menu/hapus/<?= $sm['id'] ?>" class="badge badge-danger" onclick="return confirm('yakin hapus data ?');" class="badge badge-success">hapus</a>
                  </td>
                </tr>
              <?php $i++; ?>
            <?php endforeach; ?>  
          </tbody>
        </table>
        </div>
      </div>
    </div>
</div>


<!-- Modal Menu -->
<div class="modal fade" id="SubMenuBaruModal" tabindex="-1" role="dialog" aria-labelledby="SubMenuBaruModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SubMenuBaruModalLabel">Tambah SubMenu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Submenu">
        </div>

        <div class="form-group">
          <select name="menu_id" id="menu_id" class="form-control">
            <option value="">Pilih Menu</option>
              <?php foreach($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="url" name="url" placeholder="Url Submenu">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Submenu">
        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" value="1" name="is_active" id="is_active" checked >
              <label class="form-check-label" for="is_active">
                Aktif ?
              </label>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
</div>
</body>


           
