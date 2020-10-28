<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth/login');
    }
    cek_login();
    $this->load->model('Menu_model');
    $this->load->model('temuan_model');
    $this->load->model('kehilangan_model');
    $this->load->model('Auth_model');
    $this->load->model('Admin_model');  
    
    set_expired();
    set_expired_hilang();
  }

  public function backup(){
    $data['judul'] = 'Backup DB';
    $this->load->dbutil();
    $prefs = array(
        'format' => 'sql',
        'filename' => "dblostandfound".date("Ymd-His").'.sql'
      );
    $backup =& $this->dbutil->backup($prefs);

    $db_name = "dblostandfound".date("Ymd-His").'.sql';
    $save = FCPATH.'assets/db/'.$db_name;
    $this->load->helper('file');
    write_file($save, $backup);

    $this->load->helper('download');
    force_download($db_name, $backup);
  }

  public function index()
  {
     $data['judul'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $keyword = $this->input->get('q');
    $config['base_url'] = site_url('admin/index');
    $config['total_rows'] = $this->Auth_model->countAllbarang($keyword);
    $config['per_page'] = 7;
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
        
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');       
  }

  public function admintemuan($jenis = 'elektronik')
  {
    $data['judul']  = 'Data Barang';
    $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis']  = $jenis;
    $data['jumlah'] = $this->temuan_model->get_sum($jenis, user()['id']);
    $data['jumlah1'] = $this->temuan_model->get_sum1($jenis, user()['id']);
    $data['jumlah2'] = $this->temuan_model->get_sum2($jenis, user()['id']);
    $data['jumlah3'] = $this->temuan_model->get_sum3($jenis, user()['id']);
    $data['tabeltemuan'] = $this->temuan_model->getAlltemuan($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuan($jenis);
    }
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/admintemuan', $data);
    $this->load->view('templates/footer'); 
  }

   public function hapusdatatemuan($id, $jenis_barang)
  {
    $this->temuan_model->hapusDatatemuan($id);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/admintemuan/'. $jenis_barang);
  }

  public function adminhilang($jenis = 'elektronik')
  {
    $data['judul'] = 'Data Barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $data['jumlah'] = $this->kehilangan_model->get_sum_count_if($jenis, user()['id']);
    $data['jumlah1'] = $this->kehilangan_model->get_sum_count_if1($jenis, user()['id']);
    $data['jumlah2'] = $this->kehilangan_model->get_sum_count_if2($jenis, user()['id']);
    $data['jumlah3'] = $this->kehilangan_model->get_sum_count_if3($jenis, user()['id']);
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllkehilangan($jenis, user()['id']);
    if ($this->input->post('keyword'))
    {
      $data['tabelkehilangan'] =  $this->kehilangan_model->cariDatakehilangan($jenis);
    }  
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/adminhilang', $data);
    $this->load->view('templates/footer'); 
  }

   public function hapusdatahilang($id, $jenis_barang)
  {
    $this->kehilangan_model->hapusDatahilang($id);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/adminhilang/'. $jenis_barang);
  }

   public function buattemuan()
  {
    $data['judul'] = 'Data temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $this->form_validation->set_rules('nama', 'Nama Penemu ', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required');
    $this->form_validation->set_rules('detail_informasi', 'Detail Informasi ', 'required');
    $this->form_validation->set_rules('tempat_temuan', 'Tempat temuan ', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('id_line', 'Id Line ', 'required');   
    if ($this->form_validation->run() == FALSE) 
    {
      $this->load->view('templates/headuser', $data);
      $this->load->view('temuan/buat', $data);
      $this->load->view('templates/footer1');
    } 
    else 
    {
      $data = [
        "id_user"           => user()['id'],
        "nama"              => $this->input->post('nama', true),
        "peran"              => $this->input->post('peran', true),
        "nama_barang"       => $this->input->post('nama_barang', true),
        "jenis_barang"      => $this->input->post('jenis_barang', true),
        "gambar"            => $this->input->post('gambar', true),
        "detail_informasi"  => $this->input->post('detail_informasi', true),
        "tempat_temuan"     => $this->input->post('tempat_temuan', true),
        "waktu_temuan"      => $this->input->post('waktu_temuan', true),
        "nomor_hp"          => $this->input->post('nomor_hp', true),
        "id_line"           => $this->input->post('id_line', true),
        "email_penemu"          => $this->input->post('email_penemu', true),
        "ket"          => $this->input->post('ket', true), 

      ];

      $config['upload_path']          = './Asset/img/temuan/';
      $config['allowed_types']        = 'gif|jpg|jpeg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('gambar'))
      {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('admin/admintemuan', $error);
        exit;
      }
       

      $data['gambar'] = $this->upload->data('file_name');     
      $this->temuan_model->tambahDatatemuan($data);
      $this->session->set_flashdata('flash', 'di tambahkan');
      redirect('admin/admintemuan/'.$this->input->post('jenis_barang'));
    }
  }


  public function buathilang()
   {
    $data['judul'] = 'Data kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $this->form_validation->set_rules('nama', 'Nama Penemu ', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang ', 'required');
    $this->form_validation->set_rules('detail_informasi', 'Detail Informasi ', 'required');
    $this->form_validation->set_rules('tempat_kehilangan', 'Tempat kehilangan ', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('id_line', 'Id Line ', 'required');   
    if ($this->form_validation->run() == FALSE) 
    {
      $this->load->view('templates/headuser', $data);
      $this->load->view('admin/buathilang', $data);
      $this->load->view('templates/footer1');
    } 
    else 
    {
      $data = [
        "id_user"           => user()['id'],
        "nama"              => $this->input->post('nama', true),
        "nama_barang"       => $this->input->post('nama_barang', true),
        "jenis_barang"      => $this->input->post('jenis_barang', true),
        "gambar"            => $this->input->post('gambar', true),
        "detail_informasi"  => $this->input->post('detail_informasi', true),
        "tempat_kehilangan" => $this->input->post('tempat_kehilangan', true),
        "waktu_kehilangan"  => $this->input->post('waktu_kehilangan', true),
        "nomor_hp"          => $this->input->post('nomor_hp', true),
        "id_line"           => $this->input->post('id_line', true)    
      ];

      // Upload gambar jika diisi
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']          = './Asset/img/kehilangan/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('gambar'))
        {
          $data['gambar'] = $this->upload->data('file_name');
        }
      } 
      // return "no-image.png";

    
       $this->kehilangan_model->tambahDatakehilangan($data);
      $this->session->set_flashdata('flash', 'di tambahkan');
      redirect('admin/adminhilang/'.$this->input->post('jenis_barang'));
      }
  }

  public function kirim($id)
  {
    $data['judul'] = 'Kirim barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    
    $this->db->set('id', $id);
    $this->db->where('id', $id);
    $this->db->update('tabeltemuan');

    $this->temuan_model->ubahDatakirim($data);
    $this->session->set_flashdata('flash', 'diganti');
    redirect('admin/tahunan');
  }

  public function role() 
  {
    $data['judul'] = 'Role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role'] = $this->db->get('user_role')->result_array();
        
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function roleAccess($role_id) 
  {
    $data['judul'] = 'Role Akses';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();       
    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        
    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('menu_user')->result_array();
        
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/roleaccess', $data);
    $this->load->view('templates/footer');
  }

  public function ubahAkses()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');
    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];
    $result = $this->db->get_where('user_access_menu', $data);
    if($result->num_rows() < 1)
    {
      $this->db->insert('user_access_menu', $data);
    }
    else
    {
      $this->db->delete('user_access_menu', $data);
    }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Sudah Diubah </div>');
  }

  public function pengguna()
  {
    $data['judul'] = 'Data Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data'] = $this->Menu_model->getPengguna();

    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/pengguna', $data);
    $this->load->view('templates/footer', $data);    
  }

  public function useradmin()
  {
    $data['judul'] = 'Data Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data'] = $this->Menu_model->getAdmin();

    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/dataadmin', $data);
    $this->load->view('templates/footer', $data);    
  }

  public function klaim()
  { 
    $startdate = $this->input->get('startdate', TRUE);
    $enddate = $this->input->get('enddate', TRUE);
    
    $data['judul'] = 'Klaim Barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    if (!empty($startdate) && !empty($enddate)) {
      $data['klaimbarang'] = $this->Admin_model->datetanggal($startdate, $enddate);
    } else {
      $data['klaimbarang'] = $this->Admin_model->getAllklaim();
    }
    
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/klaim', $data);
    $this->load->view('templates/footer', $data);       
  }

  public function status()
  {
    $startdate = $this->input->get('startdate', TRUE);
    $enddate = $this->input->get('enddate', TRUE);

    $data['judul'] = 'Klaim Barang';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    if (!empty($startdate) && !empty($enddate)) {
      $data['statusbarang'] = $this->Admin_model->datetanggalselesai($startdate, $enddate);
    } else {
      $data['statusbarang'] = $this->Admin_model->getAllstatus();
    }

    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/status', $data);
    $this->load->view('templates/footer', $data);       
  }

  public function tahunan()
  {
    $data['judul'] = 'Data Barang 1 Tahun';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabeltemuan'] = $this->Admin_model->getAlltahunan();

    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/tahunan', $data);
    $this->load->view('templates/footer', $data);       
  }

  public function profil() 
  {
    $data['judul'] = 'My Profile';
        
    $this->load->view('templates/headadmin', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topadmin', $data);
    $this->load->view('admin/profil', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['judul'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('nama', 'Nama lengkap', 'required');
    if($this->form_validation->run() == false)
    {
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('admin/edit', $data);
      $this->load->view('templates/footer');
    }
    else 
    {
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
            // jika ada gambar //
      $upload_image = $_FILES['image']['name'];
        if($upload_image)
        {
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
            } 
            else 
            {
              echo $this->upload->display_errors();
            }
        }
      $this->db->set('nama', $nama);
      $this->db->where('email', $email);
      $this->db->update('user');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();
      $this->session->set_userdata('logged_in', $user);
      redirect('admin/profil');    
    }  
  }

  public function ubahPass()
  {
    $data['judul'] = 'Ubah Password';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('passawal', 'Password Sekarang', 'required|trim');
    $this->form_validation->set_rules('passbaru', 'Password Baru', 'required|trim|min_length[5]|matches[passulang]');
    $this->form_validation->set_rules('passulang', 'Ulangi Password', 'required|trim|min_length[5]|matches[passbaru]');
    if($this->form_validation->run() == false)
    {
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('admin/ubahpass', $data);
      $this->load->view('templates/footer');
    } 
    else 
    {  
      $passawal = $this->input->post('passawal');
      $passbaru = $this->input->post('passbaru');
        if(!password_verify($passawal, user()['password']))
        {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Passworod Anda Salah !</div>');
          redirect('admin/ubahpass');           
        } 
        else
        {
          if ($passawal == $passbaru)
          {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Passworod Tidak Boleh Sama !</div>');
            redirect('admin/ubahpass');  
          } 
          else 
          {
                    // pass oke
            $password_hash = password_hash($passbaru, PASSWORD_DEFAULT);
            $this->db->set('password', $password_hash);
            $this->db->where('email', user()['email']);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Passworod Diganti !</div>');
            redirect('admin/index');                      
          }
        }
    }
  }

  public function ubahdatatemuan($id)
  {
    $data['judul'] = 'Form Ubah Data temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $id;
    $data['temuan'] = $this->temuan_model->getAllById($id);
    $data['jenis_barang'] = ['Elektronik', 'Buku', 'Kartu', 'Lainnya'];

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
      $this->load->view('admin/ubahdatatemuan', $data);
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
          if($gambarlama != 'default.jpg')
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
      redirect('admin/admintemuan/'.$this->input->post('jenis_barang'));
    }
  }

  public function ubahdatahilang($id)
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
      $this->load->view('templates/headadmin', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topadmin', $data);
      $this->load->view('admin/ubahdatahilang', $data);
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
        redirect('admin/adminhilang /'.$this->input->post('jenis_barang'));
    }
  }
  
  public function kirimEmail()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    if($this->form_validation->run() == false)
    {
      $data['judul'] = 'Lupa Password';
      $this->load->view('templates/header', $data);
      $this->load->view('admin/tahunan');
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
        $this->_sendEmail($token, 'tahunan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan Berhasil Dikirim Ke Penemu Barang </div>');
        redirect('admin/tahunan');
      } 
      else 
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar </div>');
        redirect('admin/tahunan');
      }
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
    if($type == 'tahunan')
    {
      $this->email->subject('Informasi Barang Temuan Anda ');
      $this->email->message('Barang Temuan Yang Anda Temukan Sudah Melebeihi 1 Tahun, dan Barang Tersebut Sudah Menjadi Milik Anda. Sesuai Dengan Ajaran Agama Islam, “Kenalilah wadah atau tutupnya, dan pengikatnya, lalu umumkan satu tahun, jika tidak diketahui (pemiliknya) maka gunakanlah dan hendaknya barang itu bagaikan titipan di sisimu, tetapi jika datang pemiliknya mencari barang itu suatu saat hari dari masa, maka serahkanlah barang itu padanya” (Hr.Bukhori 2249, dan Muslim 3249, dan lafadhnya dari Muslim). <br>

        <b><h3> Barang Temuan Menjadi Milik Anda <br> Informasi Data Temuan Anda Akan Otomatis Terhapus Dari Tampilan Pengguna</h3> </b> <br>
        Terima Kasih Atas Perhatiannya.');
    }
    else
    {
      
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

}




    
