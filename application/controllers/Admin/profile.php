<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profile_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Siswa | Admin';
        //----------------------------
        $data['profile'] = $this->Profile_model->tampilDataProfile(); 
        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar',$data);
        $this->load->view('admin/profile/index',$data);
        $this->load->view('Template/admin/footer');
    } 

}

/* End of file profile.php */
?>