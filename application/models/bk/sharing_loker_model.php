<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    public function tampilDataLoker()
    {  
        $this->db->select('job_vacancy.*');
        return $this->db->get('job_vacancy')->result();
    }
    function prosesKonfirmasiStatus( $id_vacancy ){


        $status =  $this->input->get('status');

        $data = [

            'status'    => $status
        ];

        $this->db->where('id_vacancy', $id_vacancy);
        $this->db->update('job_vacancy', $data);
    }
}

/* End of file ModelName.php */
?>