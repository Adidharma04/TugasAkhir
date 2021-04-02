<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    public function tampilDataLoker()
    {  
        $this->db->select('job_vacancy.*');
        return $this->db->get('job_vacancy')->result();
    }
}

/* End of file ModelName.php */
?>