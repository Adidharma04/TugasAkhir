<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharing_loker extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa/sharing_loker_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
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
         $data ['title'] = 'Halaman Informasi Loker | Siswa';
        //----------------------------
        $data['job_vacancy'] = $this->sharing_loker_model->tampilDataLoker(); 
        $this->load->view('Template/siswa/navbar_siswa',$data);
        $this->load->view('Template/siswa/sidebar_siswa',$data);
        $this->load->view('siswa/sharing_loker/index',$data);
        $this->load->view('Template/siswa/footer_siswa');
    } 

}

/* End of file profile.php */
?>