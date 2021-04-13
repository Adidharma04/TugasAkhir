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
                redirect("Admin/login");
            }
            if($this->session->userdata('sess_level') != "alumni"){
                $session_destroy = $this->session->sess_destroy();
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda Bukan Alumni!</small>
                    </div>';
                $this->session->set_flashdata('msg', $html,$session_destroy);
                redirect('Admin/login', 'refresh');
            }



            // load model
            $this->load->model('Alumni/Tracer_model');

            $this->load->model('Alumni/Tracer_kerja_model');
            $this->load->model('Alumni/Tracer_kuliah_model');
        }

        public function index(){
            
            //-- Title Halaman
            $data ['title'] = 'Halaman Tracer | Alumni';
            $data['tracer'] =  $this->Tracer_model->getDataTracer();
            //----------------------------

            $this->load->view('Template/Alumni/navbar_alumni',$data);
            $this->load->view('Template/Alumni/sidebar_alumni',$data);
            $this->load->view('Alumni/tracer/index',$data);
            // $this->load->view('Template/Alumni/footer_alumni');
        }




        // proses hapus
        function proseshapustracer( $tipe, $id ) {

            $this->Tracer_model->hapusTracer( $tipe, $id );
        }







        function viewupdatetracer( $tipe, $id ) {

            $ambilDataTracer = $this->Tracer_model->getDataTracerByTypeAndId( $tipe, $id )->row_array();
            
            //-- Title Halaman
            $data ['title'] = 'Halaman Tracer | Alumni';
            $data['tracer'] =  $ambilDataTracer;


            if ( $tipe == "kuliah" ) {

                //----------------------------
                $this->load->view('Template/Alumni/navbar_alumni',$data);
                $this->load->view('Template/Alumni/sidebar_alumni',$data);
                $this->load->view('Alumni/tracer/index',$data);

            } else if ( $tipe == "kerja" ) {

                 $this->load->view('Template/Alumni/navbar_alumni',$data);
                 $this->load->view('Template/Alumni/sidebar_alumni',$data);
                 $this->load->view('Alumni/tracer/index',$data);

            }
            
        }   

    
    }
    
    /* End of file Tracer.php */
    