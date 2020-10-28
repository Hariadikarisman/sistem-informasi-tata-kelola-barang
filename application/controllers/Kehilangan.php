<?php 

class Kehilangan extends CI_Controller {
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
    $data['judul'] = 'DATA kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $jenis;
    // $data['tabelkehilangan'] = $this->kehilangan_model->getAll($jenis);
    $config['base_url'] = site_url('kehilangan/index/' . $jenis );
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
    $this->load->view('templates/headuser', $data);  
    $this->load->view('kehilangan/index', $data);
    $this->load->view('templates/footer1');
  }

   public function buat()
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
        "peran"              => $this->input->post('peran', true),
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

        if ($this->upload->do_upload('gambar'))
        {
          $data['gambar'] = $this->upload->data('file_name');
        }
      } 
      // return "no-image.png";

    
       $this->kehilangan_model->tambahDatakehilangan($data);
      $this->session->set_flashdata('flash', 'di tambahkan');
      redirect('kehilangan/index/'.$this->input->post('jenis_barang'));
      }
  }


  public function detail($id)
  {
    $data['judul'] = 'Detail kehilangan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tabelkehilangan'] = $this->kehilangan_model->getAllById($id);
    
    $this->load->view('templates/headuser', $data);
    $this->load->view('templates/topuser', $data);
    $this->load->view('kehilangan/detail', $data);
    $this->load->view('templates/footer1');
  }
  
}
