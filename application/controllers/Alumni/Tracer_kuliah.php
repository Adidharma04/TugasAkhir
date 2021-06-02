<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_kuliah extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('alumni/Tracer_kuliah_model');
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
    public function index(){
        //-- Title Halaman
        $data ['title'] = 'Halaman Tambah Tracer Kuliah | alumni';
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
        $this->form_validation->set_rules('jalur_penerimaan', 'Jalur_penerimaan', 'required|trim',[
            'required' => 'Masukkan Jalur Penerimaan',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/Tracer_kuliah/index',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }else{
            $this->Tracer_kuliah_model->tambahDataTracerKuliah();
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Tracer Kuliah berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('alumni/tracer', 'refresh');
        }
    }

}

/* End of file Tracer_kuliah.php */
?>