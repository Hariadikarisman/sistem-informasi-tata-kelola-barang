<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  public function __construct()
  {
    parent::__construct();  
    if(!$this->session->userdata('email'))
    {
      redirect('auth/login');
    }  
    cek_login();
    $this->load->model('Menu_model');
  }

  public function index() 
  {
    $data['judul'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('menu_user')->result_array();
    $this->form_validation->set_rules('menu', 'Menu', 'required');
    if($this->form_validation->run() == false )
    {
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } 
    else 
    {
      $this->db->insert('menu_user', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Baru Ditambahkan</div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['judul'] = 'SubMenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();    
    $data['subMenu'] = $this->Menu_model->getSubMenu();
    $data['menu'] = $this->db->get('menu_user')->result_array();

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');
        
    if($this->form_validation->run() == false )
    {
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } 
    else 
    {
      $data = [
        'judul' => $this->input->post('judul'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->insert('submenu_user', $data );
      $this->db->insert('menu_user', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubMenu Baru Ditambahkan</div>');
      redirect('menu/submenu');
    }
  }  

  public function hapus($id)
  {
    $this->db->delete('submenu_user', ['id' => $id]);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('menu/submenu/');
  }
    
}
