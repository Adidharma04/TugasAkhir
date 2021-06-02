<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('alumni/Event_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "alumni"){
            $session_destroy = $this->session->sess_destroy();
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan alumni!</small>
                </div>';
            $this->session->set_flashdata('msg', $html,$session_destroy);
            redirect('Admin/login', 'refresh');
        }
    }

    public function index()
    {
        //-- Title Halaman
        $data ['title'] = 'Halaman Event | alumni';
        //----------------------------
        $data['event'] = $this->Event_model->tampilDataEvent(); 
        $this->load->view('Template/alumni/navbar_alumni',$data);
        $this->load->view('Template/alumni/sidebar_alumni',$data);
        $this->load->view('alumni/event/index',$data);
        $this->load->view('Template/alumni/footer_alumni');  
    }

    public function tambah(){
        //-- Title Halaman
        $data ['title'] = 'Halaman Tambah Event | alumni';
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
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/event/tambah',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }else{
            $upload = $this->Event_model->upload();
            if ($upload['result'] == 'success') {
                $this->Event_model->tambahDataEvent($upload);
            } else {
                echo $upload['error'];
            }
        }
    }
    public function edit($id_event){
        $getDataEventById = $this->Event_model->getEvent($id_event);
        
        //rule
        $this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim',[
            'required' => 'Masukkan Nama Event',
        ]);
        $this->form_validation->set_rules('deskripsi_event', 'Deskripsi Event', 'required|trim',[
            'required' => 'Masukkan Deskripsi Event',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Edit Event | alumni';
        //----------------------------
        $data ['event'] = $getDataEventById;
        
            if($this->form_validation->run() == FALSE){
                $this->load->view('Template/alumni/navbar_alumni',$data);
                $this->load->view('Template/alumni/sidebar_alumni',$data);
                $this->load->view('alumni/event/edit',$data);
                $this->load->view('Template/alumni/footer_alumni');

            }
            else{
                $this->Event_model->editDataEvent( $id_event );
                $html = '<div class="alert alert-success">
                            <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b>
                            <br>
                            Data event berhasil <b>Di update</b> pada tanggal ' . date('d F Y H.i A') . '
                            <br>
                            <small>Silahkan cek Email '.$this->session->userdata("sess_email").' untuk menunggu konfirmasi dari BK! </small>
                            </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/event','refresh');
            }
        }
        // proses hapus
    function onDelete( $id_event ) {

        $this->Event_model->prosesHapusEvent( $id_event );
        $html = '<div class="alert alert-success">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                    <b>Pemberitahuan</b>
                    <br>
                    Data Event berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('alumni/event','refresh');
    }

}

/* End of file Controllername.php */

?>