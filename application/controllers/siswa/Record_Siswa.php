<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load siswa model
        $this->load->model('admin/siswa_model');
        $this->load->model('Alumni/Tracer_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan siswa!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }
    public function index()
    {
        $dataAlumni = $this->siswa_model->tampilDataAlumni();

        // init nilai 
        $total_kerja = 0;
        $total_kuliah = 0;
        $total_lainnya = 0;

        // tidak kosong
        if ( $dataAlumni->num_rows() > 0 ) {

            foreach ( $dataAlumni->result_array() AS $row ) {

                $dataKerja  = $this->Tracer_model->hitungTracerKerja( $row['id_profile'] );
                $dataKuliah = $this->Tracer_model->hitungTracerKuliah( $row['id_profile'] );

                // apabila alumni memiliki histori kerja
                if ( $dataKerja->num_rows() > 0 ) $total_kerja++;

                // apabila alumni memiliki histori kuliah
                if ( $dataKuliah->num_rows() > 0 ) $total_kuliah++;

                // lainnya apabila kerja 0 dan kuliah 0
                if ( ($dataKerja->num_rows() == 0) && ($dataKuliah->num_rows() == 0) ) $total_lainnya++;

            }
        }
            
        $data['alumni'] = $dataAlumni;
        
        $data['total_alumni'] = $dataAlumni->num_rows();
        $data['total_kerja']  = $total_kerja;
        $data['total_kuliah'] = $total_kuliah;
        $data['total_lainnya'] = $total_lainnya;



        $this->load->view('siswa/record_siswa', $data);
    }
}
?>