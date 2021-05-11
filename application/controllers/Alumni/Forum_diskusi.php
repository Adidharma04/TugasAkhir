<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_diskusi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "alumni"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Alumni!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }

        $this->load->model('Alumni/forum_diskusi_model');
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Forum diskusi | Alumni';
        //----------------------------

        $data['topik'] = $this->forum_diskusi_model->getDataTopic();
        $data['forum'] = $this->forum_diskusi_model->getDataForum();


        // $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/Alumni/navbar_alumni',$data);
        $this->load->view('Template/Alumni/sidebar_alumni',$data);
        $this->load->view('Alumni/forum_diskusi/index',$data);
        $this->load->view('Template/Alumni/footer_alumni');
    }
    
    public function tambahForum()
    {   
        //rule
        $this->form_validation->set_rules('nama_forum', 'Nama Forum', 'required|trim',[
            'required' => 'Masukkan Nama Forum',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi Forum',
        ]);
        $this->form_validation->set_rules('tanggal_forum', 'Tanggal Forum', 'required|trim',[
            'required' => 'Masukkan Tanggal Forum',
        ]);

        //-- Title Halaman
        $data ['title'] = 'Halaman Forum tambah diskusi | Admin';
        $data['topik'] = $this->forum_diskusi_model->getDataTopic();
        //----------------------------
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/forum_diskusi/tambah',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }else{
            $upload = $this->forum_diskusi_model->upload();
            if ($upload['result'] == 'success') {
                $this->forum_diskusi_model->tambahDataForum($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Forum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Alumni/forum_diskusi', 'refresh');
                
            } else {
                echo $upload['error'];
            }
        }    
    }

     // Khusus Detail Forum-----------------------------------------------------------------------------------------


    // detail forum
    public function discuss( $id_forum ) {
        //-- Title Halaman
        $data ['title'] = 'Halaman Forum Detail | Admin';
        $data['detail'] = $this->forum_diskusi_model->getDataForumById( $id_forum );
        $data['diskusi'] = $this->forum_diskusi_model->getDataForumDetail( $id_forum );
        //----------------------------
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/forum_diskusi/forum_detail',$data);
            $this->load->view('Template/Admin/footer');
       
    }

}

/* End of file profile.php */
?>