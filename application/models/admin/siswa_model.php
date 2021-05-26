<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {


    function tampilDataAlumni( $key = null ) {

        if ( $key == true ) {

            $per_page = $key['per_page'];
            $from     = $key['from'];


            $this->db->select('profile.*, profil_siswa.*')->from('profile');
            $this->db->join('profil_siswa', 'profil_siswa.id_profile = profile.id_profile');
            $this->db->where('profile.level', "alumni");
            $this->db->limit( $per_page, $from );

            $query = $this->db->get();
            // $sql = 'SELECT profile.*, profil_siswa.* FROM profile 
            //     INNER JOIN profil_siswa ON profil_siswa.id_profile = profile.id_profile 
                
            //     WHERE profile.level = "alumni" LIMIT '. $per_page .' OFFSET '. $from;

        } else {

            $sql = "SELECT profile.*, profil_siswa.* FROM profile 
                INNER JOIN profil_siswa ON profil_siswa.id_profile = profile.id_profile 
                
                WHERE profile.level = 'alumni'";

            $query = $this->db->query( $sql );
        }
        

        

        // print_r( $this->db->error() );
        return $query;
    }



    
	// query pencarian 
	function filter_datasiswa_tahunlulus( $tahun ) {

		$SQL = "SELECT * FROM profil_siswa WHERE tahun_lulus = '$tahun'";
		return $this->db->query( $SQL );
	}

	function filter_datasiswa_nama( $nama ) {

		$SQL = "SELECT * FROM profil_siswa WHERE nama LIKE '%$nama%'";
		$query = $this->db->query( $SQL );
        
        return $query;
	}


	function filter_datasiswa_nama_tahunlulus( $tahun, $nama ) {

		$SQL = "SELECT * FROM profil_siswa WHERE tahun_lulus = '$tahun' AND nama LIKE '%$nama%'";
		return $this->db->query( $SQL );
	}





    // porses tampil Data Siswa
    public function tampilDataSiswa()
    {  
        $this->db->select('profil_siswa.*');
        return $this->db->get('profil_siswa')->result();
    }

    // porses tambah Data Siswa
    public function tambahDataSiswa($upload){
        // insert (ISSUE)
        /** 
         *  1. Ketika insert memiliki nis + email yang sama maka validasi bekerja
         *  2. Ketika sudah dibenarkan (nis + email) yang berbeda
         *  3. ynag tersimpan hanya di tabel profile
         */

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
            'verifikasi_alumni'     => "null",
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
        ];
        $this->db->insert('profil_siswa', $informasi_siswa);
    }
    public function upload( $nis ){    
        $config['upload_path'] = './assets/Gambar/Upload/Siswa/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name']   = $nis;
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

    // porses Ambil Data Siswa
    public function getSiswa($id_siswa){
        return $this->db->get_where('profil_siswa',['id_siswa'=>$id_siswa])->row();
	}

    // porses edit Data Siswa
    public function editDataSiswa( $id_siswa ){
        
        // ambil detail informasi siswa
        $ambilInformasiSiswa = $this->getSiswa( $id_siswa );
        
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

                redirect('Admin/siswa/edit/'. $id_siswa);
                
            }  

        // gambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiSiswa->foto ) {

                $foto = $ambilInformasiSiswa->foto;
            }
        }

        // data profile
        $dataProfile = array    (

            'username'  => $nis, 
            'password'  => password_hash($nis, PASSWORD_DEFAULT),
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

        // // update profil_siswa
        $this->db->where('id_siswa', $id_siswa);	
        $this->db->update('profil_siswa', $dataInformationStudent);

        // update profile
        $this->db->where('id_profile', $ambilInformasiSiswa->id_profile);	
        $this->db->update('profile', $dataProfile);


    }

    // porses hapus Data Siswa
    function prosesHapusSiswa( $id_profile ){

        $this->db->where('id_profile', $id_profile)->delete('profil_siswa');
        $this->db->where('id_profile', $id_profile)->delete('profile');
    }
}

/* End of file ModelName.php */
?>