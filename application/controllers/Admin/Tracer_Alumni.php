<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_Alumni extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Tracer_Alumni_model');
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
         $data ['title'] = 'Halaman Tracer Alumni | Admin';
         //----------------------------
        $data['tracer_alumni'] = $this->Tracer_Alumni_model->tampilDataTracerKuliah(); 
        $data['tracer_kuliahkerja'] = $this->Tracer_Alumni_model->ambilDataStatistik_kerjaKuliah();
        
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/Tracer_Alumni/index',$data);
        $this->load->view('Template/Admin/footer');


        // print_r( $data['tracer_alumni']->result_array() );
    }




    // tracer detail
    function detail( $id_profile = null ) {


        if ( $id_profile ) {

            $data ['title'] = 'Detail Tracer | Alumni';
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
            }

            $this->load->view('Template/Admin/navbar',$data);
            $this->load->view('Template/Admin/sidebar',$data);
            $this->load->view('Admin/tracer_alumni/detail',$data);
            $this->load->view('Template/Admin/footer');
        } else {

            // page not found
            show_404();
        }
        
    }

}

/* End of file Controllername.php */

?>