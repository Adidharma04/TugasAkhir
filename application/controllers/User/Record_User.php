
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_user extends CI_Controller {

    function __construct() {

        parent::__construct();

        // load siswa model
        $this->load->model('admin/Siswa_model');
        $this->load->model('alumni/Tracer_model');
    }

    public function index()
    {

        // load library pagination
        $this->load->library('pagination');
        
        // nilai awal
        $dataAlumni = $this->Siswa_model->tampilDataAlumni();

    
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


        $uri = $this->uri->segment(4);
        $from = 0;

        if ( !empty($uri) )  {

            $from = $uri;
        }


        $config['base_url'] = base_url().'user/record_user/index/';
        $config['total_rows'] = $dataAlumni->num_rows();
        $config['per_page'] = 8;
        
        $config['full_tag_open'] = '<ul class="pagination modal-1">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=""><a href="#" style="background-color: #61ba6d; color : #f5f5f5">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li>';
        

        // init 
        $this->pagination->initialize($config);	

        $key = [

            'per_page'  => $config['per_page'],
            'from'      => $from
        ];

        
        

        // GET DATA FILTER
        $filter_tahun = $this->input->get('tahun');
        $filter_nama_alumni  = $this->input->get('nama');

        if ( (!empty($filter_tahun)) && ( !empty($filter_nama_alumni) ) ) {

            // filter keduanya
            $dataAlumni = $this->Siswa_model->filter_datasiswa_nama_tahunlulus( $filter_tahun, $filter_nama_alumni );

        } else if ( $filter_tahun ) {


            // hanya filter tahun
            $dataAlumni = $this->Siswa_model->filter_datasiswa_tahunlulus( $filter_tahun );


        } else if ( $filter_nama_alumni ) {

            // hanya filter nama
            $dataAlumni = $this->Siswa_model->filter_datasiswa_nama( $filter_nama_alumni );


        } else {

            // tanpa filter
            $dataAlumni = $this->Siswa_model->tampilDataAlumni( $key );
            
        }   
        
            
        $data['alumni'] = $dataAlumni;
        $this->load->view('user/record_user', $data);
    }


    // tracer detail
    function detail( $id_profile = null ) {


        if ( $id_profile ) {

            $data ['title'] = 'Halaman Tracer | User';
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
            $this->load->view('user/detail_record',$data);
        } else {

            // page not found
            show_404();
        }
        
    }




    
}
?>