<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {
    
    public function tampilDataPenilaian()
    {
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('penilaian', $where);

    }

    public function getPenilaian($id_penilaian){
        return $this->db->get_where('penilaian',['id_penilaian'=>$id_penilaian])->row();
	}

    public function tambahDataPenilaian(){

        $id_profile = $this->session->userdata('sess_id_profile');

        // data input
        $penilaian =[
            'id_profile'    => $id_profile,
            'kritik'        => $this->input->post('kritik', true),
            'saran'         => $this->input->post('saran', true),    
        ];
        
        // query untuk melakukan pengecekan
        $where = ['id_profile' => $id_profile];
        $dataPenilaian = $this->db->get_where('penilaian', $where);

        if ( $dataPenilaian->num_rows() == 1 ) {
            // do update data
            $this->db->where( $where );
            $this->db->update('penilaian', $penilaian);
        } else {
            $this->db->insert('penilaian', $penilaian);
        }
    }

    public function editDataPenilaian($id_penilaian){

        $id_profile = $this->session->userdata('sess_id_profile');

        // data input
        $penilaian =[
            'id_profile'    => $id_profile,
            'kritik'        => $this->input->post('kritik', true),
            'saran'         => $this->input->post('saran', true),    
        ];
        // update profil_pegawai
        $this->db->where('id_penilaian', $id_penilaian);	
        $this->db->update('penilaian', $penilaian);
    }

    
}

/* End of file ModelName.php */
?>