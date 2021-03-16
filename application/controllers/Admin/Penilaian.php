<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class penilaian extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/penilaian_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Kritik Saran | Admin';
         //----------------------------
        $data['penilaian'] = $this->penilaian_model->tampilDataPenilaian(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/penilaian/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file Controllername.php */

?>