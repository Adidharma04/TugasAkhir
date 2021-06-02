<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Event_model');
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
         $data ['title'] = 'Halaman Event | admin';
        //----------------------------
        $data['event'] = $this->Event_model->tampilDataEvent(); 
        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar',$data);
        $this->load->view('admin/event/index',$data);
        $this->load->view('Template/admin/footer');
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
        $data ['title'] = 'Halaman Tambah Event | admin';
        //----------------------------
        $data['event'] = $this->Event_model->tampilDataEvent(); 
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/event/tambah',$data);
            $this->load->view('Template/admin/footer');
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
        $data ['title'] = 'Halaman Edit Event | admin';
        //----------------------------
        $data ['event'] = $getDataEventById;
        
            if($this->form_validation->run() == FALSE){
                $this->load->view('Template/admin/navbar',$data);
                $this->load->view('Template/admin/sidebar',$data);
                $this->load->view('admin/event/edit',$data);
                $this->load->view('Template/admin/footer');
            }
            else{
                $this->Event_model->editDataEvent( $id_event );
                $html = '<div class="alert alert-success">
                            <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                            <br>
                            <b>Pemberitahuan</b> <br>
                            Data event berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('admin/event','refresh');
            }
        }

    // proses detail 
    public function detail($id_event){
        //-- Title Halaman
            $data ['title'] = 'Halaman admin-Dashboard';
        //----------------------------
            $data ['event'] = $this->Event_model->getEvent($id_event);
            
            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/event/detail',$data);
            $this->load->view('Template/admin/footer');
    }

    // proses hapus
    function onDelete( $id_event ) {

        $this->Event_model->prosesHapusEvent( $id_event );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Data Event berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('admin/event','refresh');
    }

}

/* End of file profile.php */
