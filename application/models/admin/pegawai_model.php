<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model {
    public function tampilPegawai()
    {  
        $this->db->select('admin.*,user_role.role');
        $this->db->join('user_role', 'admin.id_role = user_role.id_role');
        return $this->db->get('admin')->result();
    }
}

/* End of file ModelName.php */
?>