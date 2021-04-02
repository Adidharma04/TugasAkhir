<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_bk extends CI_Controller {


    function __construct() {
        parent::__construct();
        if ( empty( $this->session->userdata('sess_id_profile') )  ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Guru BK!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Dashboard | Guru BK';
         //----------------------------

        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar_bk',$data);
        $this->load->view('bk/dashboard_bk/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file Controllername.php */

?>