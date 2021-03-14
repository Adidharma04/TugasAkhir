<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/siswa_model');
        // $this->load->helper('url');
        //     if ($this->session->userdata('role_id')!= 1) {
        //         redirect('Admin/login', 'refresh');
        //     }  
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Siswa | Admin';
        //----------------------------
        $data['information_student'] = $this->siswa_model->tampilDataSiswa(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/siswa/index',$data);
        $this->load->view('Template/Admin/footer');
    } 
    public function tambah()
    {
        //-- rule--//
        $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[information_student.nis]',[
            'required' => 'Masukkan No Induk Siswa',
            'is_unique' => 'No Induk Siswa telah terdaftar',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Masukkan Nama Siswa',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => 'Masukkan Alamat Siswa',
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',[
            'required' => 'Masukkan Tempat Lahir',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[information_student.email]',[
            'required'  => 'Masukkan Email Siswa',
            'is_unique' => 'Email telah terdaftar',
        ]);

        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim',[
            'required' => 'Masukkan No Telpon Siswa',
        ]);

        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim',[
            'required' => 'Masukkan Tahun Lulus Siswa',
        ]);
        //----------------------------------------------------------------------
        
        //-- Title Halaman
         $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['information_student'] = $this->siswa_model->tampilDataSiswa(); 
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/siswa/tambah',$data);
            $this->load->view('Template/Admin/footer');
        }else{
            $this->siswa_model->tambahDataSiswa();
            $this->session->set_flashdata('berhasil_tambah','<center> Data Siswa Berhasil Di tambah.</center>');
            redirect('Admin/siswa','refresh');
            echo "Data berhasil ditambah";
        }
    }

}

/* End of file profile.php */
?>