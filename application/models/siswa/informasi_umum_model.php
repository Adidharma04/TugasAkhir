<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmum()
    {  
        $this->db->select('informasi_umum.*');
        return $this->db->get('informasi_umum')->result();
    }

    // public function showInfoBaru(){
    //     $this->db->select('informasi_umum.*');
    //     $this->db->limit(3);
    //     $this->db->order_by('id_umum', 'DESC');
    //     return $this->db->get('informasi_umum')->result();
    // }


    // SELECT * FROM informasi_umum ORDER BY created_at DESC LIMIT 3
}

/* End of file ModelName.php */
?>