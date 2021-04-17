<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_Kerja extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/Tracer_Kerja_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
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
         $data ['title'] = 'Halaman Kritik Saran | Guru BK';
         //----------------------------
        $data['tracer_kerja'] = $this->Tracer_Kerja_model->tampilDataTracerKerja(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar_bk',$data);
        $this->load->view('bk/Tracer_Kerja/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file Controllername.php */

?>