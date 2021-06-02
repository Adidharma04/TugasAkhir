<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Tracer extends CI_Controller {
        

        // construct
        function __construct() {


            parent::__construct();

            // pengecekan sesi (session)
            if ( empty( $this->session->userdata('sess_id_profile') ) ) {
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                            <small>Anda harus login terlebih dahulu !</small>
                        </div>';
                $this->session->set_flashdata('msg', $html);
                redirect("admin/login");
            }
            if($this->session->userdata('sess_level') != "alumni"){
                $session_destroy = $this->session->sess_destroy();
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda Bukan alumni!</small>
                    </div>';
                $this->session->set_flashdata('msg', $html,$session_destroy);
                redirect('admin/login', 'refresh');
            }
            // load model
            $this->load->model('alumni/Tracer_model');

            $this->load->model('alumni/Tracer_kerja_model');
            $this->load->model('alumni/Tracer_kuliah_model');
        }

        public function index(){
            
            //-- Title Halaman
            // session 
            $id_profile = $this->session->userdata('sess_id_profile');

            $data ['title'] = 'Halaman Tracer | alumni';
            $data['tracer'] =  $this->Tracer_model->getDataTracer( $id_profile );
            //----------------------------

            $this->load->view('Template/alumni/navbar_alumni',$data);
            $this->load->view('Template/alumni/sidebar_alumni',$data);
            $this->load->view('alumni/tracer/index',$data);
            $this->load->view('Template/alumni/footer_alumni');
        }

        // proses hapus
        function proseshapustracer( $tipe, $id ) {

            $this->Tracer_model->hapusTracer( $tipe, $id );
        }

        function viewupdatetracer( $tipe, $id ) {

            $ambilDataTracer = $this->Tracer_model->getDataTracerByTypeAndId( $tipe, $id )->row_array();
        
            //-- Title Halaman
            $data ['title'] = 'Halaman Tracer | alumni';
            $data ['tracer'] =  $ambilDataTracer;
            $data ['tipe']   = $tipe;

            if ( $tipe == "kuliah" ) {
                $this->form_validation->set_rules('nama_kampus', 'Nama Kampus', 'required|trim', [
                    'required' => 'Masukkan Nama Kampus',
                ]); 
                $this->form_validation->set_rules('program_studi', 'Program Studi', 'required|trim', [
                    'required' => 'Masukkan Program Studi',
                ]); 
                $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
                    'required' => 'Masukkan Jurusan',
                ]); 
                $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim', [
                    'required' => 'Masukkan Tahun Masuk',
                ]); 
                $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim', [
                    'required' => 'Masukkan Tahun Lulus',
                ]);
                $this->form_validation->set_rules('jalur_penerimaan', 'Jalur Penerimaan', 'required|trim', [
                    'required' => 'Masukkan Jalur Penerimaan',
                ]);

                //----------------------------
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('Template/alumni/navbar_alumni',$data);
                    $this->load->view('Template/alumni/sidebar_alumni',$data);
                    $this->load->view('alumni/tracer/edit_tracer_kuliah',$data);
                    $this->load->view('Template/alumni/footer_alumni');
                }else{
                    $this->Tracer_model->editDataTracer ($tipe,$id);
                    $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> 
                                <br>
                                Data Tracer Kuliah berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                            </div>';
                    $this->session->set_flashdata('msg', $html);
                    redirect('alumni/tracer', 'refresh');
                }

            } else if ( $tipe == "kerja" ) {
                $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim', [
                    'required' => 'Masukkan Nama Perusahaan',
                ]); 
                $this->form_validation->set_rules('jenis_perusahaan', 'Jenis Perusahaan', 'required|trim', [
                    'required' => 'Masukkan Jenis Perusahaan',
                ]); 
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
                    'required' => 'Masukkan Jabatan',
                ]); 
                $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim', [
                    'required' => 'Masukkan Tahun Masuk',
                ]); 

                $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim', [
                    'required' => 'Masukkan Alamat Perusahaan',
                ]);
                $this->form_validation->set_rules('status', 'Status', 'required|trim', [
                    'required' => 'Masukkan Status',
                ]);
                if ($this->form_validation->run() == FALSE) {
                 $this->load->view('Template/alumni/navbar_alumni',$data);
                 $this->load->view('Template/alumni/sidebar_alumni',$data);
                 $this->load->view('alumni/tracer/edit_tracer_kerja',$data);
                 $this->load->view('Template/alumni/footer_alumni');
                }else{
                    $this->Tracer_model->editDataTracer();
                    $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> 
                                <br>
                                Data Tracer Kerja berhasil di edit pada tanggal ' . date('d F Y H.i A') . '
                            </div>';
                    $this->session->set_flashdata('msg', $html);
                    redirect('alumni/tracer', 'refresh');
                }

            }
            
        }   

    
    }
    
    /* End of file Tracer.php */
    