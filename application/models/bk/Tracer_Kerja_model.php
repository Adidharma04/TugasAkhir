<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer_Kerja_model extends CI_Model {
    public function tampilDataTracerKerja()
    {  

        $sql = "SELECT 
                    profil_siswa.*,
                    tracer_kerja.nama_perusahaan, tracer_kerja.jabatan, tracer_kerja.tahun_masuk, tracer_kerja.created_at
                    
                FROM tracer_kerja
                
                JOIN profil_siswa 
                
                ON profil_siswa.id_profile = tracer_kerja.id_profile";

        return $this->db->query( $sql );
    }
    
}

/* End of file ModelName.php */
?>