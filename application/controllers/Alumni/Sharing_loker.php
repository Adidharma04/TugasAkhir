<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('Alumni/sharing_loker_model');
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
        $data ['title'] = 'Halaman Sharing Loker | Alumni';
        //----------------------------
        $data['loker'] = $this->sharing_loker_model->tampilDataLoker(); 
        $this->load->view('Template/Alumni/navbar_alumni',$data);
        $this->load->view('Template/Alumni/sidebar_alumni',$data);
        $this->load->view('Alumni/sharing_loker/index',$data);
        $this->load->view('Template/Alumni/footer_alumni');  
    }
    public function tambah()
    {
        //-- rule--//
        $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required|trim',[
            'required' => 'Masukkan Nama Pekerjaan',
        ]);

        $this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);


        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => 'Masukkan Alamat Perusahaan',
        ]);
        //----------------------------------------------------------------------
        
        //-- Title Halaman
         $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['loker'] = $this->sharing_loker_model->tampilDataLoker(); 
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/sharing_loker/tambah',$data);
            $this->load->view('Template/Alumni/footer_alumni');  
        }else{
            $conf_foto_allowed = 'jpg|jpeg|png';
            $conf_foto_size    = 3000;


            $conf_berkas_allowed = 'pdf|docx|doc';
            $conf_berkas_size    = 10000;

            
            $upload_foto = $this->sharing_loker_model->upload( $conf_foto_allowed, $conf_foto_size, 'foto' );
            $upload_berkas = $this->sharing_loker_model->upload( $conf_berkas_allowed, $conf_berkas_size, 'berkas' );
            
            if ($upload_foto['result'] == 'success' || $upload_berkas['result'] == 'success') {
                $this->sharing_loker_model->tambahDataLoker($upload_foto,$upload_berkas);
                $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Loker berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/sharing_loker','refresh');
            }else{
                echo $upload_foto['error'];
                echo '<hr>';
                echo $upload_berkas['error'];
            }
        }
    }
    public function edit($id_loker){

        $getDataLokerById = $this->sharing_loker_model->getLoker($id_loker);

        $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required|trim',[
            'required' => 'Masukkan Nama Pekerjaan',
        ]);

        $this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => 'Masukkan Alamat Perusahaan',
        ]);
        
        //----------------------------------------------------------------------
        //-- Title Halaman
        $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data ['loker'] = $getDataLokerById;
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/sharing_loker/edit',$data);
            $this->load->view('Template/Alumni/footer_alumni');  
        }
        else{
            $this->sharing_loker_model->editDataLoker( $id_loker );
            $html = '<div class="alert alert-success">
                        <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> <br>
                        Data Loker berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Alumni/sharing_loker','refresh');
        }
    } 
    // proses hapus siswa
    function onDelete( $id_loker ) {

        $this->sharing_loker_model->prosesHapusLoker( $id_loker );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> 
                     <br>
                     Data Loker berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Alumni/sharing_loker','refresh');
    } 
    


}

/* End of file Controllername.php */

?>