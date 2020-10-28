<?php 

class Temuan_model extends CI_Model {
  // user : tamu temuan, temuan
  public function getAll($limit, $start, $jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
     return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->where('status !=', '1')
                    ->where('selesai !=', '1')
                    ->where('tahunan !=', '1')
                    ->order_by('id', 'DESC')
                    ->get('tabeltemuan', $limit, $start)
                    ->result_array();
  }

  // admin  data yang dimasukan oleh admin temuan barang
  public function getAllTemuan($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
     return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->where('tahunan !=', '1')
                    ->order_by('id', 'DESC')
                    ->get('tabeltemuan')
                    ->result_array();
  }

  public function countAlltemuan($jenis)
  {
    return $this->db->where('jenis_barang', $jenis)
                    ->where('status !=', '1')
                    ->where('selesai !=', '1')
                    ->get('tabeltemuan')
                    ->num_rows();
  }

  // admin = seluruh barang temuan
  public function getAllbarangtemuan($limit, $start, $keyword = null)
  {
    if($keyword){
        $this->db->like('nama_barang', $keyword);

    }
    return $this->db->select('tt.*, us.email')
                    ->from('tabeltemuan tt')
                    ->join('user us', 'us.id=tt.id_user')
                    ->limit($limit, $start)
                    ->where('tahunan !=', '1')
                    ->order_by('id', 'DESC')
                    ->get()
                    ->result_array();
  }

  public function countAlltemuanuser()
  {
    return $this->db->get('tabeltemuan')->num_rows();
  }

  // admin : data user data temuan pengguna dan data temuanpengguna
  
  public function getAlluser($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
    return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->order_by('id', 'DESC')
                    ->where('tahunan =', '0')
                    ->where('selesai =', '0')
                    ->get('tabeltemuan')
                    ->result_array();
  }

  public function getAll1tahun($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
    return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->order_by('id', 'DESC')
                    ->where('tahunan =', '1')
                    ->where('selesai =', '0')
                    ->get('tabeltemuan')
                    ->result_array();
  }

  public function getAlltemuanselesai($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
    return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->order_by('id', 'DESC')
                    ->where('selesai =', '1')
                    ->where('tahunan =', '0')
                    ->get('tabeltemuan')
                    ->result_array();
  }
  
 // admin user : menambah data temuan barang
  public function tambahDatatemuan($data){
    $this->db->insert('tabeltemuan', $data);
  }

  // user : hapus data temuan oleh temuan pengguna
  public function hapusDatatemuan($id){
    $this->db->delete('tabeltemuan', ['id' => $id]);
  }

  // admin : data user data hapus temuan pengguna
  public function hapusDatatemuanbyadmin($id){
    $this->db->delete('tabeltemuan', ['id' => $id]);
  }

  public function getAllById($id){
    return $this->db->get_where('tabeltemuan', ['id' =>$id])->row_array();
  }

  // user : mengubah data temuan dari temuanpengguna
  public function ubahDatatemuan($id){
    $data = [
          "id_user"           => user()['id'],
          "nama"              => $this->input->post('nama', true),
          "nama_barang"       => $this->input->post('nama_barang', true),
          "jenis_barang"      => $this->input->post('jenis_barang', true),
          "detail_informasi"  => $this->input->post('detail_informasi', true),
          "tempat_temuan"     => $this->input->post('tempat_temuan', true),
          "waktu_temuan"      => $this->input->post('waktu_temuan', true),
          "nomor_hp"          => $this->input->post('nomor_hp', true),
          "id_line"           => $this->input->post('id_line', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabeltemuan', $data);
  }


  // admin dan user : mengubah data aktif dan nonaktif
  public function ubahDataaktif($id){
    $data = [
          "id_user"           => user()['id'],
          "status"            => $this->input->post('status', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabeltemuan', $data);
  }

  // admin dan user : mengubah data selesai
  public function ubahDataselesai($id){
    $data = [
          "id_user"           => user()['id'],
          "selesai"            => $this->input->post('selesai', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabeltemuan', $data);
  }

public function ubahDatakirim($id){
    $data = [
          "id_user"           => user()['id'],
          "terkirim"            => $this->input->post('terkirim', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabeltemuan', $data);
  }
 


  // user : cari data temuan dari tamutemuan dan temuan barang dan temuan pengguna
  public function cariDatatemuan($jenis = 'Buku'){
    $keyword = $this->input->post('keyword');
    $query = "SELECT * FROM tabeltemuan WHERE (nama_barang LIKE '%$keyword%' OR nama LIKE '%$keyword%') AND jenis_barang='$jenis'";
    return $this->db->query($query)->result_array();
  }

  
 // public function cariDatabarangtemuan(){
 //    $keyword = $this->input->post('kata');
 //    $query = "SELECT * FROM tabeltemuan WHERE (nama_barang LIKE '%$keyword%' OR nama LIKE '%$keyword%')";
 //    return $this->db->query($query)->result_array();
 //  }

  // admin : data user data cari temuan pengguna
  public function cariDatatemuanByUser($id_user, $jenis = 'Buku'){
    $keyword = $this->input->post('keyword');
    return $this->db->where('id_user', $id_user)
                    ->where('jenis_barang', $jenis)
                    ->like('nama_barang', $keyword)
                    ->or_like('nama', $keyword)
                    ->get('tabeltemuan')
                    ->result_array();
  }

  // admin
  public function get_sum(){
      $sql = "SELECT  count(if(jenis_barang='elektronik', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }
  public function get_sum1(){
      $sql = "SELECT  count(if(jenis_barang='buku', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }
  public function get_sum2(){
      $sql = "SELECT  count(if(jenis_barang='kartu', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }
  public function get_sum3(){
      $sql = "SELECT  count(if(jenis_barang='lainnya', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan 
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }



}





