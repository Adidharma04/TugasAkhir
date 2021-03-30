<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('Alumni/penilaian_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "alumni"){
            $session_destroy = $this->session->sess_destroy();
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Alumni!</small>
                </div>';
            $this->session->set_flashdata('msg', $html,$session_destroy);
            redirect('Admin/login', 'refresh');
        }
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Dashboard | Alumni';
        //----------------------------

        $data['penilaian'] = $this->penilaian_model->tampilDataPenilaian();

        $this->load->view('Template/Alumni/navbar_alumni',$data);
        $this->load->view('Template/Alumni/sidebar_alumni',$data);
        $this->load->view('Alumni/penilaian/index',$data);
        $this->load->view('Template/Alumni/footer_alumni');

        // print_r( $data['penilaian'] );
    }
    public function tambah()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Tambah Penilaian | Alumni';
        //----------------------------
        //rule
         $this->form_validation->set_rules('kritik', 'Kritik', 'required|trim',[
            'required' => 'Masukkan Kritik',
        ]);
        $this->form_validation->set_rules('saran', 'Saran', 'required|trim',[
            'required' => 'Masukkan Saran',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/penilaian/tambah',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }else{
            $this->penilaian_model->tambahDataPenilaian();
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Kritik dan saran berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Alumni/penilaian', 'refresh');
        }
    }


}

/* End of file Controllername.php */

?>