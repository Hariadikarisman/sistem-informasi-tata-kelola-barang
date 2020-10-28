<style type="text/css">
 
  .footer{
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px;
    background-color: rgba(0,0,0,0.1);
  }
</style>
</div>

<div class="footer">
  <div class="container">
    <center><p class="text-muted mt-3">Sistem Informasi Tata Kelola Barang Temuan Dan Barang Hilang 2019</p></center>
  </div>
</div>

  </div> <!-- End of Content Wrapper -->
</div> <!-- End of Page Wrapper -->
    <!-- <input > -->
<input class="scroll-to-top rounded" type="button" value="Top" id="tombolScrollTop" onclick="scrolltotop()"> 
  

    <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda Akan Keluar ?</h5>
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


<script>
      $(document).ready(function(){
      $('#sidebarCollapse').on('click',function(){
        $('#sidebar').toggleClass('active');
      });
    });  
  </script>

<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="<?= base_url(); ?>Asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?= base_url(); ?>Asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>Asset/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>Asset/js/bootstrap.min.js"></script>
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
<script type="text/javascript">

$(document).ready(function(){
  $(window).scroll(function(){
    if ($(window).scrollTop() > 100) {
      $('#tombolScrollTop').fadeIn();
    } else {
      $('#tombolScrollTop').fadeOut();
    }
  });
});

function scrolltotop()
{
  $('html, body').animate({scrollTop : 0},500);
}

</script>
</div>

