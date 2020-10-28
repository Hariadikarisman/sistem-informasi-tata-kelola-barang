<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class datahilang extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('email'))
    {
      redirect('auth/login');
    }
    $this->load->model('kehilangan_model');
    $this->load->library('form_validation');
  }
  
  public function index($id_user, $jenis = 'elektronik')
  {

    $data['judul'] = 'DATA KEHILANGAN';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    $data['jenis'] = $jenis;
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllhilang($jenis, $id_user);
     if ($this->input->post('keyword'))
    {
      $data['tabelkehilangan'] =  $this->kehilangan_model->cariDatakehilanganByUser($id_user, $jenis);
    }  
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('datahilang/index', $data);
    $this->load->view('templates/footer');

  }
     
  public function ubah($id_user, $id) 
  {
    $data['judul'] = 'Form Ubah Data';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById( $id_user);
    $data['jenis_barang'] = ['Elektronik', 'Buku', 'Kartu', 'Lainnya'];
    $data['id_user'] = $id_user; 
    // ganti jadi id saja 
    $this->form_validation->set_rules('nama', 'Nama Penemu ', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required');
    $this->form_validation->set_rules('detail_informasi', 'Detail Informasi ', 'required');
    $this->form_validation->set_rules('tempat_kehilangan', 'Tempat kehilangan ', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('id_line', 'Id Line ', 'required');
    
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('datahilang/ubah', $data);
      $this->load->view('templates/footer');
    }
    else 
    {
      $data = [
        "id_user"           => user()['id'],
        "nama"              => $this->input->post('nama', true),
        "nama_barang"       => $this->input->post('nama_barang', true),
        "jenis_barang"      => $this->input->post('jenis_barang', true),
        "detail_informasi"  => $this->input->post('detail_informasi', true),
        "tempat_kehilangan"     => $this->input->post('tempat_kehilangan', true),
        "waktu_kehilangan"      => $this->input->post('waktu_kehilangan', true),
        "nomor_hp"          => $this->input->post('nomor_hp', true),
        "id_line"           => $this->input->post('id_line', true)  
      ];
            
      $upload_image = $_FILES['gambar']['name'];
      if($upload_image)
      {         
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '9000';
        $config['upload_path'] = './Asset/img/kehilangan/';
                
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar'))
        {
                   
        }
        else 
        {
          echo $this->upload->display_errors();
        }                
      }

      $this->kehilangan_model->ubahDatakehilangan($data);
      $this->session->set_flashdata('flash', 'diganti');
      redirect('datahilang/index/'.$this->input->post('jenis_barang'));
    }
  }

  public function hapus($id, $jenis_barang)
  {
    $this->kehilangan_model->hapusdatahilang($id);
    $this->session->set_flashdata('flash', 'dihapus'); 
    redirect('datahilang/index/' .$this->input->post('jenis_barang'));
  }


  // public function detil($id)
  // {
  //   $data['judul'] = 'Detail kehilangan';
  //   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  //   $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);

  //   $this->load->view('templates/headadmin', $data);
  //   $this->load->view('templates/sidebar', $data);
  //   $this->load->view('templates/topadmin', $data);
  //   $this->load->view('templates/profil', $data);
  //   $this->load->view('datahilang/detil');
  //   $this->load->view('templates/footer');
  // }
} 
