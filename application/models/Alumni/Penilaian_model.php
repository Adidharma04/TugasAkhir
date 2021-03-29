<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class penilaian_model extends CI_Model {
    
    public function tampilDataPenilaian()
    {
        $this->db->select('penilaian.*');
        return $this->db->get('penilaian')->result();
    }
    public function tambahDataPenilaian(){

        $id_profile = $this->session->userdata('sess_id_profile');

        $penilaian =[
            'id_profile'    => $id_profile,
            'kritik'        => $this->input->post('kritik', true),
            'saran'         => $this->input->post('saran', true),
            
        ];
        $this->db->update('penilaian', $penilaian);
    }
    
}

/* End of file ModelName.php */
?>