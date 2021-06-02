<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_alumni_model extends CI_Model {
    public function tampilDataTracerKuliah()
    {  

        $sql = "SELECT 
                    profil_siswa.*,
                    tracer_kuliah.nama_kampus, tracer_kuliah.program_studi, tracer_kuliah.tahun_masuk, tracer_kuliah.created_at
                    
                FROM tracer_kuliah
                
                JOIN profil_siswa 
                
                ON profil_siswa.id_profile = tracer_kuliah.id_profile
                GROUP BY id_profile";

        return $this->db->query( $sql );
    }
    
}

/* End of file ModelName.php */
?>