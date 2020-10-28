<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Sistem Informasi Tata Kelola arang Temuan dan Barang Hilang</span>
    </div>
  </div>
</footer>
           
</div> <!-- End of Content Wrapper -->
</div> <!-- End of Page Wrapper -->

    
<a class="scroll-to-top rounded" href="#page-top"> 
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda Mau Keluar ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Tekan "Keluar" Untuk Keluar Dari Akun Ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="<?= base_url();?>auth/logout">Keluar</a>
        </div>
    </div>
  </div>
</div>


    

    <!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.4.1.min.js"></script> <!-- yang ini  -->
<script src="<?= base_url(); ?>Asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?= base_url(); ?>Asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>Asset/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>Asset/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>Asset/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>Asset/js/sf.js"></script>

<script>
    $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/ubahakses'); ?>", 
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function(){
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

</div>
</body>
</html>
