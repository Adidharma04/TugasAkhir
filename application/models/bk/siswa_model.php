<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa_model extends CI_Model {
    public function tampilDataSiswa()
    {  

        $where = [

            'verifikasi_alumni !=' => "null" 
        ];

        $this->db->select('information_student.*');
        $this->db->where( $where );
        return $this->db->get('information_student')->result();

    }

    public function getSiswa($id_student){
		// return $this->db->get_where('information_student',['id_student'=>$id_student])->result();
        return $this->db->get_where('information_student',['id_student'=>$id_student])->row();
	}
    function prosesKonfirmasiStatus( $id_student ){


        $verifikasi_alumni =  $this->input->get('verifikasi_alumni');
        $getDataInformationStudent = $this->getSiswa( $id_student );


        $data = [

            'verifikasi_alumni'    => $verifikasi_alumni
        ];

        // apabila status pengajuan diterima
        if ( $verifikasi_alumni == "diterima" ) {


            $dataProfile = ['level' => "alumni"];
            

        } else if ( $verifikasi_alumni == "pengajuan" ) {

            $dataProfile = ['level' => "siswa"];
        }

        // profile
        $this->db->where('id_profile', $getDataInformationStudent->id_profile);
        $this->db->update('profile', $dataProfile);


        // student
        $this->db->where('id_student', $id_student);
        $this->db->update('information_student', $data);
    }
}

/* End of file ModelName.php */
?>