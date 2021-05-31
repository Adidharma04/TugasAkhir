<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('Alumni/informasi_umum_model');
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
        $data ['title'] = 'Halaman Informasi Umum | Alumni';
        //----------------------------
        $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasi(); 
        $this->load->view('Template/Alumni/navbar_alumni',$data);
        $this->load->view('Template/Alumni/sidebar_alumni',$data);
        $this->load->view('Alumni/informasi_umum/index',$data);
        $this->load->view('Template/Alumni/footer_alumni');  
    }

    public function tambah(){
         //-- Title Halaman
         $data ['title'] = 'Halaman Tambah Penilaian | Alumni';
         //----------------------------

         //-- rule--//
         $this->form_validation->set_rules('nama_informasi', 'Nama Informasi', 'required|trim',[
            'required' => 'Masukkan Informasi',
        ]);

        $this->form_validation->set_rules('deskripsi_informasi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);
        //----------------------------------------------------------------------
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/informasi_umum/tambah',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }else{
            $conf_foto_allowed = 'jpg|jpeg|png';
            $conf_foto_size    = 3000;


            $conf_berkas_allowed = 'pdf|docx|doc';
            $conf_berkas_size    = 10000;

            
            $upload_foto = $this->informasi_umum_model->upload( $conf_foto_allowed, $conf_foto_size, 'foto' );
            $upload_berkas = $this->informasi_umum_model->upload( $conf_berkas_allowed, $conf_berkas_size, 'berkas' );
            
            if ($upload_foto['result'] == 'success' || $upload_berkas['result'] == 'success') {
                
                // do insert
                $this->informasi_umum_model->tambahDataInformasi($upload_foto, $upload_berkas);
                
                $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Informasi Umum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
                $this->session->set_flashdata('msg', $html);


                redirect('Alumni/informasi_umum','refresh');
            }else{
                echo $upload_foto['error'];
                echo '<hr>';
                echo $upload_berkas['error'];
            }
        }
    }public function edit($id_umum){

        $getDataInformasiUmumById = $this->informasi_umum_model->getInformasiUmum($id_umum);

        $this->form_validation->set_rules('nama_informasi', 'Nama Informasi', 'required|trim',[
            'required' => 'Masukkan Informasi',
        ]);

        $this->form_validation->set_rules('deskripsi_informasi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);
        //----------------------------------------------------------------------
        //-- Title Halaman
        $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data ['informasi_umum'] = $getDataInformasiUmumById;
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/informasi_umum/edit',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }
        else{
            $this->informasi_umum_model->editDataInformasiUmum( $id_umum );
            $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Loker berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Alumni/informasi_umum','refresh');
        }
    }
    // proses hapus siswa
    function onDelete( $id_umum ) {
        $this->informasi_umum_model->prosesHapusInformasiUmum( $id_umum );
        $html = '<div class="alert alert-success">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                    <b>Pemberitahuan</b> <br>
                    Informasi berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Alumni/informasi_umum','refresh');
    }


}

/* End of file Controllername.php */

?>