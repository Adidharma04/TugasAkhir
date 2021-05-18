<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    // proses Tampil Pegawai
    public function tampilDataPegawai()
    {  
        $this->db->select('profil_pegawai.*');
        return $this->db->get('profil_pegawai')->result();
    }

    // proses Get Data Pegawai
    public function getPegawai($id_pegawai){
        return $this->db->get_where('profil_pegawai',['id_pegawai'=>$id_pegawai])->row();
	}

    // proses Tambah Pegawai
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
            'alamat'                => $this->input->post('alamat', true),
            'no_induk'              => $no_induk,
        ];
        $this->db->insert('profil_pegawai', $informasi_pegawai);
    }

    // proses Edit Pegawai
    public function editDataPegawai( $id_pegawai ){
        
        // ambil detail informasi Pegawai
        $ambilInformasiPegawai = $this->getPegawai( $id_pegawai );
        
        $no_induk = $this->input->post('no_induk', true);

        // data profile
        $dataProfile = array    (

            'username'  => $no_induk,
            'password'  => password_hash("bk".$no_induk,PASSWORD_DEFAULT),
        );
        
        // data informasi pegawai
        $dataInformationEmployee =[
            'nama'                  =>  $this->input->post('nama', true),
            'email'                 =>  $this->input->post('email', true),
            'jenis_kelamin'         =>  $this->input->post('jenis_kelamin', true),
            'tanggal_lahir'         =>  $this->input->post('tanggal_lahir', true),
            'tempat_lahir'          =>  $this->input->post('tempat_lahir', true),
            'no_telfon'             =>  $this->input->post('no_telfon', true),
            'alamat'                =>  $this->input->post('alamat', true),
            'no_induk'              =>  $no_induk,
		];

        // update profil_pegawai
        $this->db->where('id_pegawai', $id_pegawai);	
        $this->db->update('profil_pegawai', $dataInformationEmployee);

        // update profile
        $this->db->where('id_profile', $ambilInformasiPegawai->id_profile);	
        $this->db->update('profile', $dataProfile);
    }

    // porses hapus data Pegawai
    function prosesHapusPegawai( $id_profile ){

        $this->db->where('id_profile', $id_profile)->delete('profil_pegawai');
        $this->db->where('id_profile', $id_profile)->delete('profile');
    }
    
}

/* End of file Pegawai.php */
?>