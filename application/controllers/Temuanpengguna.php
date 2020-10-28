<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Temuanpengguna extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('email'))
    {
      redirect('auth/login');
    }
    $this->load->model('temuan_model');
    $this->load->library('form_validation');
  }

  public function index($jenis = 'elektronik')
  {
    $data['judul'] = 'DATA TEMUAN PENGGUNA';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $data['jumlah'] = $this->temuan_model->get_sum($jenis, user()['id']);
    $data['jumlah1'] = $this->temuan_model->get_sum1($jenis, user()['id']);
    $data['jumlah2'] = $this->temuan_model->get_sum2($jenis, user()['id']);
    $data['jumlah3'] = $this->temuan_model->get_sum3($jenis, user()['id']);
    $data['tabeltemuan'] = $this->temuan_model->getAlluser($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuan($jenis);
    }
        
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/data');
    $this->load->view('temuanpengguna/index', $data);
    $this->load->view('templates/footer1');
  }

  public function done($id)
  {
    $data['judul'] = 'done barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabeltemuan');

    $this->temuan_model->ubahDataselesai($data);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('temuanpengguna/selesai/'.$this->input->post('jenis_barang'));
  }

  public function ubahdata($id)
  {
    $data['judul'] = 'Form Ubah Data temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['temuan'] = $this->temuan_model->getAllById($id);
    $data['jenis_barang'] = ['Elektronik', 'Buku', 'Kartu', 'Lainnya'];
    $data['peran'] = ['Mahasiswa', 'Dosen', 'Masyarakat', 'Tamu Berkunjung', 'Karyawan'];

    $this->form_validation->set_rules('nama', 'Nama Penemu ', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required');
    $this->form_validation->set_rules('detail_informasi', 'Detail Informasi ', 'required');
    $this->form_validation->set_rules('tempat_temuan', 'Tempat temuan ', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('id_line', 'Id Line ', 'required');
    
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('templates/headuser', $data);
      $this->load->view('temuanpengguna/ubahdata', $data);
      $this->load->view('templates/footer1');
    }
    else 
    {
      $nama = $this->input->post('jenis');
      $email = $this->input->post('id');
      // jika ada gambar //
      $upload_gambar = $_FILES['gambar']['name'];
      if($upload_gambar)
      {    
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '9000';
        $config['upload_path'] = './Asset/img/temuan/';
                
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar'))
        {
          $gambarlama = $data['user']['image'];
          if($gambarlama != 'no-image.png')
          {
                        unlink(FCPATH . 'Asset/img/temuan/' . $gambarlama);
          }
          $new_gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $new_gambar);
        } 
        else
        {
          echo $this->upload->display_errors();
        }                 
      }

      $this->db->set('id', $id);
      $this->db->where('id', $id);
      $this->db->update('tabeltemuan');

      $this->temuan_model->ubahDatatemuan($data);
      $this->session->set_flashdata('flash', 'diganti');
      redirect('temuanpengguna/index/'.$this->input->post('jenis_barang'));
    }
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);  

    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/topuser', $data);
    $this->load->view('temuanpengguna/detail', $data);
    $this->load->view('templates/footer1');
  }

  public function hapus($id, $jenis_barang)
  {
    $this->temuan_model->hapusDatatemuan($id);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('temuanpengguna/index/'. $jenis_barang);
  }

  public function barang1tahun($jenis = 'elektronik')
  {
    $data['judul'] = 'DATA TEMUAN PENGGUNA';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $data['jumlah'] = $this->temuan_model->get_sum($jenis, user()['id']);
    $data['jumlah1'] = $this->temuan_model->get_sum1($jenis, user()['id']);
    $data['jumlah2'] = $this->temuan_model->get_sum2($jenis, user()['id']);
    $data['jumlah3'] = $this->temuan_model->get_sum3($jenis, user()['id']);
    $data['tabeltemuan'] = $this->temuan_model->getAll1tahun($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuan($jenis);
    }
        
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/data');
    $this->load->view('temuanpengguna/barang1tahun', $data);
    $this->load->view('templates/footer1');
  }

  public function selesai($jenis = 'elektronik')
  {
    $data['judul'] = 'DATA TEMUAN PENGGUNA';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $data['jumlah'] = $this->temuan_model->get_sum($jenis, user()['id']);
    $data['jumlah1'] = $this->temuan_model->get_sum1($jenis, user()['id']);
    $data['jumlah2'] = $this->temuan_model->get_sum2($jenis, user()['id']);
    $data['jumlah3'] = $this->temuan_model->get_sum3($jenis, user()['id']);
    $data['tabeltemuan'] = $this->temuan_model->getAlltemuanselesai($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuan($jenis);
    }
        
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/data');
    $this->load->view('temuanpengguna/selesai', $data);
    $this->load->view('templates/footer1');
  }

}



