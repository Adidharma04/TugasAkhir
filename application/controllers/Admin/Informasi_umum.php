<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_umum extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/informasi_umum_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
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
         $data ['title'] = 'Halaman Informasi Umum | Admin';
        //----------------------------
        $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/informasi_umum/index',$data);
        $this->load->view('Template/Admin/footer');
    } 
    public function tambah()
    {
        //-- rule--//
        $this->form_validation->set_rules('nama_informasi', 'Nama Informasi', 'required|trim',[
            'required' => 'Masukkan Informasi',
        ]);

        $this->form_validation->set_rules('deskripsi_informasi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);
        //----------------------------------------------------------------------
        
        //-- Title Halaman
         $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/informasi_umum/tambah',$data);
            $this->load->view('Template/Admin/footer');
        }else{
            $uploadBerkas = $this->informasi_umum_model->uploadBerkas();
            $uploadFoto = $this->informasi_umum_model->uploadFoto();
            if ($uploadBerkas['result'] == 'success' || $uploadFoto['result'] == 'success' ) {
                $this->informasi_umum_model->tambahDataInformasiUmum($uploadBerkas,$uploadFoto);
                $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Informasi Umum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
                $this->session->set_flashdata('msg', $html);
                // redirect('Admin/informasi_umum','refresh');
                
            }else{
                echo $uploadBerkas['error'];
            }
        }
    }
    public function edit($id_umum){

        $getDataInformasiUmumById = $this->informasi_umum_model->getInformasiUmum($id_umum);

        $this->form_validation->set_rules('nama_informasi', 'Nama Informasi', 'required|trim',[
            'required' => 'Masukkan Informasi',
        ]);

        $this->form_validation->set_rules('deskripsi_informasi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);
        
        //----------------------------------------------------------------------
        //-- Title Halaman
        $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
        $data ['informasi_umum'] = $getDataInformasiUmumById;
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/informasi_umum/edit',$data);
            $this->load->view('Template/Admin/footer');
        }
        else{
            $this->informasi_umum_model->editDataInformasiUmum( $id_umum );
            $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Loker berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/informasi_umum','refresh');
        }
    }
    public function detail($id_umum){
        //-- Title Halaman
            $data ['title'] = 'Halaman Admin-Dashboard';
        //----------------------------
            $data ['informasi_umum'] = $this->informasi_umum_model->getInformasiUmum($id_umum);
            
            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/informasi_umum/detail',$data);
            $this->load->view('Template/Admin/footer');
    }



    // proses hapus siswa
    function onDelete( $id_umum ) {

        $this->informasi_umum_model->prosesHapusInformasiUmum( $id_umum );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Informasi berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('Admin/informasi_umum','refresh');
    }

}

/* End of file profile.php */
?>