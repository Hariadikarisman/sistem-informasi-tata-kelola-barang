<?php 

class Temuan extends CI_Controller {
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

  public function index($jenis = 'elektronik')
  {
    $data['judul'] = 'DATA temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    $config['base_url'] = site_url('temuan/index/' . $jenis );
    $config['total_rows'] = $this->temuan_model->countAlltemuan($jenis);
    $config['per_page'] = 6 ;
    $config['use_page_numbers'] = false;
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);
    
    $data['start'] = $this->uri->segment(4);
    $data['tabeltemuan'] = $this->temuan_model->getAll($config['per_page'], $data['start'], $jenis);

    if ($this->input->post('keyword'))
    {
      $data['tabeltemuan'] =  $this->temuan_model->cariDatatemuan($jenis);
    }
    $this->load->view('templates/headuser', $data);  
    $this->load->view('temuan/index', $data);
    $this->load->view('templates/footer1');
  }

  public function buat()
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
        "peran"             => $this->input->post('peran', true),
        "nama_barang"       => $this->input->post('nama_barang', true),
        "jenis_barang"      => $this->input->post('jenis_barang', true),
        "gambar"            => $this->input->post('gambar', true),
        "detail_informasi"  => $this->input->post('detail_informasi', true),
        "tempat_temuan"     => $this->input->post('tempat_temuan', true),
        "waktu_temuan"      => $this->input->post('waktu_temuan', true),
        "nomor_hp"          => $this->input->post('nomor_hp', true),
        "id_line"           => $this->input->post('id_line', true)  

      ];

      $config['upload_path']          = './Asset/img/temuan/';
      $config['allowed_types']        = 'gif|jpg|jpeg|png';
      $config['max_size']             = 10000;
      $config['encrypt_name']         = true;

      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('gambar'))
      {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('temuan/index', $error);
        exit;
      }

       if (empty($_FILES['email_penemu']['ket'])) {
        
      }
          
      $data['gambar'] = $this->upload->data('file_name');     
      $this->temuan_model->tambahDatatemuan($data);
      $this->session->set_flashdata('flash', 'di tambahkan');
      redirect('temuan/index/'.$this->input->post('jenis_barang'));
    }
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail temuan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabeltemuan'] = $this->temuan_model->getAllById($id);
    
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/topuser', $data);
    $this->load->view('temuan/detail', $data);
    $this->load->view('templates/footer1');
  }
  
}
