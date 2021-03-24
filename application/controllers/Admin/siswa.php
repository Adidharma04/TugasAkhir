<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/siswa_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Siswa | Admin';
        //----------------------------
        $data['information_student'] = $this->siswa_model->tampilDataSiswa();
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar', $data);
        $this->load->view('Admin/siswa/index', $data);
        $this->load->view('Template/Admin/footer');
    }
    public function tambah()
    {
        //-- rule--//
        $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[information_student.nis]', [
            'required' => 'Masukkan No Induk Siswa',
            'is_unique' => 'No Induk Siswa telah terdaftar',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Masukkan Nama Siswa',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukkan Alamat Siswa',
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Masukkan Tanggal Lahir',
        ]);
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Masukkan Tempat Lahir',
        ]);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Pilih salah satu jurusan',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[information_student.email]', [
            'required'  => 'Masukkan Email Siswa',
            'is_unique' => 'Email telah terdaftar',
        ]);
        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim', [
            'required' => 'Masukkan No Telpon Siswa',
        ]);
        $this->form_validation->set_rules('verifikasi_alumni', 'Verifikasi Alumni', 'required|trim', [
            'required' => 'Masukkan Verifikasi Alumni',
        ]);

        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim', [
            'required' => 'Masukkan Tahun Lulus Siswa',
        ]);
        //----------------------------------------------------------------------

        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['information_student'] = $this->siswa_model->tampilDataSiswa();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar', $data);
            $this->load->view('Admin/siswa/tambah', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $upload = $this->siswa_model->upload();
            if ($upload['result'] == 'success') {
                $this->siswa_model->tambahDataSiswa($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Data siswa berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('Admin/siswa', 'refresh');
            } else {
                echo $upload['error'];
            }
        }
    }
    public function edit($id_student)
    {
        $getDataSiswaById = $this->siswa_model->getSiswa($id_student);
        $nis = $getDataSiswaById->nis;
        $email = $getDataSiswaById->email;

        // input 
        $inputNIS = $this->input->post('nis');
        $inputEmail = $this->input->post('email');

        if ($nis != $inputNIS) {
            //-- rule--//
            $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[information_student.nis]', [
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

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[information_student.email]', [
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
        $data['information_student'] = $getDataSiswaById;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar', $data);
            $this->load->view('Admin/siswa/edit', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $this->siswa_model->editDataSiswa($id_student);
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
    public function detail($id_student)
    {
        //-- Title Halaman
        $data['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['information_student'] = $this->siswa_model->getSiswa($id_student);

        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar', $data);
        $this->load->view('Admin/siswa/detail', $data);
        $this->load->view('Template/Admin/footer');
    }



    // proses hapus siswa
    function onDelete($id_profile)
    {
        $this->siswa_model->prosesHapusSiswa($id_profile);
        $html = '<div class="alert alert-success">
                    <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                    <b>Pemberitahuan</b> <br>
                    Data siswa berhasil terhapus pada tanggal ' . date('d F Y H.i A') . '
                 </div>';
        $this->session->set_flashdata('msg', $html);
        redirect('Admin/siswa', 'refresh');
    }
}

/* End of file profile.php */
