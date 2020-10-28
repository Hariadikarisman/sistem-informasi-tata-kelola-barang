<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
        if(!$this->session->userdata('email')){
          redirect('auth/login');
        }
        $this->load->model('temuan_model');
        $this->load->model('Auth_model');
        $this->load->model('kehilangan_model');
    $this->load->library('form_validation');
    }

    public function index()
  {

    $keyword = $this->input->get('q');
    $config['base_url'] = site_url('user/index');
    $config['total_rows'] = $this->Auth_model->countAllbarang($keyword);
    $config['per_page'] = 5;
    $config['use_page_numbers'] = true;
    $config['attributes'] = array('class' => 'page-link');


    $this->pagination->initialize($config);


    $data['judul'] = 'Halaman Utama';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    if (empty($this->uri->segment(3))){
      $current_page = 1;
    } else {
      $current_page = $this->uri->segment(3);
    }
    $data['start'] = $current_page * $config['per_page'] - $config['per_page'];
    $data['tabelgabung'] = $this->Auth_model->getAll($config['per_page'], $data['start'], $keyword, 'desc');
        
        
    $this->load->view('templates/headuser', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer1', $data);

    }


    public function profile() {
        $data['judul'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/headuser', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer1');
    }
    
    public function edit(){
        $data['judul'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('templates/headuser', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer1');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            // jika ada gambar //
            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '9000';
                $config['upload_path'] = './Asset/img/profil/';
                
                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $gambarlama = $data['user']['image'];
                    if($gambarlama != 'default.jpg'){
                        unlink(FCPATH . 'Asset/img/profil/' . $gambarlama);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }

                 
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

             $user = $this->db->get_where('user', ['email' => $email])->row_array();
             $this->session->set_userdata('logged_in', $user);


           redirect('user');

           
        }
        
    }

    public function ubahPass()
	{
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('passawal', 'Password Sekarang', 'required|trim');
        $this->form_validation->set_rules('passbaru', 'Password Baru', 'required|trim|min_length[5]|matches[passulang]');
        $this->form_validation->set_rules('passulang', 'Ulangi Password', 'required|trim|min_length[5]|matches[passbaru]');

        if($this->form_validation->run() == false){
            $this->load->view('templates/headuser', $data);
            // $this->load->view('templates/topuser', $data);
            $this->load->view('user/ubahpass', $data);
            $this->load->view('templates/footer1');
        } else {
            $passawal = $this->input->post('passawal');
            $passbaru = $this->input->post('passbaru');
            if(!password_verify($passawal, user()['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Passworod Anda Salah !</div>');
                redirect('user/ubahpass');           
            } else {
                if ($passawal == $passbaru){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Passworod Tidak Boleh Sama !</div>');
                redirect('user/ubahpass');  
                } else {
                    // pass oke
                    $password_hash = password_hash($passbaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', user()['email']);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success mb-3" role="alert">Passworod Diganti !</div>');
                redirect('user');  
                    
                }
            }
        }
        

    }
}
