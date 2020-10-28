function search(){
  $("#loading").show(); // Tampilkan loadingnya
  
  $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: baseurl + "form/search", // Isi dengan url/path file php yang dituju
        data: {nama_barang : $("#nama_barang").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // Ketika proses pengiriman berhasil
            $("#loading").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
        $("#nama").val(response.nama); // set textbox dengan id nama
        $("#nama_barang").val(response.nama_barang); // set textbox dengan id jenis kelamin
        $("#waktu_temuan").val(response.waktu_temuan); // set textbox dengan id telepon
        $("#jenis_barang").val(response.jenis_barang); // set textbox dengan id alamat
      }else{ // Jika isi dari array status adalah failed
        alert("Data Tidak Ditemukan");
      }
    },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      alert(xhr.responseText);
        }
    });
}
$(document).ready(function(){
  $("#loading").hide(); // Sembunyikan loadingnya
  
    $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });
    
    $("#nama_barang").keyup(function(){ // Ketika user menekan tombol di keyboard
    if(event.keyCode == 13){ // Jika user menekan tombol ENTER
      search(); // Panggil function search
    }
  });
});