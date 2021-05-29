<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {
    public function tampilDataPenilaian()
    {  
        $sql = "SELECT 
                    profil_siswa.*,
                    penilaian.id_penilaian,penilaian.kritik, penilaian.saran, penilaian.created_at, penilaian.update_at
                    
                FROM penilaian
                
                JOIN profil_siswa 
                
                ON profil_siswa.id_profile = penilaian.id_profile";

        return $this->db->query( $sql );
    }
    public function getPenilaian($id_penilaian){
        return $this->db->get_where('penilaian',['id_penilaian'=>$id_penilaian])->row();
	}
    // porses hapus
    function prosesHapusPenilaian( $id_penilaian ){

        $this->db->where('id_penilaian', $id_penilaian)->delete('penilaian');

    }
    
}

/* End of file ModelName.php */
?>