<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa_model extends CI_Model {
    public function tampilDataSiswa()
    {  
        $this->db->select('information_student.*');
        return $this->db->get('information_student')->result();
    }
    public function tambahDataSiswa(){
        $data=[
            'id_profile'=>$this->input->post('id_profile', true),
            'nama'=>$this->input->post('nama', true),
            'alamat'=>$this->input->post('alamat', true),
            'tanggal_lahir'=>$this->input->post('tanggal_lahir', true),
            'tempat_lahir'=>$this->input->post('tempat_lahir', true),
            'jurusan'=>$this->input->post('jurusan', true),
            'email'=>$this->input->post('email', true),
            'no_telfon'=>$this->input->post('no_telfon', true),
            'foto'=>$this->input->post('foto', true),
            'nis'=>$this->input->post('nis', true),
            'tahun_lulus'=>$this->input->post('tahun_lulus', true),
            'jenis_kelamin'=>$this->input->post('jenis_kelamin', true),
        ];
        $this->db->insert('information_student', $data);
    }
}

/* End of file ModelName.php */
?>