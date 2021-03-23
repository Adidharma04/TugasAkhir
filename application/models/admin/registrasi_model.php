<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {
	
	public function registrasiAlumni(){
		$data=[
            'nama'		    =>$this->input->post('nama' , true),
            'email'			=>$this->input->post('email', true),
			'no_induk'		=>$this->input->post('no_induk', true),
			'username'		=>$this->input->post('username', true),
			'password'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'role_id' 		=> 3,
			'status'		=> 'pasif',
			'date_created'	=> time()
		];
		$this->db->insert('user', $data);
	}

}
/* End of file ModelName.php */
?>