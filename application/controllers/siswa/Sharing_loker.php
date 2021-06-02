<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Sharing_loker_model');
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
        $data['loker'] = $this->Sharing_loker_model->tampilDataLokerUser(); 
        
        $this->load->view('siswa/Sharing_loker/index', $data);
    }
    public function detail($id_loker){
        //-- Title Halaman
            $data ['loker'] = $this->Sharing_loker_model->getLoker($id_loker);
            $data['latepost'] = $this->Sharing_loker_model->tampilDataLokerUser();
            $this->load->view('Siswa/sharing_loker/detail',$data);
    } 
}
?>