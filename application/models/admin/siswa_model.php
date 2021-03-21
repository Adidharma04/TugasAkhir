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
            'id_profile'            => $last_id_profile,
            'nama'                  => $this->input->post('nama', true),
            'alamat'                => $this->input->post('alamat', true),
            'tanggal_lahir'         => $this->input->post('tanggal_lahir', true),
            'tempat_lahir'          => $this->input->post('tempat_lahir', true),
            'jurusan'               => $this->input->post('jurusan', true),
            'email'                 => $this->input->post('email', true),
            'no_telfon'             => $this->input->post('no_telfon', true),
            'foto'                  => $upload['file']['file_name'],
            'nis'                   => $nis,
            'tahun_lulus'           => $this->input->post('tahun_lulus', true),
            'verifikasi_alumni'     => $this->input->post('verifikasi_alumni', true),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
        ];
        $this->db->insert('information_student', $informasi_siswa);


        // insert (ISSUE)
        /** 
         *  1. Ketika insert memiliki nis + email yang sama maka validasi bekerja
         *  2. Ketika sudah dibenarkan (nis + email) yang berbeda
         *  3. ynag tersimpan hanya di tabel profile
         */
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Siswa/';    
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
    public function getSiswa($id_student){
		// return $this->db->get_where('information_student',['id_student'=>$id_student])->result();
        return $this->db->get_where('information_student',['id_student'=>$id_student])->row();
	}
    public function editDataSiswa( $id_student ){
        
        // ambil detail informasi siswa
        $ambilInformasiSiswa = $this->getSiswa( $id_student );
        
        $nis = $this->input->post('nis', true);

        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Siswa/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        $foto = "";
        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] ) ) {


            if ( $this->upload->do_upload('foto') ){

                if ( $ambilInformasiSiswa->foto ) { // remove old photo

                    $link = $config['upload_path']. $ambilInformasiSiswa->foto;
                    unlink( $link );
                }

                // set value new photo
                $foto = $this->upload->data('file_name');
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/siswa/edit/'. $id_student);
                
            }  

        // gambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiSiswa->foto ) {

                $foto = $ambilInformasiSiswa->foto;
            }
        }

        // data profile
        $dataProfile = array    (

            'username'  => $nis
        );
        
        // data informasi siswa
        $dataInformationStudent =[
            'nama'                  =>  $this->input->post('nama', true),
            'alamat'                =>  $this->input->post('alamat', true),
            'tanggal_lahir'         =>  $this->input->post('tanggal_lahir', true),
            'tempat_lahir'          =>  $this->input->post('tempat_lahir', true),
            'jurusan'               =>  $this->input->post('jurusan', true),
            'email'                 =>  $this->input->post('email', true),
            'no_telfon'             =>  $this->input->post('no_telfon', true),
            'verifikasi_alumni'     =>  $this->input->post('verifikasi_alumni', true),
            'foto'                  =>  $foto,
            'nis'                   =>  $nis,    
            'tahun_lulus'           =>  $this->input->post('tahun_lulus', true),
            'jenis_kelamin'         =>  $this->input->post('jenis_kelamin', true),
		];

        // // update information_student
        $this->db->where('id_student', $id_student);	
        $this->db->update('information_student', $dataInformationStudent);

        // update profile
        $this->db->where('id_profile', $ambilInformasiSiswa->id_profile);	
        $this->db->update('profile', $dataProfile);


    }



    // porses hapus
    function prosesHapusSiswa( $id_profile ){

        $this->db->where('id_profile', $id_profile)->delete('information_student');
        $this->db->where('id_profile', $id_profile)->delete('profile');


    }
}

/* End of file ModelName.php */
?>