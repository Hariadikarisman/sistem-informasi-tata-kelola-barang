<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hilangpengguna extends CI_Controller {
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

  public function index($jenis = 'elektronik')
  {
    $data['judul'] = 'Data Kehilangan Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $data['jumlah'] = $this->kehilangan_model->get_sum_count_if();
    $data['jumlah1'] = $this->kehilangan_model->get_sum_count_if1();
    $data['jumlah2'] = $this->kehilangan_model->get_sum_count_if2();
    $data['jumlah3'] = $this->kehilangan_model->get_sum_count_if3();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAlluser($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabelkehilangan'] =  $this->kehilangan_model->cariDatakehilangan($jenis);
    }       
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/data');
    $this->load->view('hilangpengguna/index', $data);
    $this->load->view('templates/footer1');
  }

  public function ubahdata($id)
  {
    $data['judul'] = 'Form Ubah Data Kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);
    $data['jenis_barang'] = ['Elektronik', 'Buku', 'Kartu', 'Lainnya'];

    $this->form_validation->set_rules('nama', 'Nama Penemu ', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required');
    $this->form_validation->set_rules('detail_informasi', 'Detail Informasi ', 'required');
    $this->form_validation->set_rules('tempat_kehilangan', 'Tempat kehilangan ', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('id_line', 'Id Line ', 'required');
    
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('templates/headuser', $data);
      $this->load->view('hilangpengguna/ubahdata', $data);
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
          $config['upload_path'] = './Asset/img/kehilangan/';      
                
          $this->load->library('upload', $config);
          if($this->upload->do_upload('gambar'))
          {
            $gambarlama = $data['user']['image'];
            if($gambarlama != 'default.jpg')
            {
                     // unlink(FCPATH . 'Asset/img/kehilangan/' . $gambarlama);
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
        $this->db->update('tabelkehilangan');

        $this->kehilangan_model->ubahDatakehilangan($data);
        $this->session->set_flashdata('flash', 'diganti');
        redirect('hilangpengguna/index/'.$this->input->post('jenis_barang'));
    }
  }

  public function done($id)
  {
    $data['judul'] = 'done barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);

    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabelkehilangan');

    $this->kehilangan_model->ubahDataselesai($data);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('hilangpengguna/index/'.$this->input->post('jenis_barang'));
  }

  public function hapus($id, $jenis_barang)
  {
    $this->kehilangan_model->hapusDatakehilangan($id);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('hilangpengguna/index/'.$jenis_barang);
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);
    $this->load->view('templates/headuser', $data);
    $this->load->view('hilangpengguna/detail', $data);
    $this->load->view('templates/footer1');    
  }

  public function selesai($jenis = 'elektronik')
  {
    $data['judul'] = 'Data Kehilangan Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $data['jumlah'] = $this->kehilangan_model->get_sum_count_if();
    $data['jumlah1'] = $this->kehilangan_model->get_sum_count_if1();
    $data['jumlah2'] = $this->kehilangan_model->get_sum_count_if2();
    $data['jumlah3'] = $this->kehilangan_model->get_sum_count_if3();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllhilangselesai($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabelkehilangan'] =  $this->kehilangan_model->cariDatakehilangan($jenis);
    }       
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/data');
    $this->load->view('hilangpengguna/selesai', $data);
    $this->load->view('templates/footer1');
  }

}
