<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/pegawai_model');
        $this->load->model('Admin/user_role_model');
        $this->load->helper('url');
            if ($this->session->userdata('role_id')!= 1) {
                redirect('Admin/login', 'refresh');
            }
    }
    
    public function index()
    {
        //-- Memanggil session login
        $data['user'] = $this->db->get_where('user',['username' =>
        $this->session->userdata('username')])->row_array();
        //----------------------------

        //-- Title Halaman
        $data ['title'] = 'Form Index Pegawai ';
        //----------------------------
        
        $data['pegawai'] = $this->pegawai_model->tampilPegawai();
        
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Admin/pegawai/index',$data);
        $this->load->view('Template/Admin/footer',$data);
    }

}

/* End of file user.php */
?>