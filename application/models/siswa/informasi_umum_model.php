<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmum()
    {  
        $this->db->select('informasi_umum.*');
        return $this->db->get('informasi_umum')->result();
    }

}

/* End of file ModelName.php */
?>