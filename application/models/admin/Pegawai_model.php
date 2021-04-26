<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function tampilDataPegawai()
    {  
        $this->db->select('profil_pegawai.*');
        return $this->db->get('profil_pegawai')->result();
    }
    public function tambahDataPegawai(){
        $no_induk = $this->input->post('no_induk', true);
            $profile = [
                'username'  => $no_induk,
                'password'  => password_hash("bk".$no_induk, PASSWORD_DEFAULT),
                'level'     => "bk"
            ];
        
        $this->db->insert('profile', $profile);
        $last_id_profile = $this->db->insert_id();

        $informasi_pegawai =[
            'id_profile'            => $last_id_profile,
            'nama'                  => $this->input->post('nama', true),
            'email'                 => $this->input->post('email', true),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
            'tanggal_lahir'         => $this->input->post('tanggal_lahir', true),
            'tempat_lahir'          => $this->input->post('tempat_lahir', true),
            'no_telfon'             => $this->input->post('no_telfon', true),
            'no_induk'              => $no_induk,
            'alamat'                => $this->input->post('alamat', true),
        ];
        $this->db->insert('profil_pegawai', $informasi_pegawai);
    }
    public function getPegawai($id_pegawai){
        return $this->db->get_where('profil_pegawai',['id_pegawai'=>$id_pegawai])->row();
	}

    // porses hapus
    function prosesHapusPegawai( $id_profile ){

        $this->db->where('id_profile', $id_profile)->delete('profil_pegawai');
        $this->db->where('id_profile', $id_profile)->delete('profile');
    }
    
}

/* End of file Pegawai.php */
?>