<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/event_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
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
         $data ['title'] = 'Halaman Event | Guru BK';
        //----------------------------
        $data['event'] = $this->event_model->tampilDataEvent(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar_bk',$data);
        $this->load->view('bk/event/index',$data);
        $this->load->view('Template/Admin/footer');
    } 



    function processVerify( $id_event ) {

        $this->event_model->prosesKonfirmasiStatus( $id_event );
        redirect('bk/event', 'refresh');
    }
}

/* End of file profile.php */
