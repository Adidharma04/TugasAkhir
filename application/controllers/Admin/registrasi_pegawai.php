<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi_pegawai extends CI_Controller {

    public function index()
    {
        //-- rule--//
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'required'  => 'Masukkan Email',
            'is_unique' => 'Email telah terdaftar',
        ]);

        $this->form_validation->set_rules('no_induk', 'No Induk', 'required|trim|is_unique[user.no_induk]',[
            'required'  => 'Masukkan Nis',
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

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Masukkan nama'
        ]);

        //------------------------------------------------//
        
        //-- Title Halaman
        $data ['title'] = 'Halaman Registrasi';
        //----------------------------
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/registrasi_pegawai/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}
/* End of file registrasi.php */
?>