<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
    $this->load->model('temuan_model');
    $this->load->library('form_validation');
    $this->load->library('pagination');
    
    // Update tahunan jika memungkinkan
    set_expired();
    set_expired_hilang();
  }

  public function index()
  {

    $data['judul'] = 'TUGAS AKHIR';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $keyword = $this->input->get('q');
    $config['base_url'] = site_url('auth/index');
    $config['total_rows'] = $this->Auth_model->countAllbarang($keyword);
    $config['per_page'] = 5;
    $config['use_page_numbers'] = true;
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    if (empty($this->uri->segment(3)))
    {
      $current_page = 1;
    } 
    else 
    {
      $current_page = $this->uri->segment(3);
    }
    $data['start'] = $current_page * $config['per_page'] - $config['per_page'];
    $data['tabelgabung'] = $this->Auth_model->getAll($config['per_page'], $data['start'], $keyword);

    $this->load->view('templates/header', $data);
    $this->load->view('auth/index', $data);
    $this->load->view('templates/footer1', $data);   
  }

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if($this->form_validation->run() == false)
    {
      $data['judul'] = 'HALAMAN LOGIN';
      $this->load->view('templates/header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/footer1');
    } 
    else 
    {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($user)
        {
            //jika user aktif
          if($user['is_active'] == 1)
          {
              //cek password
            if(password_verify($password, $user['password']))
            {  
              $data = [
                'email' => $user['email'],
                'role_id' => $user['role_id']
              ]; 
              $this->session->set_userdata('logged_in', $user);
              $this->session->set_userdata($data);
                if($user['role_id'] == 1)
                {
                  redirect('admin');
                } 
                else 
                {
                  redirect('user');
                }
            }
            else 
            {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Atau Email Salah</div>');
              redirect('auth/login'); 
            }
          }
          else
          {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Di Aktivasi</div>');
            redirect('auth/login');  
          }
        }
        else 
        {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar / Ada</div>');
          redirect('auth/login');
        }
      }
  }

  public function registrasi()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', 
      [
        'is_unique' => 'email sudah ada'
      ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', 
      [
        'matches' => 'password tidak sama !',
        'min_length' => 'password terlalu pendek'
      ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    if($this->form_validation->run() == false)
    {
      $data['judul'] = 'HALAMAN REGISTRASI';
      $this->load->view('templates/header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('templates/footer1');
    }
    else 
    {
      $email = $this->input->post('email', true);
      $data = [
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_create' =>time()
      ];

      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_create' => time()
      ];

    $this->db->insert('user', $data);
    $this->db->insert('user_token', $user_token);
    $this->_sendEmail($token, 'verify');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Akun Sudah Berhasil Dibuat. Silahkan Aktivasi Akun</div>');
    redirect('auth/login');
    }
  }
    
  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'tugasa2019@gmail.com',
      'smtp_pass' => 'hariadi16',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];
      
    $this->load->library('email', $config);
    $this->email->initialize($config); 
    $this->email->from('tugasa2019@gmail.com', 'Tata Kelola Barang dan Hilang Barang Temuan');
    $this->email->to($this->input->post('email'));
    if($type == 'verify')
    {
      $this->email->subject('Account Verification');
      $this->email->message('Tekan Link Ini Untuk Melakukan Vaerifikasi Akun Kamu : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Aktivasi</a>');
    }
    else if($type == 'forget')
    {
      $this->email->subject('Reset Password ');
      $this->email->message('Click hariadi This Link To Reset Your Password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    } 
    if($this->email->send()) 
    {
      return true;
    }
    else 
    {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user)
    {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
        if($user_token)
        {
          if(time() - $user_token['date_create'] < (60*60*24))
          {
            $this->db->set('is_active', 1);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->db->delete('user_token', ['email' => $email]);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">'. $email .' Sudah Diaktivasi, Silahkan Login</div>');
            redirect('auth/login');
          }
          else 
          {
            $this->db->delete('user', ['email' => $email]);
            $this->db->delete('user_token', ['email' => $email]);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Masa Aktivasi Habis</div>');
            redirect('auth/login');
          }
        } 
        else 
        {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, token salah</div>');
          redirect('auth/login');
        }
    }
    else 
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, email salah</div>');
      redirect('auth/login');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu Sudah Logout :) </div>');
    redirect('auth/login');
  } 

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }

  public function forgetPass()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    if($this->form_validation->run() == false)
    {
      $data['judul'] = 'Lupa Password';
      $this->load->view('templates/header', $data);
      $this->load->view('auth/forgetpass');
      $this->load->view('templates/footer1');
    }
    else 
    {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
      if($user)
      {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_create' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forget');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Periksa Email Untuk Reset Password </div>');
        redirect('auth/forgetpass');
      } 
      else 
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar Atau Belum Teraktivasi </div>');
        redirect('auth/forgetpass');
      }
    }    
  }

  public function resetpassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if($user)
    {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if($user_token)
      {
        $this->session->set_userdata('reset_email', $email);
        $this->gantiPass();
      } 
      else 
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password gagal, Token Salah ! </div>');
        redirect('auth/login');
      }
    } 
    else 
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password gagal, Email Salah ! </div>');
      redirect('auth/login');
    }
  }

  public function gantiPass()
  {
    if(!$this->session->userdata('reset_email'))
    {
      redirect('auth/login');
    }
    $this->form_validation->Set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
    $this->form_validation->Set_rules('password2', 'Ulangi Password', 'trim|required|min_length[5]|matches[password1]');    
    if($this->form_validation->run() == false)
    {
      $data['judul'] = 'Ganti Password';
      $this->load->view('templates/header', $data);
      $this->load->view('auth/gantipass');
      $this->load->view('templates/footer1');
    }
    else 
    {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');
      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diganti </div>');
      redirect('auth/login');      
    }    
  }
}
