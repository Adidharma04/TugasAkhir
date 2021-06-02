<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
    public function tampilDataProfile()
    {  
        $this->db->select('profile.*');
        return $this->db->get('profile')->result();
    }
    
}

/* End of file ModelName.php */
?>