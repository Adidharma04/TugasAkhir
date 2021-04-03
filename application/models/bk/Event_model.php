<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class event_model extends CI_Model {
    public function tampilDataEvent()
    {  
        $this->db->select('event.*');
        return $this->db->get('event')->result();
    }



    function prosesKonfirmasiStatus( $id_event ){


        $status =  $this->input->get('status');

        $data = [

            'status'    => $status
        ];

        $this->db->where('id_event', $id_event);
        $this->db->update('event', $data);
    }
}

/* End of file ModelName.php */
?>