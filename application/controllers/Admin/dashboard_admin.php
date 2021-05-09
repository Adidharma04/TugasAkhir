<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {


    function __construct() {
        parent::__construct();
        if ( empty( $this->session->userdata('sess_id_profile') )  ) {
            
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



        $this->load->model('M_dashboard');
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Dashboard | Admin';
         $data['tracer'] = $this->M_dashboard->ambilDataStatistik_kerjaKuliah();
         $data['record'] = $this->M_dashboard->ambilDataTracer();
         $data['header'] = $this->M_dashboard->ambilJumlah();
         //----------------------------

        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/dashboard_admin/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file Controllername.php */

?>