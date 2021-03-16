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
            $upload = $this->siswa_model->upload();
            if ($upload['result'] == 'success') {
                $this->siswa_model->tambahDataSiswa($upload);
                $html = '<div class="alert alert-success">
                        <center>
                            <a href="siswa" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <br>
                            Data Berhasil Di Tambah!
                        <center>
                        </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/siswa','refresh');
            }else{
                echo $upload['error'];
            }
        }
    }
    public function edit($id_student){
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
        $data ['information_student'] = $this->siswa_model->getSiswa($id_student);
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/siswa/edit',$data);
            $this->load->view('Template/Admin/footer');
        }
        else{
            $this->siswa_model->ubahDataSiswa();
            $html = '<div class="alert alert-success">
                     <center>
                        <a href="siswa" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <br>
                        Data Berhasil Di Edit!
                     <center>
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/siswa','refresh');
        }
    }
    public function detail($id_student){
        //-- Title Halaman
            $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
            $data ['information_student'] = $this->siswa_model->getSiswa($id_student);
            
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/siswa/detail',$data);
            $this->load->view('Template/Admin/footer');
    }

}

/* End of file profile.php */
?>