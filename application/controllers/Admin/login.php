<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Admin/login_model');        
    }
    public function index()
    {
        //--validasi untuk cek username
        $this->form_validation->set_rules('username', 'Username', 'required|trim',[
            'required'  => 'Masukkan Username',
        ]);
        
        //--validasi untuk cek password
        $this->form_validation->set_rules('password', 'Password', 'required|trim',[
            'required'  => 'Masukkan Password',
        ]);
        
         //-- Title Halaman
         $data ['title'] = 'Halaman Login';
         //----------------------------

        if( $this->form_validation->run() == FALSE ){

            $this->load->view('Template/Login_register/header.php');
            $this->load->view('Admin/login/index', $data);
            $this->load->view('Template/Login_register/footer.php');
            
        }else{
            $this->_prosesAkunLogin();
        }
    }




    function _prosesAkunLogin(){

        // ambil nilai dari view 
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // call model
        $ambilDataProfile = $this->login_model->getDataLogin( $username );

        // check account registered
        if ( $ambilDataProfile->num_rows() == 1 ) {

            $kolom = $ambilDataProfile->row_array();

            // check password
            if ( password_verify( $password, $kolom['password'] ) ) {

                // add session 
                $addSession = array(

                    'sess_id_profile'   => $kolom['id_profile'],
                    'sess_level'        => $kolom['level'],
                    'sess_username'     => $kolom['username']
                );
                $this->session->set_userdata($addSession);


                if ( ($kolom['level'] == "staff") || ($kolom['level'] == "bk") ) {

                    $id_profile = $kolom['id_profile'];
                    $getDataInformationEmployee = $this->login_model->getDataEmployeeBy_IdLogin( $id_profile );

                    $kolomEmployee = $getDataInformationEmployee->row_array();
                    if ( $getDataInformationEmployee->num_rows() == 0 ) {
                        
                        $this->session->set_userdata('sess_name', $kolom['username']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolom['id_profile']);
                    } else {

                        $this->session->set_userdata('sess_name', $kolomEmployee['nama']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolomEmployee['tanggal_lahir']);
                        $this->session->set_userdata('sess_alamat', $kolomEmployee['alamat']);
                        $this->session->set_userdata('sess_email', $kolomEmployee['email']);
                        $this->session->set_userdata('sess_telfon', $kolomEmployee['no_telfon']);
                    }
                }

                if ( ($kolom['level'] == "bk") || ($kolom['level'] == "bk") ) {

                    $id_profile = $kolom['id_profile'];
                    $getDataInformationEmployeeBK = $this->login_model->getDataEmployeeBKBy_IdLogin( $id_profile );

                    $kolomEmployeeBK = $getDataInformationEmployeeBK->row_array();
                    if ( $getDataInformationEmployeeBK->num_rows() == 0 ) {
                        
                        $this->session->set_userdata('sess_name', $kolom['username']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolom['id_profile']);
                    } else {

                        $this->session->set_userdata('sess_name', $kolomEmployeeBK['nama']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolomEmployeeBK['tanggal_lahir']);
                        $this->session->set_userdata('sess_alamat', $kolomEmployeeBK['alamat']);
                        $this->session->set_userdata('sess_email', $kolomEmployeeBK['email']);
                        $this->session->set_userdata('sess_telfon', $kolomEmployeeBK['no_telfon']);
                    }
                }

                if ( ($kolom['level'] == "alumni")  ) {

                    $id_profile = $kolom['id_profile'];
                    $getDataInformationAlumni = $this->login_model->getDataAlumniBy_IdLogin( $id_profile );

                    $kolomAlumni = $getDataInformationAlumni->row_array();
                    if ( $getDataInformationAlumni->num_rows() == 0 ) {
                        
                        $this->session->set_userdata('sess_name', $kolom['username']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolom['id_profile']);
                    } else {

                        $this->session->set_userdata('sess_name', $kolomAlumni['nama']);
                        $this->session->set_userdata('sess_nis', $kolomAlumni['nis']);
                        $this->session->set_userdata('sess_id_student', $kolomAlumni['id_student']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolomAlumni['tanggal_lahir']);
                        $this->session->set_userdata('sess_alamat', $kolomAlumni['alamat']);
                        $this->session->set_userdata('sess_email', $kolomAlumni['email']);
                        $this->session->set_userdata('sess_telfon', $kolomAlumni['no_telfon']);
                        $this->session->set_userdata('sess_foto', $kolomAlumni['foto']);
                        $this->session->set_userdata('sess_gender', $kolomAlumni['jenis_kelamin']);
                    }
                }

                if ( ($kolom['level'] == "siswa")  ) {

                    $id_profile = $kolom['id_profile'];
                    $getDataInformationSiswa = $this->login_model->getDataSiswaBy_IdLogin( $id_profile );

                    $kolomSiswa = $getDataInformationSiswa->row_array();
                    if ( $getDataInformationSiswa->num_rows() == 0 ) {
                        
                        $this->session->set_userdata('sess_name', $kolom['username']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolom['id_profile']);
                    } else {

                        $this->session->set_userdata('sess_name', $kolomSiswa['nama']);
                        $this->session->set_userdata('sess_tanggal_lahir', $kolomSiswa['tanggal_lahir']);
                        $this->session->set_userdata('sess_alamat', $kolomSiswa['alamat']);
                        $this->session->set_userdata('sess_email', $kolomSiswa['email']);
                        $this->session->set_userdata('sess_telfon', $kolomSiswa['no_telfon']);
                        $this->session->set_userdata('sess_foto', $kolomSiswa['foto']);
                        $this->session->set_userdata('sess_gender', $kolomSiswa['jenis_kelamin']);
                    }
                }
                // end session

                // role ? 

                /// ................
                switch ( $kolom['level'] ) {

                    case "staff":
                        redirect("admin/dashboard_admin");
                        break;

                    case "bk";
                        redirect("bk/dashboard_bk");
                        break;

                    case "siswa":
                        redirect("siswa/dashboard_siswa");
                        break;
                    case "alumni":
                        redirect("Alumni/dashboard_alumni");
                        break;
                }
                /// ................

            } else {
                $html = '<div class="alert alert-info alert-warning">
                         <center>
                            <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <align="left"><b>Pemberitahuan</b></align>
                            <br>
                            Password anda Salah
                         <center>
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect("Admin/login");
            }


        } else {
            $html = '<div class="alert alert-info alert-danger">
                    <center>
                        <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <align="left"><b>Pemberitahuan</b></align>
                        <br>
                        Akun Anda belum terdaftar
                    <center>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Admin/login', 'refresh');
    }

}

/* End of file login.php */
?>