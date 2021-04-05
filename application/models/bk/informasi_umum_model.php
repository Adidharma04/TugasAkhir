<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmum()
    {  
        $this->db->select('information_general.*');
        return $this->db->get('information_general')->result();
    }

    function prosesKonfirmasiStatus( $id_general ){


        $status =  $this->input->get('status');

        $data = [

            'status'    => $status
        ];

        $this->db->where('id_general', $id_general);
        $this->db->update('information_general', $data);
    }
}

/* End of file ModelName.php */
?>