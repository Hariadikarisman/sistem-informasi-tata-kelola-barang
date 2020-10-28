<?php 

class Auth_model extends CI_Model {
  public function getAll($per_page, $start, $keyword) {
    if (empty($keyword)) {
      $where = '1=1';
    } else {
      $where = "(nama LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%')";
    }
    $sql = "
    SELECT * FROM (
      SELECT id, nama, peran, nama_barang, jenis_barang, waktu_kehilangan waktu, tempat_kehilangan tempat, detail_informasi detail, gambar, nomor_hp, id_line, 'kehilangan' jenis, status, waktusekarang
      FROM tabelkehilangan  WHERE $where AND status != '1'
      UNION ALL
      SELECT id, nama, peran, nama_barang, jenis_barang, waktu_temuan waktu, tempat_temuan tempat, detail_informasi detail, gambar, nomor_hp, id_line, 'temuan' jenis, status, waktusekarang
      FROM tabeltemuan WHERE $where AND tahunan != '1'  ORDER BY id DESC
    )  tmp LIMIT $start, $per_page ";
    return $this->db
                    ->query($sql)
                    ->result_array();



    
  
  }

  public function countAllbarang($keyword){
    if (empty($keyword)) {
      $where = '1=1';
    } else {
      $where = "nama LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%'";
    }
    $sql = "SELECT id, nama, nama_barang, jenis_barang, waktu_kehilangan waktu, tempat_kehilangan tempat, detail_informasi detail, gambar, nomor_hp, id_line, 'kehilangan' jenis
            FROM tabelkehilangan WHERE $where
            UNION ALL
            SELECT id, nama, nama_barang, jenis_barang, waktu_temuan waktu, tempat_temuan tempat, detail_informasi detail, gambar, nomor_hp, id_line, 'temuan' jenis
            FROM tabeltemuan WHERE $where
            ";
    return $this->db->query($sql)->num_rows();
  }

}
