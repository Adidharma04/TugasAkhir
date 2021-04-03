<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('Alumni/event_model');
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
        $data ['title'] = 'Halaman Event | Alumni';
        //----------------------------
        $data['event'] = $this->event_model->tampilDataEvent(); 
        $this->load->view('Template/Alumni/navbar_alumni',$data);
        $this->load->view('Template/Alumni/sidebar_alumni',$data);
        $this->load->view('Alumni/event/index',$data);
        $this->load->view('Template/Alumni/footer_alumni');  
    }

    public function tambah(){
        //-- Title Halaman
        $data ['title'] = 'Halaman Tambah Penilaian | Alumni';
        //----------------------------
        //rule
        $this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim',[
            'required' => 'Masukkan Nama Event',
        ]);
        $this->form_validation->set_rules('deskripsi_event', 'Deskripsi Event', 'required|trim',[
            'required' => 'Masukkan Deskripsi Event',
        ]);
        $this->form_validation->set_rules('tanggal_event', 'Tanggal Event', 'required|trim',[
            'required' => 'Masukkan Tanggal Event',
        ]);
        $this->form_validation->set_rules('lokasi', 'Lokasi Event', 'required|trim',[
            'required' => 'Masukkan Lokasi Event',
        ]);
        $this->form_validation->set_rules('jenis_event', 'Jenis Event', 'required|trim',[
            'required' => 'Masukkan Jenis Event',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/event/tambah',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }else{
            $upload = $this->event_model->upload();
            if ($upload['result'] == 'success') {
                $this->event_model->tambahDataEvent($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Data event berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Alumni/event', 'refresh');
            } else {
                echo $upload['error'];
            }
        }

    }


}

/* End of file Controllername.php */

?>