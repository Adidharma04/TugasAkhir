<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmum()
    {  
        $this->db->select('informasi_umum.*');
        return $this->db->get('informasi_umum')->result();
    }

    function prosesKonfirmasiStatus( $id_umum ){


        $status =  $this->input->get('status');

        $data = [

            'status'    => $status
        ];

        $this->db->where('id_umum', $id_umum);
        $this->db->update('informasi_umum', $data);
    }
}

/* End of file ModelName.php */
?>