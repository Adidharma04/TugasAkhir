<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_role_model extends CI_Model {

    public function tampilUserRole()
    {  
        $this->db->select('user_role.*');
        return $this->db->get('user_role')->result();
    }

}

/* End of file ModelName.php */
?>