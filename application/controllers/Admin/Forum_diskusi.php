<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_diskusi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Admin/forum_diskusi_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
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
         $data ['title'] = 'Halaman Forum diskusi | Admin';
        //----------------------------
        // $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/forum_diskusi/index',$data);
        $this->load->view('Template/Admin/footer');
    } 
    public function tambah()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Forum tambah diskusi | Admin';
        //----------------------------
        // $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/forum_diskusi/tambah',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file profile.php */
?>