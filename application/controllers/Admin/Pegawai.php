<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Pegawai_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }

    public function index()
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Pegawai | Admin';
        //----------------------------
        $data['profil_pegawai'] = $this->Pegawai_model->tampilDataPegawai();
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar', $data);
        $this->load->view('Admin/pegawai/index', $data);
        $this->load->view('Template/Admin/footer');
    }

    public function tambah(){
        //-- rule--//
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required'  => 'Masukkan Nama',
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
        $this->form_validation->set_rules('level', 'Level', 'required|trim',[
            'required'  => 'Masukkan Level',
        ]);
        //------------------------------------------------//
        
        //-- Title Halaman
        $data ['title'] = 'Halaman Registrasi';
        //----------------------------
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/pegawai/tambah',$data);
            $this->load->view('Template/Admin/footer');
        }else{
            $this->Pegawai_model->tambahDataPegawai();
                $html = '<div class="alert alert-success">
                            <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Registrasi Pegawai berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/pegawai', 'refresh');
        }    
    }

}

/* End of file Pegawai.php */
?>