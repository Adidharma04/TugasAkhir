<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmum()
    {  
        $this->db->select('information_general.*');
        return $this->db->get('information_general')->result();
    }
}

/* End of file ModelName.php */
?>