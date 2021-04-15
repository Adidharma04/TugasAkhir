<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    public function tampilDataLoker()
    {  
        $this->db->select('loker.*');
        return $this->db->get('loker')->result();
    }
    function prosesKonfirmasiStatus( $id_loker ){


        $status =  $this->input->get('status');

        $data = [

            'status'    => $status
        ];

        $this->db->where('id_loker', $id_loker);
        $this->db->update('loker', $data);
    }
}

/* End of file ModelName.php */
?>