<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Penilaian_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> <br> 
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
        $data['penilaian'] = $this->Penilaian_model->tampilDataPenilaian(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/penilaian/index',$data);
        $this->load->view('Template/Admin/footer');
    }

    // proses hapus
    function onDelete( $id_penilaian ) {

        $this->Penilaian_model->prosesHapusPenilaian( $id_penilaian );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Data Penilaian berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/penilaian','refresh');
    }

}

/* End of file Controllername.php */

?>