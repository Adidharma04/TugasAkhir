<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa_model extends CI_Model {
    public function tampilDataSiswa()
    {  
        $this->db->select('information_student.*');
        return $this->db->get('information_student')->result();
    }
    public function tambahDataSiswa($upload){

        $nis = $this->input->post('nis', true);
        $profile = [
            'username'  => $nis,
            'password'  => password_hash($nis, PASSWORD_DEFAULT),
            'level'     => "siswa"
        ];

        $this->db->insert('profile', $profile);
        $last_id_profile = $this->db->insert_id();

        $informasi_siswa =[
            'id_profile'    => $last_id_profile,
            'nama'          => $this->input->post('nama', true),
            'alamat'        => $this->input->post('alamat', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'tempat_lahir'  => $this->input->post('tempat_lahir', true),
            'jurusan'       => $this->input->post('jurusan', true),
            'email'         => $this->input->post('email', true),
            'no_telfon'     => $this->input->post('no_telfon', true),
            'foto'          => $upload['file']['file_name'],
            'nis'           => $nis,
            'tahun_lulus'   => $this->input->post('tahun_lulus', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
        ];
        $this->db->insert('information_student', $informasi_siswa);
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Siswa/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;
        }else{    
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());return $return;   
        }  
    }
    public function getSiswa($id_student){
		return $this->db->get_where('information_student',['id_student'=>$id_student])->result();
	}
    public function editDataSiswa(){
        $last_id_profile = $this->db->insert_id();
        $data=[
			'id_profile'    =>  $last_id_profile,
            'nama'          =>  $this->input->post('nama', true),
            'alamat'        =>  $this->input->post('alamat', true),
            'tanggal_lahir' =>  $this->input->post('tanggal_lahir', true),
            'tempat_lahir'  =>  $this->input->post('tempat_lahir', true),
            'jurusan'       =>  $this->input->post('jurusan', true),
            'email'         =>  $this->input->post('email', true),
            'no_telfon'     =>  $this->input->post('no_telfon', true),
            'foto'          =>  $this->input->post('foto', true),
            'nis'           =>  $this->input->post('nis', true),
            'tahun_lulus'   =>  $this->input->post('tahun_lulus', true),
            'jenis_kelamin' =>  $this->input->post('jenis_kelamin', true),
		];
        $this->db->where('id_profile', $this->input->post('id_profile'));	
        $this->db->update('information_siswa', $data);
    }
}

/* End of file ModelName.php */
?>