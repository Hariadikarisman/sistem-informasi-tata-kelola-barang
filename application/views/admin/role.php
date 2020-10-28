<style type="text/css">
  tr{
    color:black;
  }
</style>


<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>')?>                        
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#RoleBaruModal">Tambah Role Baru</a>
          <table class="table table-hover">

            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>  
              </tr>
            </thead>

            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($role as $r) : ?>
                <tr>
                  <th scope="row"><?= $i; ?>.</th>
                  <td><?= $r['role']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">akses</a>
                    <a href="" class="badge badge-success">edit</a>
                    <a href="" class="badge badge-danger">hapus</a>
                  </td>
                </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>

          </table>
    </div>
  </div>
</div>

<!-- Modal Menu -->
<div class="modal fade" id="RoleBaruModal" tabindex="-1" role="dialog" aria-labelledby="RoleBaruModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="RoleBaruModalLabel">Tambah Role Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role'); ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role">
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


           
