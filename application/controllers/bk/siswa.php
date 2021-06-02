<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/Siswa_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Guru BK!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Siswa | Guru BK';
        //----------------------------
        $data['profil_siswa'] = $this->Siswa_model->tampilDataSiswa();
        $this->load->view('Template/admin/navbar', $data);
        $this->load->view('Template/admin/sidebar_bk', $data);
        $this->load->view('bk/siswa/index', $data);
        $this->load->view('Template/admin/footer');
    }
    public function detail($id_siswa)
    {
        //-- Title Halaman
        $data['title'] = 'Halaman admin-Guru BK';
        //----------------------------
        $data['profil_siswa'] = $this->Siswa_model->getSiswa($id_siswa);

        $this->load->view('Template/admin/navbar', $data);
        $this->load->view('Template/admin/sidebar_bk', $data);
        $this->load->view('bk/siswa/detail', $data);
        $this->load->view('Template/admin/footer');
    }

    function processVerify( $id_siswa ) {

        $this->Siswa_model->prosesKonfirmasiStatus( $id_siswa );
        redirect('bk/siswa', 'refresh');
    }
   
}

/* End of file profile.php */
