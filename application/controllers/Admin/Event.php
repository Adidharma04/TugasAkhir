<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/event_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
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
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Event | Admin';
        //----------------------------
        $data['event'] = $this->event_model->tampilDataEvent(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/event/index',$data);
        $this->load->view('Template/Admin/footer');
    } 
    public function tambah(){

        //rule
        $this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim',[
            'required' => 'Masukkan Nama Event',
        ]);
        $this->form_validation->set_rules('deskripsi_event', 'Deskripsi Event', 'required|trim',[
            'required' => 'Masukkan Deskripsi Event',
        ]);
        $this->form_validation->set_rules('lokasi', 'Lokasi Event', 'required|trim',[
            'required' => 'Masukkan Lokasi Event',
        ]);
        $this->form_validation->set_rules('tanggal_event', 'Tanggal Event', 'required|trim',[
            'required' => 'Masukkan Tanggal Event',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Tambah Event | Admin';
        //----------------------------
        $data['event'] = $this->event_model->tampilDataEvent(); 
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/event/tambah',$data);
            $this->load->view('Template/Admin/footer');
        }else{
            $upload = $this->event_model->upload();
            if ($upload['result'] == 'success') {
                $this->event_model->tambahDataEvent($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <br>
                                <b>Pemberitahuan</b> <br>
                                Data event berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/event', 'refresh');
            } else {
                echo $upload['error'];
            }
        }
    }
    public function edit($id_event){
        $getDataEventById = $this->event_model->getEvent($id_event);
        
        //rule
        $this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim',[
            'required' => 'Masukkan Nama Event',
        ]);
        $this->form_validation->set_rules('deskripsi_event', 'Deskripsi Event', 'required|trim',[
            'required' => 'Masukkan Deskripsi Event',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Edit Event | Admin';
        //----------------------------
        $data ['event'] = $getDataEventById;

        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/event/edit',$data);
            $this->load->view('Template/Admin/footer');
        }
        else{
            $this->event_model->editDataEvent( $id_event );
            $html = '<div class="alert alert-success">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <br>
                        <b>Pemberitahuan</b> <br>
                        Data event berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/event','refresh');
        }
    }

    // proses detail 
    public function detail($id_event){
        //-- Title Halaman
            $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
            $data ['event'] = $this->event_model->getEvent($id_event);
            
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/event/detail',$data);
            $this->load->view('Template/Admin/footer');
    }

    // proses hapus
    function onDelete( $id_event ) {

        $this->event_model->prosesHapusEvent( $id_event );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Data Event berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/event','refresh');
    }

}

/* End of file profile.php */
