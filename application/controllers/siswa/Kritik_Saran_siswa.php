<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_saran_siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Penilaian_model');
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
        $data['penilaian'] = $this->Penilaian_model->tampilDataPenilaian(); 
        
        $this->load->view('siswa/kritik_saran', $data);
    }
}
?>