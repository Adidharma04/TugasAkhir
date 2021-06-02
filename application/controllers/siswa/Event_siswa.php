<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_siswa extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa/Event_model');
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
        //-- Title Halaman
         $data ['title'] = 'Halaman Event | siswa';
        //----------------------------
        $data['event'] = $this->Event_model->tampilDataEvent(); 
        $this->load->view('siswa/event', $data);
    } 

}

/* End of file profile.php */
