<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_alumni extends CI_Controller {


    function __construct() {
        parent::__construct();

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
        $this->load->model('Admin/siswa_model');
    }

    public function index()
    {
        //-- Title Halaman
        $data ['title'] = 'Halaman Dashboard | Alumni';
        //----------------------------

        $this->load->view('Template/Alumni/navbar_alumni',$data);
        $this->load->view('Template/Alumni/sidebar_alumni',$data);
        $this->load->view('Alumni/dashboard_alumni/index',$data);
        $this->load->view('Template/Alumni/footer_alumni');

    }

    // user edit
    public function edit($id_siswa){

        $getDataSiswaById = $this->siswa_model->getSiswa($id_siswa);
        $nis = $getDataSiswaById->nis;
        $email = $getDataSiswaById->email;

        // input 
        $inputNIS = $this->input->post('nis');
        $inputEmail = $this->input->post('email');

        if ($nis != $inputNIS) {
            //-- rule--//
            $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[profil_siswa.nis]', [
                'required' => 'Masukkan No Induk Siswa',
                'is_unique' => 'No Induk Siswa telah terdaftar',
            ]);
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Masukkan Nama Siswa',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukkan Alamat Siswa',
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Masukkan Tempat Lahir',
        ]);

        if ($email != $inputEmail) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[profil_siswa.email]', [
                'required'  => 'Masukkan Email Siswa',
                'is_unique' => 'Email telah terdaftar',
            ]);
        }

        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim', [
            'required' => 'Masukkan No Telpon Siswa',
        ]);

        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim', [
            'required' => 'Masukkan Tahun Lulus Siswa',
        ]);
        //----------------------------------------------------------------------
        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['profil_siswa'] = $getDataSiswaById;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar', $data);
            $this->load->view('Admin/siswa/edit', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $this->siswa_model->editDataSiswa($id_siswa);
            $html = '<div class="alert alert-success">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <b>Pemberitahuan</b> 
                        <br>
                        Data siswa berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/siswa', 'refresh');
        }
    }


    

}

/* End of file Controllername.php */

?>