<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {
    public function tampilDataPenilaian()
    {  
        $this->db->select('penilaian.*');
        return $this->db->get('penilaian')->result();
    }

    function prosesHapusPenilaian( $id_penilaian ){

        $this->db->where('id_penilaian', $id_penilaian)->delete('penilaian');

    }
    
}

/* End of file ModelName.php */
?>