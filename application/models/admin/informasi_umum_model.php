<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmumUser()
    {  
        $this->db->select('informasi_umum.*');
        return $this->db->get('informasi_umum')->result();
    }

    public function tampilDataInformasiUmum()
    {  
        $sql = "SELECT 	
                profile.*, 
                profil_siswa.*,
                informasi_umum.id_umum, informasi_umum.nama_informasi, informasi_umum.created_at,informasi_umum.foto, informasi_umum.status
        
                FROM informasi_umum
                
                LEFT JOIN profil_siswa 
                ON profil_siswa.id_profile = informasi_umum.id_profile
                
                
                INNER JOIN profile 
                ON profile.id_profile = informasi_umum.id_profile";

        return $this->db->query( $sql );
    }

    public function tambahDataInformasiUmum($upload,$upload1){

    
        $id_profile = $this->session->userdata('sess_id_profile');

        $data =[
            'id_profile'                   => $id_profile,
            'nama_informasi'               => $this->input->post('nama_informasi', true),
            'deskripsi_informasi'          => $this->input->post('deskripsi_informasi', true),
            'status'                       => $this->input->post('status', true),
            'foto'                         => $upload['file']['file_name'],
            'berkas'                       => $upload1['file']['file_name'],
        ];  
        $this->db->insert('informasi_umum', $data);
    }   

    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Informasi/';  
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';  
        $config['max_size']     = '20000';

        $this->load->library('upload', $config);
        
            if($this->upload->do_upload('foto')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors()); return $return;   
            }  
    }
    
    public function upload1(){    
        $config['upload_path'] = './assets/Gambar/Upload/Informasi/';  
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';  
        $config['max_size']     = '50000';

        $this->load->library('upload', $config);
        
            if($this->upload->do_upload('berkas')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors()); return $return;   
            } 
    }


    public function getInformasiUmum($id_umum){
        return $this->db->get_where('informasi_umum',['id_umum'=>$id_umum])->row();
	}
    public function editDataInformasiUmum( $id_umum){
        
        // ambil detail informasi
        $ambilInformasiUmum = $this->getInformasiUmum( $id_umum );
        
        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Informasi/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);


        $foto = "";
        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] ) ) {


            if ( $this->upload->do_upload('foto') ){

                if ( $ambilInformasiUmum->foto ) { // remove old photo

                    $link = $config['upload_path']. $ambilInformasiUmum->foto;
                    unlink( $link );
                }

                // set value new photo
                $foto = $this->upload->data('file_name');
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/informasi_umum/edit/'. $id_umum);
                
            }  

        // gaambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiUmum->foto ) {

                $foto = $ambilInformasiUmum->foto;
            }
        }
        
        // data informasi loker
        $dataInformasiUmum =[

            'nama_informasi'               => $this->input->post('nama_informasi', true),
            'deskripsi_informasi'          => $this->input->post('deskripsi_informasi', true),
            'status'                       => $this->input->post('status', true),
            'foto'                         => $foto,
		];

        // update loker
        $this->db->where('id_umum', $id_umum);	
        $this->db->update('informasi_umum', $dataInformasiUmum);

    }



    // porses hapus
    function prosesHapusInformasiUmum( $id_umum ){

        $ambilInformasiUmum = $this->getInformasiUmum( $id_umum );

        $config['upload_path'] = './assets/Gambar/Upload/Informasi/';    
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';
        $this->load->library('upload', $config);

        if (!empty( $_FILES['berkas']['name'] )  ) {
            if ( $ambilInformasiUmum->berkas) { 
                $link = $config['upload_path']. $ambilInformasiUmum->berkas;
                unlink( $link );
            }
        }
        if (!empty( $_FILES['foto']['name'] )  ) {
            if ( $ambilInformasiUmum->foto) { 
                $link = $config['upload_path']. $ambilInformasiUmum->foto;
                unlink( $link );
            }
        }
        $this->db->where('id_umum', $id_umum)->delete('informasi_umum');
    }
}

/* End of file ModelName.php */
?>