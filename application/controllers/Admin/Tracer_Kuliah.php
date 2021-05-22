<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_Kuliah extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Tracer_Kuliah_model');
        $this->load->model('Alumni/Tracer_model');



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
         $data ['title'] = 'Halaman Kritik Saran | Admin';
         //----------------------------
        $data['tracer_kuliah'] = $this->Tracer_Kuliah_model->tampilDataTracerKuliah(); 
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/Tracer_Kuliah/index',$data);
        $this->load->view('Template/Admin/footer');
    }




    // tracer detail
    function detail( $id_profile = null ) {


        if ( $id_profile ) {

            $data ['title'] = 'Halaman Tracer | Alumni';
            $data['tracer'] =  $this->Tracer_model->getDataTracer( $id_profile );
            //----------------------------

            foreach ( $data['tracer'] as $row ) {

                // echo $row['data']['nama_perusahaan'].' '; 

                $nama = "";
                if ( $row['tipe_tracer'] == "kuliah" ) {

                    $nama = $row['data']['nama_kampus'];
                } else {

                    $nama = $row['data']['nama_perusahaan'];
                }
                echo $nama.' ';
                echo $row['tipe_tracer'].'<hr>';
            }

            // $this->load->view('Template/Admin/navbar',$data);
            // $this->load->view('Template/Admin/sidebar',$data);
            // $this->load->view('Alumni/tracer/index',$data);
            // $this->load->view('Template/Admin/footer');
        } else {

            // page not found
            show_404();
        }
        
    }

}

/* End of file Controllername.php */

?>