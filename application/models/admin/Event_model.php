<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class event_model extends CI_Model {
    public function tampilDataEvent()
    {  
        $this->db->select('event.*');
        return $this->db->get('event')->result();
    }
    public function getEvent($id_event){
        return $this->db->get_where('event',['id_event'=>$id_event])->row();
	}
}

/* End of file ModelName.php */
?>