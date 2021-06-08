<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_alumni_model extends CI_Model {
    public function tampilDataTracerKuliah()
    {  

        $data_tahun = date('Y');

        $filter_tahun = $this->input->get('graduate');
        if ( $filter_tahun ) {

            $data_tahun = $filter_tahun;
        }

        $sql = "SELECT 
                    profil_siswa.*,
                    tracer_kuliah.nama_kampus, tracer_kuliah.program_studi, tracer_kuliah.tahun_masuk, tracer_kuliah.created_at
                    
                FROM tracer_kuliah
                
                JOIN profil_siswa 
                
                ON profil_siswa.id_profile = tracer_kuliah.id_profile WHERE profil_siswa.tahun_lulus = '$data_tahun'
                GROUP BY id_profile";

        return $this->db->query( $sql );
    }


        // Gabungan Kuliah dan Kerja
        function unionTracerKuliahAndKerja() {

            $sql = "SELECT 
                    tahun_masuk AS tahun, 'kerja' AS tipe, 
                    profil_siswa.*
                    
                FROM tracer_kerja 
                JOIN profil_siswa ON profil_siswa.id_profile = tracer_kerja.id_profile
                
                GROUP BY id_profile
                
                
                UNION
                
                           
                
                SELECT tahun_masuk AS tahun, 'kuliah' AS tipe,
                profil_siswa.*
                    
                FROM tracer_kuliah
                JOIN profil_siswa ON profil_siswa.id_profile = tracer_kuliah.id_profile
                GROUP BY id_profile
                
                
                ";
                return $this->db->query( $sql );
        }
    
    
    





    // ambil data statistik antara kerja dan kuliah
    function ambilDataStatistik_kerjaKuliah() {

        $data = array();
        $data_tahun = date('Y');

        $filter_tahun = $this->input->get('tahun');
        if ( $filter_tahun ) {

            $data_tahun = $filter_tahun;
        }

        // kerja
        $sql_kerja  = "SELECT * FROM tracer_kerja WHERE tahun_masuk = '$data_tahun'";
        $sql_kuliah = "SELECT * FROM tracer_kuliah WHERE tahun_masuk = '$data_tahun'";


        $query_kerja  = $this->db->query( $sql_kerja );
        $query_kuliah = $this->db->query( $sql_kuliah );

        $data = array(

            'tahun' => $data_tahun,
            'kerja' => $query_kerja->num_rows(),
            'kuliah'=> $query_kuliah->num_rows()
        );
        
        return $data;
    }

    
    
}

/* End of file ModelName.php */
?>