<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    
    public function tampilDataInformasi()
    {
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('information_general', $where);

    }
    public function tambahDataInformasi($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        // data input
        $informasi_umum =[
            'id_profile'            => $id_profile,
            'nama_informasi'        => $this->input->post('nama_informasi', true),
            'deskripsi_informasi'   => $this->input->post('deskripsi_informasi', true),    
            'status'                => "pending",    
            'foto'                  => $upload['file']['file_name'],
        ];
        
        // query untuk melakukan pengecekan
        $where = ['id_profile' => $id_profile];
        $dataPenilaian = $this->db->get_where('information_general', $where);


        if ( $dataPenilaian->num_rows() == 1 ) {
            // do update data
            $this->db->where( $where );
            $this->db->insert('information_general', $informasi_umum);
        } else {
            $this->db->insert('information_general', $informasi_umum);
        }
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/informasi/';    
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