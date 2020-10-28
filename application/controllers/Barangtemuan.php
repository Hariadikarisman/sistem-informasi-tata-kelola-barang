<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangtemuan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('email'))
    {
      redirect('auth/login');
    }
    $this->load->model('temuan_model');
    $this->load->model('Admin_model');
    $this->load->library('form_validation');

    set_expired();
    set_expired_hilang();
  }
   
  public function index()
  {
    $data['judul'] = 'DATA TEMUAN';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['hasil'] = $this->temuan_model->get_sum();
    $data['hasil1'] = $this->temuan_model->get_sum1();
    $data['hasil2'] = $this->temuan_model->get_sum2();
    $data['hasil3'] = $this->temuan_model->get_sum3();


    $data['keyword'] = $this->input->get('keyword');

    $config['base_url'] = site_url('barangtemuan/index');
    $this->db->like('nama_barang', $data['keyword']);
    $this->db->from('tabeltemuan');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 6;
    $config['use_page_numbers'] = false;
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    
    $data['start'] = $this->uri->segment(3);
    $data['tabeltemuan'] = $this->temuan_model->getAllbarangtemuan($config['per_page'], $data['start'], $data['keyword']);
  
    
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('Barangtemuan/index', $data);
      $this->load->view('templates/footer');
  }  
  
  public function klaimbarang($id)
  {
    $data['judul'] = 'Klaim Barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    $data = [
      "id_barang" => $this->input->post('id_barang', true),
      "namapemilik" => $this->input->post('namapemilik', true),
      "bukti" => $this->input->post('bukti', true),
      "waktu" => $this->input->post('waktu', true),  
      "id" => $this->input->post('id', true),
    ];

    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabeltemuan');

    $this->temuan_model->ubahDataaktif($data);
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
      "namapemilik" => $this->input->post('namapemilik', true),
      "bukti" => $this->input->post('bukti', true),
      "waktu" => $this->input->post('waktu', true),
      "keterangan" => $this->input->post('keterangan', true),
      "id" => $this->input->post('id', true),
      
    ];
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabeltemuan');

    $this->temuan_model->ubahDataselesai($data);
    $this->Admin_model->tambahDatastatus($data);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('admin/status');
  }

  public function nonaktif($id)
  {
    $data['judul'] = 'non aktif barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabeltemuan');

    $this->temuan_model->ubahDataaktif($data);
    $this->Admin_model->hapusDataklaim($id);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('admin/klaim');
  }

  public function kirim($id)
  {
    $data['judul'] = 'non aktif barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabeltemuan');

    $this->temuan_model->ubahDatakirim($data);
    // $this->Admin_model->hapusDataklaim($id);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('admin/tahunan');
  }

} 
