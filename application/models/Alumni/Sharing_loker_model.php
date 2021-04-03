<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    
    public function tampilDataLoker()
    {
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('job_vacancy', $where);

    }
    
    public function tambahDataLoker($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        // data input
        $loker =[
            'id_profile'                   => $id_profile,
            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => "pending",
            'foto'                         => $upload['file']['file_name'],
        ];
        
        // query untuk melakukan pengecekan
        $where = ['id_profile' => $id_profile];
        $loker = $this->db->get_where('job_vacancy', $where);


        if ( $loker->num_rows() == 1 ) {
            // do update data
            $this->db->where( $where );
            $this->db->insert('job_vacancy', $loker);
        } else {
            $this->db->insert('job_vacancy', $loker);
        }
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ( empty( $_FILES['foto']['name'] ) ) {

            return array('result' => 'success', 'file' => ['file_name' => ""]);
        } else {

            if($this->upload->do_upload('foto')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());return $return;   
            }  
        }
    }
    
}

/* End of file ModelName.php */
?>