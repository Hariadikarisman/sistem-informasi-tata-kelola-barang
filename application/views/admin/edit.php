
 <div class="container">
<div class="card mb-3">
<h1 class="h3 mb-3 mt-3 ml-auto mr-auto text-gray-800 "><b><?= $judul; ?></h1></b> <hr>

<div class="row">
<div class="col-lg-8">

   <?php echo form_open_multipart('admin/edit'); ?>
       <div class="form-group row ml-2">
           <label for="email" class="col-sm-2 col-form-label">Email</label>
           <div class="col-sm-10">
               <input type="text" class="form-control" id="email" name="email" value="<?= user()['email']; ?>" readonly>
           </div>
       </div>
       <div class="form-group row row ml-2">
           <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
           <div class="col-sm-10">
               <input type="text" class="form-control" id="nama" name="nama" value="<?= user()['nama']; ?>">
               <small class="text-danger">
               <?= form_error('nama')?>
             </small>
           </div>
       </div>
       <div class="form-group row row ml-2">
           <div class="col-sm-2">Gambar</div>
               <div class="col-sm-10">
                   <div class="row">
                       <div class="col-sm-3">
                           <img src="<?= base_url('Asset/img/profil/') . user()['image']; ?>" class="img-thumbnail">
                       </div>
                       <div class="col-sm-9">
                       <div class="custom-file">
                         <input type="file" class="custom-file-input" id="image" name="image">
                         <label class="custom-file-label" for="image">Choose file</label>
                       </div>
                       </div>
                   </div>
               </div>
       </div>
       <div class="form-group row justify-content-end row ml-2">
           <div class="col-sm-10">
               <button type="submit" class="btn btn-primary">Edit</button>
           </div>
       </div>
   </form>

</div>
</div>

</div>
</div>  
</div>
