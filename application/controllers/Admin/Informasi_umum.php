<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_umum extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Informasi_umum_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }
    public function index()
    {
        //-- Title Halaman
         $data ['title'] = 'Halaman Informasi Umum | admin';
        //----------------------------
        $data['informasi_umum'] = $this->Informasi_umum_model->tampilDataInformasiUmum(); 
        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar',$data);
        $this->load->view('admin/informasi_umum/index',$data);
        $this->load->view('Template/admin/footer');
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
         $data ['title'] = 'Halaman admin-Dashboard';
        //----------------------------
        $data['informasi_umum'] = $this->Informasi_umum_model->tampilDataInformasiUmum(); 
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/informasi_umum/tambah',$data);
            $this->load->view('Template/admin/footer');
        }else{

            $conf_foto_allowed = 'jpg|jpeg|png';
            $conf_foto_size    = 3000;


            $conf_berkas_allowed = 'pdf|docx|doc';
            $conf_berkas_size    = 10000;

            
            $upload_foto = $this->Informasi_umum_model->upload( $conf_foto_allowed, $conf_foto_size, 'foto' );
            $upload_berkas = $this->Informasi_umum_model->upload( $conf_berkas_allowed, $conf_berkas_size, 'berkas' );
            
            if ($upload_foto['result'] == 'success' || $upload_berkas['result'] == 'success') {
                
                // do insert
                $this->Informasi_umum_model->tambahDataInformasiUmum($upload_foto, $upload_berkas);
                
                $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Informasi Umum berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
                $this->session->set_flashdata('msg', $html);


                redirect('admin/informasi_umum','refresh');
            }else{
                echo $upload_foto['error'];
                echo '<hr>';
                echo $upload_berkas['error'];
            }
        }
    }
    public function edit($id_umum){

        $getDataInformasiUmumById = $this->Informasi_umum_model->getInformasiUmum($id_umum);

        $this->form_validation->set_rules('nama_informasi', 'Nama Informasi', 'required|trim',[
            'required' => 'Masukkan Informasi',
        ]);

        $this->form_validation->set_rules('deskripsi_informasi', 'Deskripsi', 'required|trim',[
            'required' => 'Masukkan Deskripsi',
        ]);
        
        //----------------------------------------------------------------------
        //-- Title Halaman
        $data ['title'] = 'Halaman admin-Dashboard';
        //----------------------------
        $data ['informasi_umum'] = $getDataInformasiUmumById;
        if($this->form_validation->run() == FALSE){
            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/informasi_umum/edit',$data);
            $this->load->view('Template/admin/footer');
        }
        else{
            $this->Informasi_umum_model->editDataInformasiUmum( $id_umum );
            $html = '<div class="alert alert-success">
                            <a href="sharing_loker" class="close" data-dismiss="alert" >&times;</a>
                            <b>Pemberitahuan</b> <br>
                            Data Loker berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                        </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('admin/informasi_umum','refresh');
        }
    }
    public function detail($id_umum){
        //-- Title Halaman
            $data ['title'] = 'Halaman admin-Dashboard';
        //----------------------------
            $data ['informasi_umum'] = $this->Informasi_umum_model->getInformasiUmum($id_umum);
            
            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar',$data);
            $this->load->view('admin/informasi_umum/detail',$data);
            $this->load->view('Template/admin/footer');
    }



    // proses hapus siswa
    function onDelete( $id_umum ) {

        $this->Informasi_umum_model->prosesHapusInformasiUmum( $id_umum );
        $html = '<div class="alert alert-success">
                     <b>Pemberitahuan</b> <br>
                     Informasi berhasil terhapus pada tanggal '.date('d F Y H.i A').'
                     </div>';
            $this->session->set_flashdata('msg', $html);
            redirect('admin/informasi_umum','refresh');
    }

}

/* End of file profile.php */
?>