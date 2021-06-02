<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_siswa extends CI_Controller {


    function __construct() {
        parent::__construct();

        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
            $session_destroy = $this->session->sess_destroy();
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Siswa!</small>
                </div>';
            $this->session->set_flashdata('msg', $html,$session_destroy);
            redirect('admin/login', 'refresh');
        }
    }

    public function index()
    {
        //-- Title Halaman
        $data ['title'] = 'Halaman Dashboard | Siswa';
        //----------------------------

        $this->load->view('siswa/dashboard_siswa/index');
    }

}

/* End of file Controllername.php */

?>