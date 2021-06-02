<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_umum extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/Informasi_umum_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Guru BK!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Informasi Umum | Guru BK';
        //----------------------------
        $data['informasi_umum'] = $this->Informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar_bk',$data);
        $this->load->view('bk/informasi_umum/index',$data);
        $this->load->view('Template/admin/footer');
    } 
    function processVerify( $id_umum ) {

        $this->Informasi_umum_model->prosesKonfirmasiStatus( $id_umum );
        redirect('bk/informasi_umum', 'refresh');
    }
}

/* End of file profile.php */
?>