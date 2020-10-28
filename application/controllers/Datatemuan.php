<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatemuan extends CI_Controller {
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
    
  public function index($id_user, $jenis = 'elektronik')
  {
    $data['judul'] = 'DATA TEMUAN';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    $data['jenis'] = $jenis;
    $data['tabeltemuan'] = $this->temuan_model->getAlluser($jenis, $id_user);
    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuanByUser($id_user, $jenis);
    }  
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('datatemuan/index', $data);
    $this->load->view('templates/footer');
  }

  public function ubah($id_user, $id) 
  {
    $data['judul'] = 'Form Ubah Data';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    $data['id_user'] = $id_user; 
    $data['id'] = $id; 
    $data['temuan'] = $this->temuan_model->getAllById($id_user);
    $data['jenis_barang'] = ['Elektronik', 'Buku', 'Kartu', 'Lainnya'];
    // ganti jadi id saja 
    $this->form_validation->set_rules('nama', 'Nama Penemu ', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required');
    $this->form_validation->set_rules('detail_informasi', 'Detail Informasi ', 'required');
    $this->form_validation->set_rules('tempat_temuan', 'Tempat temuan ', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('id_line', 'Id Line ', 'required');
    
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('datatemuan/ubah', $data);
      $this->load->view('templates/footer');
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
                        // unlink(FCPATH . 'Asset/img/temuan/' . $gambarlama);
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
      redirect('datatemuan/index/'.$this->input->post('jenis_barang'));
    }
  }

  public function hapus($id, $id_user)
  {

    $this->temuan_model->hapusdatatemuan($id);
    $this->session->set_flashdata('flash', 'dihapus'); 
    redirect('datatemuan/index/' .$this->input->post('jenis_barang'));

  }

} 
