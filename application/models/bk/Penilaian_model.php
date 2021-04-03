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



        // opsi 
        // $this->db->select('information_student.*,
        // penilaian.kritik, penilaian.saran, penilaian.created_at, penilaian.update_at');


        // $this->db->from('penilaian');
        // $this->db->join('information_student', 'information_student.id_profile = penilaian.id_profile');
    }
    
}

/* End of file ModelName.php */
?>