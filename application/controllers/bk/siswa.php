<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/siswa_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Guru BK!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Siswa | Guru BK';
        //----------------------------
        $data['information_student'] = $this->siswa_model->tampilDataSiswa();
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar_bk', $data);
        $this->load->view('bk/siswa/index', $data);
        $this->load->view('Template/Admin/footer');
    }
    public function detail($id_student)
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Guru BK';
        //----------------------------
        $data['information_student'] = $this->siswa_model->getSiswa($id_student);

        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar_bk', $data);
        $this->load->view('bk/siswa/detail', $data);
        $this->load->view('Template/Admin/footer');
    }
   
}

/* End of file profile.php */
