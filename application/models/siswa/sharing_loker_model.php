<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharing_loker_model extends CI_Model {
    public function tampilDataLoker()
    {  
        $this->db->select('loker.*');
        return $this->db->get('loker')->result();
    } 
    
}

/* End of file ModelName.php */
?>