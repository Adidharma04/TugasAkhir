<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pegawai_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }

    // Proses Tampil data Pegawai
    public function index()
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Pegawai | admin';
        //----------------------------
        $data['profil_pegawai'] = $this->Pegawai_model->tampilDataPegawai();
        $this->load->view('Template/admin/navbar', $data);
        $this->load->view('Template/admin/sidebar', $data);
        $this->load->view('admin/pegawai/index', $data);
        $this->load->view('Template/admin/footer');
    }

    // Proses Tambah data Pegawai
    public function tambah(){
        //-- rule--//
        $this->form_validation->set_rules('no_induk', 'No Induk', 'required|trim|is_unique[profil_pegawai.no_induk]',[
            'required'  => 'Masukkan No Induk Pegawai',
            'is_unique' => 'No Induk Pegawai telah terdaftar',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required'  => 'Masukkan Nama Pegawai',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[profil_pegawai.email]',[
            'required'  => 'Masukkan Email',
            'is_unique' => 'Email telah terdaftar',
        ]);

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
            'required'  => 'Masukkan Jenis Kelamin',
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',[
            'required'  => 'Masukkan Tanggal Lahir',
        ]);
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',[
            'required'  => 'Masukkan Tempat Lahir',
        ]);

        $this->form_validation->set_rules('no_telfon', 'No Telfon', 'required|trim|is_unique[profil_pegawai.no_telfon]',[
            'required'  => 'Masukkan No Telfon',
            'is_unique' => 'No Telfon telah terdaftar',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required'  => 'Masukkan Alamat',
        ]);
        //------------------------------------------------//
        
        //-- Title Halaman
        $data ['title'] = 'Halaman Registrasi';
        //----------------------------
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/pegawai/tambah',$data);
            $this->load->view('Template/admin/footer');
        }else{
            $this->Pegawai_model->tambahDataPegawai();
                $html = '<div class="alert alert-success">
                            <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Registrasi Pegawai berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('admin/pegawai', 'refresh');
        }    
    }

    // Proses Edit data Pegawai
    public function edit($id_pegawai)
    {
        $getDataPegawaiById = $this->Pegawai_model->getPegawai($id_pegawai);

        $no_induk = $getDataPegawaiById->no_induk;
        $email = $getDataPegawaiById->email;

        // input 
        $inputNoInduk = $this->input->post('no_induk');
        $inputEmail = $this->input->post('email');

        if ($no_induk != $inputNoInduk) {
            //-- rule--//
            $this->form_validation->set_rules('no_induk', 'No Induk ', 'required|trim|is_unique[profil_pegawai.no_induk]', [
                'required' => 'Masukkan No Induk Pegawai',
                'is_unique' => 'No Induk Pegawai telah terdaftar',
            ]);
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Masukkan Nama Pegawai',
        ]);

        if ($email != $inputEmail) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[profil_siswa.email]', [
                'required'  => 'Masukkan Email Siswa',
                'is_unique' => 'Email telah terdaftar',
            ]);
        }

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Pilih Jenis Kelamin Pegawai',
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Masukkan Tanggal Lahir',
        ]);
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Masukkan Tempat Lahir',
        ]);

        $this->form_validation->set_rules('no_telfon', 'No telfon', 'required|trim', [
            'required' => 'Masukkan No Telfon',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukkan Alamat Pegawai',
        ]);

        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim', [
            'required' => 'Masukkan No Telpon Pegawai',
        ]);

        //----------------------------------------------------------------------
        //-- Title Halaman
        $data['title'] = 'Halaman admin-Dashboard';
        //----------------------------
        $data['profil_pegawai'] = $getDataPegawaiById;

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/admin/navbar', $data);
            $this->load->view('Template/admin/sidebar', $data);
            $this->load->view('admin/pegawai/edit', $data);
            $this->load->view('Template/admin/footer');
        } else {
            $this->Pegawai_model->editDataPegawai($id_pegawai);
            $html = '<div class="alert alert-success">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> 
                        <br>
                        Data Pegawai berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('admin/pegawai', 'refresh');
        }
    }

    // Proses Tampil Detail data Pegawai
    public function detail($id_pegawai)
    {
        //-- Title Halaman
        $data['title'] = 'Halaman admin-Dashboard';
        //----------------------------
        $data['profil_pegawai'] = $this->Pegawai_model->getPegawai($id_pegawai);

        $this->load->view('Template/admin/navbar', $data);
        $this->load->view('Template/admin/sidebar', $data);
        $this->load->view('admin/pegawai/detail', $data);
        $this->load->view('Template/admin/footer');
    }

     // proses Hapus data Pewgawai
     function onDelete($id_profile)
     {
         $this->Pegawai_model->prosesHapusPegawai($id_profile);
         $html = '<div class="alert alert-success">
                     <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                     <b>Pemberitahuan</b> <br>
                     Data Pegawai berhasil terhapus pada tanggal ' . date('d F Y H.i A') . '
                  </div>';
         $this->session->set_flashdata('msg', $html);
         redirect('admin/pegawai', 'refresh');
     }

}

/* End of file Pegawai.php */
?>