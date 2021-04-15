<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {
    public function tampilDataPenilaian()
    {  
        // $this->db->select('penilaian.*');
        // return $this->db->get('penilaian')->result();

        $sql = "SELECT 
                    profil_siswa.*,
                    penilaian.kritik, penilaian.saran, penilaian.created_at, penilaian.update_at
                    
                FROM penilaian
                
                JOIN profil_siswa 
                
                ON profil_siswa.id_profile = penilaian.id_profile";

        return $this->db->query( $sql );



        // opsi 
        // $this->db->select('profil_siswa.*,
        // penilaian.kritik, penilaian.saran, penilaian.created_at, penilaian.update_at');


        // $this->db->from('penilaian');
        // $this->db->join('profil_siswa', 'profil_siswa.id_profile = penilaian.id_profile');
    }
    
}

/* End of file ModelName.php */
?>