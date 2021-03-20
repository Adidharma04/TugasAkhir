<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Admin/register_model');
    }
    public function index()
    {
         //-- rule--//
         $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Masukkan nama Siswa'
        ]);
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'required'  => 'Masukkan Email Siswa',
            'is_unique' => 'Email telah terdaftar',
        ]);

        $this->form_validation->set_rules('no_induk', 'No Induk', 'required|trim|is_unique[user.no_induk]',[
            'required'  => 'Masukkan Nis Siswa',
            'is_unique' => 'Nis telah tersedia',
        ]);
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
            'required'  => 'Masukkan Username',
            'is_unique' => 'Username telah terdaftar',
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'required' => 'Masukkan Password' ,
            'matches' => 'Password tidak sama',
            'min_length' => 'Minimal 3 karakter'

        ]);      
        
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
            'required' => 'Masukkan Re-Password'
        ]);  

        //------------------------------------------------//

        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Login_register/header.php');
            $this->load->view('Admin/register/index');
            $this->load->view('Template/Login_register/footer.php');
        }else{
            $this->_proses_registrasi();
        }
    }
    public function registrasi(){
        $this->load->model("Admin/register_model");
       
    }
    private function _proses_registrasi(){
            $no_induk = $this->input->post('no_induk');
            $nama = $this->input->post('nama');

            $nis = $this->db->get_where('alumni',['no_induk'=> $no_induk])->row_array();
            $name = $this->db->get_where('alumni',['nama'=> $nama])->row_array();
            if($nis){
                if($name){
                    if($nis['role_id']==3){
                        $this->register_model->registerAlumni();
                        $this->session->set_flashdata('pesan','<center> Registrasi anda berhasil. <br> Tunggu validasi Admin</center>');
                        redirect("Admin/login");
                    }else{
                        $this->session->set_flashdata('not_alumni','<center>Anda Masih Menjadi Siswa. <br> Belum Menjadi Alumni </center>');
                        redirect("Admin/register");
                    }
                   
                }else{
                    $this->session->set_flashdata('not_available_nama','<center>Nama anda tidak terdaftar</center>');
                    redirect("Admin/register");
                }
                
            }else{
                $this->session->set_flashdata('not_available_nis','<center>NIS anda tidak terdaftar</center>');
                redirect("Admin/register");
            }

           
    }	







    // check nis 
    function checkDataNIS() {

        $this->register_model->cekDataNIS();
    }

}

/* End of file register.php */

?>