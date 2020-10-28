<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Baranghilang extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('email'))
    {
      redirect('auth/login');
    }
    $this->load->model('kehilangan_model');
    $this->load->model('Admin_model');
    $this->load->library('form_validation');

    set_expired();
    set_expired_hilang();
  }
   
  public function index()
  {
    $data['judul'] = 'DATA kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jumlah'] = $this->kehilangan_model->get_sum_count_if();
    $data['jumlah1'] = $this->kehilangan_model->get_sum_count_if1();
    $data['jumlah2'] = $this->kehilangan_model->get_sum_count_if2();
    $data['jumlah3'] = $this->kehilangan_model->get_sum_count_if3();

    $data['keyword'] = $this->input->get('keyword');

    $config['base_url'] = site_url('baranghilang/index');
    $this->db->like('nama_barang', $data['keyword']);
    $this->db->from('tabelkehilangan');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 6;
    $config['use_page_numbers'] = false;
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    
    $data['start'] = $this->uri->segment(3);
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllbaranghilang($config['per_page'], $data['start'], $data['keyword']);
  
    
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('Baranghilang/index', $data);
      $this->load->view('templates/footer');
  }  
  
  public function klaimbarang($id)
  {
    $data['judul'] = 'Klaim Barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);
    $data = [
      "id_barang" => $this->input->post('id_barang', true),
      "namapemilik" => $this->input->post('namapemilik', true),
      "bukti" => $this->input->post('bukti', true),
      "waktu" => $this->input->post('waktu', true),  
      "id" => $this->input->post('id', true),
    ];

    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabelkehilangan');

    $this->kehilangan_model->ubahDataaktif($data);
    $this->Admin_model->tambahDataKlaim($data);
    $this->session->set_flashdata('flash', 'di tambahkan');
    redirect('admin/klaim');
  }

  public function selesai($id)
  {
    $data['judul'] = 'non aktif barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data = [
      "id" => $this->input->post('id', true),
      "namapemilik" => $this->input->post('namapemilik', true),
      "bukti" => $this->input->post('bukti', true),
      "waktu" => $this->input->post('waktu', true),
      "keterangan" => $this->input->post('keterangan', true),
    ];
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabelkehilangan');

    $this->kehilangan_model->ubahDataselesai($data);
    $this->Admin_model->tambahDatastatus($data);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('admin/status');
  }

  public function nonaktif($id)
  {
    $data['judul'] = 'non aktif barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabelkehilangan');

    $this->kehilangan_model->ubahDataaktif($data);
    $this->Admin_model->hapusDataklaim($id);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('admin/klaim');
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);

    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('baranghilang/detail');
    $this->load->view('templates/footer');
  }

} 

