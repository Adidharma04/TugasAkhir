<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

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

        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Login_register/header.php');
            $this->load->view('Admin/login/index');
            $this->load->view('Template/Login_register/footer.php');
        }else{
            $this->_prosesLogin();
        }
    }
    private function _prosesLogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['username'=> $username])->row_array();
        if($user){
            //usernya ada aktif
            if($user['status']=="aktif"){
                if(password_verify($password, $user['password'])){
                    $data =[
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                        $this->session->set_userdata($data);
                    if($user['role_id']==1){
                        redirect('Admin/home');
                    }
                    if($user['role_id']==3){
                        redirect('Alumni/dashboard_alumni');
                    }
  
                }else{
                    $this->session->set_flashdata('wrong_pass','<center> Password anda Salah!</center>');
                    redirect("Admin/login");
                }
            }else{
                $this->session->set_flashdata('not_aktif','<center> Username anda belum Di aktivasi!</center>');
                redirect("Admin/login");
            }
        }else{
            $this->session->set_flashdata('not_username','<center> Username anda tidak Terdaftar!</center>');
            redirect("Admin/login");
        }
    }

}

/* End of file login.php */
?>