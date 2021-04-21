<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    public function getSiswa($id_siswa){
		// return $this->db->get_where('profil_siswa',['id_siswa'=>$id_siswa])->result();
        return $this->db->get_where('profil_siswa',['id_siswa'=>$id_siswa])->row();
	}
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

        // // update profil_siswa
        $this->db->where('id_siswa', $id_siswa);	
        $this->db->update('profil_siswa', $dataInformationStudent);

        // update profile
        $this->db->where('id_profile', $ambilInformasiSiswa->id_profile);	
        $this->db->update('profile', $dataProfile);


    }









    // ubah kata sandi
    function doUpdatePassword() {

        $id_profile = $this->session->userdata('sess_id_profile');

        /** 
         *  To Do List
         *  1. Pengecekan password lama 
         *      -> Mengambil tabel profile berdasarkan id_profile (session)
         * 
         *  2. Jika password lama valid ? 
         *      -> Iya lanjut pengubahan 
         *      -> Tidak ? tampilkan pesan password lama tidak sama (step 3)
         *  3. Kembali ke halaman ubah password ( + flashdata)
        */

        // inisialisasi variable old dan new 
        $oldPassword = $this->input->post('old_password');
        $newPassword = $this->input->post('new_password');

        // @TODO 1 : Pengecekan password 
        $this->db->where('id_profile', $id_profile);
        $ambilDataProfileById = $this->db->get('profile')->row_array();

        // @TODO 2 : Pengecekan password lama 
        if ( password_verify( $oldPassword, $ambilDataProfileById['password'] ) ) {

            // @TODO 2.1 : Lanjut pengubahan
            $data = array(

                'password'  => password_hash($newPassword, PASSWORD_DEFAULT)
            );
            $this->db->where('id_profile', $id_profile);
            $this->db->update('profile', $data);

            // element html
            $html = '<div class="alert alert-success">Pemberitahuan <br> Kata sandi berhasil diperbarui pada '.date('d F Y H.i A').'</div>';

            
        } else {

            // element html
            $html = '<div class="alert alert-warning">Pemberitahuan <br> Kata sandi lama yang anda masukkan salah, dimohon untuk memasukkan kembali</div>';                        
        }


        // @TODO 3: Set session flashdata
        $this->session->set_flashdata('msg', $html);    

        

        // redirect 
        redirect('alumni/siswa/password');
        
    }

}

/* End of file Siswa_model.php */
?>