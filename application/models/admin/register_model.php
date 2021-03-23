<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {
	
	public function registerAlumni(){
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



	// cek  data nis
	function cekDataNIS() {


		// init
		$pesan = false;
		$data = [];
		
		// ambil nilai
		$nis = $this->input->get('nis');
		

		// query
		$where = ['nis' => $nis];
		$query = $this->db->get_where('information_student', $where);
		
		// cek
		if ( $query->num_rows() == 1 ) {

			$pesan = true;
			$data = $query->result_array();
		} else {

			$pesan = false;
			$data  = [];
		}


		echo json_encode( [

			'status' => $pesan, // TRUE or FALSE
			'data'	 => $data // data or value
		] );
		
	}




	
	// registrasi 
	function registrasiSiswa() {


		$nis   = $this->input->post('no_induk');
		$email = $this->input->post('email');

		$data_informationstudent = [

			'email'				=> $email,
			'verifikasi_alumni'	=> "pengajuan"
		];

		$this->db->where('nis', $nis);
		$this->db->update('information_student', $data_informationstudent);


		return true;




		/** Proses Pengiriman Email (Add On) */
		// . . . . .
	}
}
/* End of file ModelName.php */
?>