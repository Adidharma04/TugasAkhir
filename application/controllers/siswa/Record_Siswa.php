
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_Siswa extends CI_Controller {

    function __construct() {

        parent::__construct();

        // load siswa model
        $this->load->model('admin/siswa_model');
        $this->load->model('Alumni/Tracer_model');
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan siswa!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }
    }

    public function index()
    {

        // nilai awal
        $dataAlumni = $this->siswa_model->tampilDataAlumni();

        // init nilai 
        $total_kerja = 0;
        $total_kuliah = 0;
        $total_lainnya = 0;

        // tidak kosong
        if ( $dataAlumni->num_rows() > 0 ) {

            foreach ( $dataAlumni->result_array() AS $row ) {

                $dataKerja  = $this->Tracer_model->hitungTracerKerja( $row['id_profile'] );
                $dataKuliah = $this->Tracer_model->hitungTracerKuliah( $row['id_profile'] );

                // apabila alumni memiliki histori kerja
                if ( $dataKerja->num_rows() > 0 ) $total_kerja++;

                // apabila alumni memiliki histori kuliah
                if ( $dataKuliah->num_rows() > 0 ) $total_kuliah++;

                // lainnya apabila kerja 0 dan kuliah 0
                if ( ($dataKerja->num_rows() == 0) && ($dataKuliah->num_rows() == 0) ) $total_lainnya++;

            }
        }

        $data['total_alumni'] = $dataAlumni->num_rows();
        $data['total_kerja']  = $total_kerja;
        $data['total_kuliah'] = $total_kuliah;
        $data['total_lainnya'] = $total_lainnya;




        // ----------------------------------------

        // GET DATA FILTER
        $filter_tahun = $this->input->get('tahun');
        $filter_nama_alumni  = $this->input->get('nama');

        if ( (!empty($filter_tahun)) && ( !empty($filter_nama_alumni) ) ) {

            // filter keduanya
            $dataAlumni = $this->siswa_model->filter_datasiswa_nama_tahunlulus( $filter_tahun, $filter_nama_alumni );

        } else if ( $filter_tahun ) {


            // hanya filter tahun
            $dataAlumni = $this->siswa_model->filter_datasiswa_tahunlulus( $filter_tahun );


        } else if ( $filter_nama_alumni ) {

            // hanya filter nama
            $dataAlumni = $this->siswa_model->filter_datasiswa_nama( $filter_nama_alumni );


        } else {

            // tanpa filter
            $dataAlumni = $this->siswa_model->tampilDataAlumni();

        }
        
            
        $data['alumni'] = $dataAlumni;


        $this->load->view('siswa/record_siswa', $data);
    }


    // tracer detail
    function detail( $id_profile = null ) {


        if ( $id_profile ) {

            $data ['title'] = 'Halaman Tracer | Siswa';
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
            $this->load->view('siswa/detail_record',$data);
        } else {

            // page not found
            show_404();
        }
        
    }




    
}
?>