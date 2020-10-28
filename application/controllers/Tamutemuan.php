<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamutemuan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('temuan_model');
    $this->load->library('form_validation');
  }

  public function index($jenis = 'elektronik')
  {
    $data['judul'] = 'DATA temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $config['base_url'] = base_url('tamutemuan/index/' . $jenis );
    $config['total_rows'] = $this->temuan_model->countAlltemuan($jenis);
    $config['per_page'] = 6;
    $config['use_page_numbers'] = false;
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);
    
    $data['start'] = $this->uri->segment(4);
    $data['tabeltemuan'] = $this->temuan_model->getAll($config['per_page'], $data['start'], $jenis);

    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuan($jenis);
    }
    $this->load->view('templates/headerA', $data);
    $this->load->view('tamutemuan/index', $data);
    $this->load->view('templates/footer1', $data);  
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('tamutemuan/detail', $data);
    $this->load->view('templates/footer1');  
  }

}
