<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
    public function tampilDataEvent()
    {  
        $this->db->select('event.*');
        return $this->db->get('event')->result();
    }
}

/* End of file ModelName.php */
?>