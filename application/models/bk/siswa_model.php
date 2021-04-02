<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa_model extends CI_Model {
    public function tampilDataSiswa()
    {  
        $this->db->select('information_student.*');
        return $this->db->get('information_student')->result();
    }

    public function getSiswa($id_student){
		// return $this->db->get_where('information_student',['id_student'=>$id_student])->result();
        return $this->db->get_where('information_student',['id_student'=>$id_student])->row();
	}
}

/* End of file ModelName.php */
?>