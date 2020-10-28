<?php 

class kehilangan_model extends CI_Model {
  // user : mengambil semua data hilang yang dimasukan oelh admin atau user lain
  // user : yang ada di tamu hilang mengambil semua data barang hilang yang pernah dimasukan
  public function getAll($limit, $start, $jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
     return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->order_by('id', 'DESC')
                    ->where('status !=', '1')
                    ->get('tabelkehilangan', $limit, $start)
                    ->result_array();
   
  }

  // user : mengambil semua data hilang yang pernah di masukan oelh setiap user
  public function getAlluser($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
    return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->where('status =', '0')
                    ->get('tabelkehilangan')
                    ->result_array();
  }

  public function getAllhilangselesai($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
    return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->where('status =', '1')
                    ->get('tabelkehilangan')
                    ->result_array();
  }

  // admin : semua data hilang dari pengguna user yang bisa di lihat admin
 public function getAllhilang($jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
    return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->order_by('id', 'DESC')
                    ->get('tabelkehilangan')
                    ->result_array();
  }

  // admin : semua data barang hilang masukan dari admin
  public function getAllkehilangan( $jenis = 'elektronik', $id_user = null)
  {
    $spesifik_user = $id_user == null ? '1=1' : "id_user='$id_user'";
    
     return $this->db->where('jenis_barang', $jenis)
                    ->where($spesifik_user)
                    ->get('tabelkehilangan')
                    ->result_array();
   
  }

  public function countAllkehilangan($jenis){
    return $this->db->where('jenis_barang', $jenis)
                    ->get('tabelkehilangan')
                    ->num_rows();
  }

   public function countAllbaranghilang(){
    return $this->db
                    ->get('tabelkehilangan')
                    ->num_rows();
  }

  // admin : menamilkan semua barang hilang di admin
  public function getAllbaranghilang($limit, $start, $keyword = null)
  {
    if($keyword){
        $this->db->like('nama_barang', $keyword);

    }
    return $this->db->get('tabelkehilangan', $limit, $start)->result_array(); 
    
  }

  public function countAllkehilanganuser()
  {
    return $this->db->get('tabelkehilangan')->num_rows();
  }

  
  
 // admin : admin menambahkan data hilang
  // user : manmabha data barang hilang yang dilakukan oleh user
  public function tambahDatakehilangan($data){
    $this->db->insert('tabelkehilangan', $data);
  }

  // user : mengahpus data barang hilang yang pernah di masukan oleh user 
  public function hapusDatakehilangan($id){
    $this->db->delete('tabelkehilangan', ['id' => $id]);
  }

  // admin : admin bisa menghapus data hilang yang dimasukan pengguna di admin
  public function hapusDatahilang($id){
    $this->db->delete('tabelkehilangan', ['id' => $id]);
  }

  public function getAllById($id){
    return $this->db->get_where('tabelkehilangan', ['id' =>$id])->row_array();
  }

  // admin : mengubah data hilang yang di masukan oleh pengguna user di admin
  // user : mengubah data barang hilang yang pernah dimasukan oelh user
  public function ubahDatakehilangan($id){
    $data = [
          "id_user"           => user()['id'],
          "nama"              => $this->input->post('nama', true),
          "nama_barang"       => $this->input->post('nama_barang', true),
          "jenis_barang"      => $this->input->post('jenis_barang', true),
          "detail_informasi"  => $this->input->post('detail_informasi', true),
          "tempat_kehilangan"     => $this->input->post('tempat_kehilangan', true),
          "waktu_kehilangan"      => $this->input->post('waktu_kehilangan', true),
          "nomor_hp"          => $this->input->post('nomor_hp', true),
          "id_line"           => $this->input->post('id_line', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabelkehilangan', $data);
  }


  // admin : ubah data aktif dan ubah data non aktif saat di klaim barang
  public function ubahDataaktif($id){
    $data = [
          "id_user"           => user()['id'],
          "status"            => $this->input->post('status', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabelkehilangan', $data);
  }

  // admin : mengubah data selesai di admin
  // user : mengubah data yang berarrti barang tersebut sudah selsaai ditemukan oleh user 
  public function ubahDataselesai($id){
    $data = [
          "id_user"           => user()['id'],
          "status"            => $this->input->post('status', true),         
        ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tabelkehilangan', $data);
  }

  // admin : cari barang hilang di data masukan hilang admin
  // user : cari data barang hilang yang pernah di masukan oelh user dan juga oleh tamuhilang
  public function cariDatakehilangan($jenis = 'Buku'){
    $keyword = $this->input->post('keyword');
    $query = "SELECT * FROM tabelkehilangan WHERE (nama_barang LIKE '%$keyword%' OR nama LIKE '%$keyword%') AND jenis_barang='$jenis'";
    return $this->db->query($query)->result_array();
  }

  // admin : cari semua data hilang dari pengguna user yang bisa di cari oleh admin
  public function cariDatakehilanganByUser($id_user, $jenis = 'Buku'){
    $keyword = $this->input->post('keyword');
    return $this->db->where('id_user', $id_user)
                    ->where('jenis_barang', $jenis)
                    ->like('nama_barang', $keyword)
                    ->or_like('nama', $keyword)
                    ->get('tabelkehilangan')
                    ->result_array();
  }

  // admin
  public function get_sum_count_if(){
      $sql = "SELECT  count(if(jenis_barang='elektronik', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }
  public function get_sum_count_if1(){
      $sql = "SELECT  count(if(jenis_barang='buku', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }
  public function get_sum_count_if2(){
      $sql = "SELECT  count(if(jenis_barang='kartu', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }
  public function get_sum_count_if3(){
      $sql = "SELECT  count(if(jenis_barang='lainnya', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabelkehilangan 
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }



}

