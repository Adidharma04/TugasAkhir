<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/sharing_loker_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan siswa!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }
    public function index()
    {
        $data['loker'] = $this->sharing_loker_model->tampilDataLokerUser(); 
        
        $this->load->view('siswa/Sharing_loker/index', $data);
    }
    public function detail($id_loker){
        //-- Title Halaman
            $data ['loker'] = $this->sharing_loker_model->getLoker($id_loker);
            $this->load->view('Siswa/sharing_loker/detail',$data);
    } 
}
?>