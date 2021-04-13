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
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim',[
            'required' => 'Masukkan Nama Perusahaan',
        ]);
        $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'required|trim',[
            'required' => 'Masukkan Jenis Perusahaan',
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim',[
            'required' => 'Masukkan Jabatan',
        ]);
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim',[
            'required' => 'Masukkan Alamat Perusahaan',
        ]); 
        $this->form_validation->set_rules('status', 'Status', 'required|trim',[
            'required' => 'Masukkan Status',
        ]);
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim',[
            'required' => 'Masukkan Tahun Masuk',
        ]);
        $this->form_validation->set_rules('tahun_keluar', 'Tahun Keluar', 'required|trim',[
            'required' => 'Masukkan Tahun Keluar',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/Tracer_kerja/index',$data);
            $this->load->view('Template/Alumni/footer_alumni');
        }else{
            $this->tracer_kerja_model->tambahDataTracerKerja();
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Tracer Kerja berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Alumni/tracer', 'refresh');
        }        
    }

}

/* End of file Tracer_kerja.php */
?>