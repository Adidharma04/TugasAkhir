<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class penilaian_model extends CI_Model {
    
    public function tampilDataPenilaian()
    {
        // $this->db->select('penilaian.*'); // select all
        // return $this->db->get('penilaian')->result();


        $id_profile = $this->session->userdata('sess_id_profile');
        
        // opsi 1
        // $SQL = "SELECT * FROM penilaian WHERE id_profile = '$id_profile'";
        // $this->db->query( $SQL );


        // opsi 2 : query builder
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('penilaian', $where);


        // opsi 2.1
        // $this->db->where( $where );
        // $this->db->get('penilaian');
        
        // // opsi 2.2 (chain)
        // $this->db->select('kritik, saran')->from('penilaian');
        // $this->db->where( $where );
        // $this->db->get();


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

            // $this->db->where( $where )->update('penilaian', $penilaian);
        } else {

            // do insert data
            $this->db->insert('penilaian', $penilaian);
        }
    }
    
}

/* End of file ModelName.php */
?>