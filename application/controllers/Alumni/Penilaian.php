<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('alumni/Penilaian_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "alumni"){
            $session_destroy = $this->session->sess_destroy();
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan alumni!</small>
                </div>';
            $this->session->set_flashdata('msg', $html,$session_destroy);
            redirect('admin/login', 'refresh');
        }
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Dashboard | alumni';
        //----------------------------

        $data['penilaian'] = $this->Penilaian_model->tampilDataPenilaian();

        $this->load->view('Template/alumni/navbar_alumni',$data);
        $this->load->view('Template/alumni/sidebar_alumni',$data);
        $this->load->view('alumni/penilaian/index',$data);
        $this->load->view('Template/alumni/footer_alumni');

        // print_r( $data['penilaian'] );
    }
    public function tambah()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Tambah Penilaian | alumni';
        //----------------------------
        //rule
         $this->form_validation->set_rules('kritik', 'Kritik', 'required|trim',[
            'required' => 'Masukkan Kritik',
        ]);
        $this->form_validation->set_rules('saran', 'Saran', 'required|trim',[
            'required' => 'Masukkan Saran',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/penilaian/tambah',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }else{
            $this->Penilaian_model->tambahDataPenilaian();
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Kritik dan saran berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/penilaian', 'refresh');
        }
    }
    public function edit($id_penilaian){
        $getDataPenilaianById = $this->Penilaian_model->getPenilaian($id_penilaian);
        //rule
        $this->form_validation->set_rules('kritik', 'Kritik', 'required|trim',[
            'required' => 'Masukkan Kritik',
        ]);
        $this->form_validation->set_rules('saran', 'Saran', 'required|trim',[
            'required' => 'Masukkan Saran',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Edit Penilaian | alumni';
        //----------------------------
        $data ['penilaian'] = $getDataPenilaianById;

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/penilaian/edit',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }else{
            $this->Penilaian_model->editDataPenilaian($id_penilaian);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Kritik dan saran berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/penilaian', 'refresh');
        }
    }


}

/* End of file Controllername.php */

?>