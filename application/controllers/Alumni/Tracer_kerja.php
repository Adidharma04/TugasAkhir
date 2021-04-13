<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_kerja extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Alumni/tracer_kerja_model');
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
        $data ['title'] = 'Halaman Tambah Tracer Kerja | Alumni';
        //----------------------------
        //rule
        $this->form_validation->set_rules('nama_kampus', 'Nama Kampus', 'required|trim',[
            'required' => 'Masukkan Nama Kampus',
        ]);
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required|trim',[
            'required' => 'Masukkan Program Studi',
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
            'required' => 'Masukkan Jurusan',
        ]);
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim',[
            'required' => 'Masukkan Tahun Masuk',
        ]);
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim',[
            'required' => 'Masukkan Tahun Lulus',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/Tracer_kuliah/index',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }else{
            $this->tracer_kuliah_model->tambahDataTracerKuliah();
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Tracer Kuliah berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Alumni/tracer', 'refresh');
        }        
    }

}

/* End of file Tracer_kerja.php */
?>