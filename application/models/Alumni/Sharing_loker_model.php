<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    
    public function tampilDataLoker()
    {
        $this->db->select('penilaian.*');
        return $this->db->get('penilaian')->result();
    }
    
}

/* End of file ModelName.php */
?>