<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_umum extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Informasi_umum_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan siswa!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Informasi Umum | siswa';
        //----------------------------
        $data['informasi_umum'] = $this->Informasi_umum_model->tampilDataInformasiUmumUser(); 
        $this->load->view('siswa/Informasi_umum/index',$data);
    }
    public function detail($id_umum){
        //-- Title Halaman
            $data ['informasi_umum'] = $this->Informasi_umum_model->getInformasiUmum($id_umum);
            $data['latepost'] = $this->Informasi_umum_model->tampilDataInformasiUmumUser();
            $this->load->view('siswa/informasi_umum/detail',$data);
    } 

}

/* End of file profile.php */
?>