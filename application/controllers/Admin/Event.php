<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {
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
        //-- Title Halaman
        $data ['title'] = 'Halaman Tambah Event | Admin';
        //----------------------------
        $data['event'] = $this->event_model->tampilDataEvent(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/event/tambah',$data);
        $this->load->view('Template/Admin/footer');
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
                     <center>
                        <a href="event" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <br>
                        Data Berhasil Di Edit!
                     <center>
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/evemt','refresh');
        }
    }

}

/* End of file profile.php */
?>