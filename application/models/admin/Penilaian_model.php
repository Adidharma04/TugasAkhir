<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {
    public function tampilDataPenilaian()
    {  
        // $this->db->select('penilaian.*');
        // return $this->db->get('penilaian')->result();

        $sql = "SELECT 
                    information_student.*,
                    penilaian.kritik, penilaian.saran, penilaian.created_at, penilaian.update_at
                    
                FROM penilaian
                
                JOIN information_student 
                
                ON information_student.id_profile = penilaian.id_profile";

        return $this->db->query( $sql );
    }

    function prosesHapusPenilaian( $id_penilaian ){

        $this->db->where('id_penilaian', $id_penilaian)->delete('penilaian');

    }
    
}

/* End of file ModelName.php */
?>