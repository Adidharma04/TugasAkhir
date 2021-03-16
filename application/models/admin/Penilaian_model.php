<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class penilaian_model extends CI_Model {
    public function tampilDataPenilaian()
    {  
        $this->db->select('penilaian.*');
        return $this->db->get('penilaian')->result();
    }
    
}

/* End of file ModelName.php */
?>