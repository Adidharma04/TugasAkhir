<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function tampilDataEvent(){
        $this->db->select('event.*');
        return $this->db->get('event')->result();
    }
    public function tambahDataEvent($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        $event =[
            'id_profile'            => $id_profile,
            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $this->input->post('tanggal_event', true),
            'foto'                  => $upload['file']['file_name'],
            'lokasi'                => $this->input->post('lokasi', true),
            'jenis_event'           => $this->input->post('jenis_event', true),
            'status'                => "pending",
            
        ];
        $this->db->insert('event', $event);
    }

}

/* End of file Event_model.php */
?> 