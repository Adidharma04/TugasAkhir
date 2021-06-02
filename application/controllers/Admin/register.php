<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/Register_model');
    }
    public function index()
    {
        $this->load->view('Template/Login_register/header.php');
        $this->load->view('admin/register/index');
        $this->load->view('Template/Login_register/footer.php');
        
    }
    public function registrasi(){
        $this->load->model("admin/Register_model");
       
    }
    private function _proses_registrasi(){
            $no_induk = $this->input->post('no_induk');
            $nama = $this->input->post('nama');

            $nis = $this->db->get_where('alumni',['no_induk'=> $no_induk])->row_array();
            $name = $this->db->get_where('alumni',['nama'=> $nama])->row_array();
            if($nis){
                if($name){
                    if($nis['role_id']==3){
                        $this->Register_model->registerAlumni();
                        $this->session->set_flashdata('pesan','<center> Registrasi anda berhasil. <br> Tunggu validasi Admin</center>');
                        redirect("admin/login");
                    }else{
                        $this->session->set_flashdata('not_alumni','<center>Anda Masih Menjadi Siswa. <br> Belum Menjadi Alumni </center>');
                        redirect("admin/register");
                    }
                   
                }else{
                    $this->session->set_flashdata('not_available_nama','<center>Nama anda tidak terdaftar</center>');
                    redirect("admin/register");
                }
                
            }else{
                $this->session->set_flashdata('not_available_nis','<center>NIS anda tidak terdaftar</center>');
                redirect("admin/register");
            }

           
    }	







    // check nis 
    function checkDataNIS() {

        $this->Register_model->cekDataNIS();
    }


    // proses registrasi siswa (alumni)
    function prosesRegistrasiSiswa() {

        $pesan = $this->Register_model->registrasiSiswa();   
        
        echo json_encode( $pesan );
    }





    function test() {

        $email = "dwinuchy@gmail.com";
        echo "mau mentesting gmail dari ". $email;


        $this->Register_model->notifikasiEmail( $email, "Dwi Nur" );
    }

}

/* End of file register.php */

?>