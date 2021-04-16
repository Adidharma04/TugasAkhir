<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_Kuliah extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Tracer_Kuliah_model');
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
         $data ['title'] = 'Halaman Kritik Saran | Admin';
         //----------------------------
        $data['tracer_kuliah'] = $this->Tracer_Kuliah_model->tampilDataTracerKuliah(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/Tracer_Kuliah/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file Controllername.php */

?>