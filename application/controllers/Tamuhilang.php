<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamuhilang extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kehilangan_model');
    $this->load->library('form_validation');
  }

  public function index($jenis = 'buku')
  {
    $data['judul'] = 'DATA kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    
    $config['base_url'] = site_url('tamuhilang/index/' . $jenis );
    $config['total_rows'] = $this->kehilangan_model->countAllkehilangan($jenis);
    $config['per_page'] = 6;
    $config['use_page_numbers'] = false;
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);
    
    $data['start'] = $this->uri->segment(4);
    $data['tabelkehilangan'] = $this->kehilangan_model->getAll($config['per_page'], $data['start'], $jenis);

    if ($this->input->post('keyword'))
    {
      $data['tabelkehilangan'] =  $this->kehilangan_model->cariDatakehilangan($jenis);
    }
    $this->load->view('templates/headerA', $data);  
    $this->load->view('tamuhilang/index', $data);
    $this->load->view('templates/footer1');
    
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('tamuhilang/detail', $data);
    $this->load->view('templates/footer1');  
  }

}
