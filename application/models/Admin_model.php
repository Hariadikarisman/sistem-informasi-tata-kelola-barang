<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
  public function getAllklaim()
  {
    return $this->db->select('kb.*, tt.*')
                    ->from('klaimbarang kb')
                    ->join('tabeltemuan tt', 'tt.id=kb.id_barang')
                    ->where('selesai =', '0')
                    ->where('status =', '1')
                    ->get()->result_array();

   

  }

  public function cariDatatemuan($jenis = 'Buku'){
    $keyword = $this->input->post('keyword');
    $query = "SELECT * FROM tabeltemuan WHERE (nama_barang LIKE '%$keyword%' OR nama LIKE '%$keyword%') AND jenis_barang='$jenis'";
    return $this->db->query($query)->result_array();
  }

  public function cariwaktu(){
    $keyword = $this->input->post('waktucari');
    $query = "SELECT * FROM klaimbarang WHERE waktu between '$start' and '$end'";
    return $this->db->query($query)->result_array();

  }

  public function getAllstatus()
  {
    return $this->db->select('sb.*, kb.*, tt.*')
                    ->from('statusbarang sb')
                    ->join('tabeltemuan tt', 'tt.id=sb.id')
                    ->join('klaimbarang kb', 'kb.id_barang=tt.id')
                    ->get()->result_array();
  }

  function datetanggal($startdate, $enddate){
    // if($daterange[0])
    $this->db->where('w_klaim >=', $startdate);
    // if($daterange[1])
    $this->db->where('w_klaim <=', $enddate);
    return $this->db->select('kb.*, tt.*')
                    ->from('klaimbarang kb')
                    ->join('tabeltemuan tt', 'tt.id=kb.id_barang')
                    ->where('selesai =', '0')
                    ->where('status =', '1')
                    ->get()->result_array();
  }

  function datetanggalselesai($startdate, $enddate){
    // if($daterange[0])
    $this->db->where('terambil >=', $startdate);
    // if($daterange[1])
    $this->db->where('terambil <=', $enddate);
     return $this->db->select('sb.*, kb.*, tt.*')
                    ->from('statusbarang sb')
                    ->join('tabeltemuan tt', 'tt.id=sb.id')
                    ->join('klaimbarang kb', 'kb.id_barang=tt.id')
                    ->get()->result_array();
  }






  public function getAlltahunan()
  {
   return $this->db->select('tt.*, us.email')
                    ->from('tabeltemuan tt')
                    ->join('user us', 'us.id=tt.id_user')
                    ->where('tahunan !=', '0')
                    ->get()
                    ->result_array();
  }

  public function tambahDataklaim($data)
  {
    $this->db->insert('klaimbarang', $data);
    return true;
  }

  public function tambahDatastatus($data)
  {
    $this->db->insert('statusbarang ', $data);
    return true;
  }

  public function hapusDataklaim($id){
    $this->db->delete('klaimbarang', ['id' => $id]);
  }
  
    
  public function get_sum()
  {
      $sql = "SELECT  count(if(jenis_barang='elektronik', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  public function get_sum1()
  {
      $sql = "SELECT  count(if(jenis_barang='buku', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  public function get_sum2()
  {
      $sql = "SELECT  count(if(jenis_barang='kartu', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  public function get_sum3()
  {
      $sql = "SELECT  count(if(jenis_barang='lainnya', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
                      
        FROM tabeltemuan 
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  // kehilangan
  public function get_sum_count_if()
  {
      $sql = "SELECT  count(if(jenis_barang='elektronik', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  public function get_sum_count_if1()
  {
      $sql = "SELECT  count(if(jenis_barang='buku', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  public function get_sum_count_if2()
  {
      $sql = "SELECT  count(if(jenis_barang='kartu', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }

  public function get_sum_count_if3()
  {
      $sql = "SELECT  count(if(jenis_barang='lainnya', jenis_barang, NULL)) as jenis_barang,
                      sum(jenis_barang)
        FROM tabelkehilangan
        ";
      $result = $this->db->query($sql);
      return $result->row();
  }


  

}



