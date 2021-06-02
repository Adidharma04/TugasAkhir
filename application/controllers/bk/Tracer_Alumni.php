<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_alumni extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/Tracer_alumni_model');
        $this->load->model('alumni/Tracer_model');



        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Guru BK!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Tracer alumni | Guru BK';
         //----------------------------
        $data['tracer_alumni'] = $this->Tracer_alumni_model->tampilDataTracerKuliah(); 
        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar_bk',$data);
        $this->load->view('bk/Tracer_alumni/index',$data);
        $this->load->view('Template/admin/footer');
    }




    // tracer detail
    function detail( $id_profile = null ) {


        if ( $id_profile ) {

            $data ['title'] = 'Detail Tracer | alumni';
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

            $this->load->view('Template/admin/navbar',$data);
            $this->load->view('Template/admin/sidebar_bk',$data);
            $this->load->view('bk/tracer_alumni/detail',$data);
            $this->load->view('Template/admin/footer');
        } else {

            // page not found
            show_404();
        }
        
    }

}

/* End of file Controllername.php */

?>