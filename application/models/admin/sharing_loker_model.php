<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    public function tampilDataLokerUser()
    {  
        $this->db->select('loker.*');
        return $this->db->get('loker')->result();
    }
    public function tampilDataLoker()
    {  
        $sql = "SELECT 
                profile.*, 
                profil_siswa.*,
                loker.id_loker, loker.nama_pekerjaan, loker.alamat, loker.status, loker.foto
                
            FROM loker
            
            LEFT JOIN profil_siswa 
            ON profil_siswa.id_profile = loker.id_profile

            INNER JOIN profile 
            ON profile.id_profile = loker.id_profile";

        return $this->db->query( $sql );
    }
    
    public function tambahDataLoker($upload,$upload1){

        $id_profile = $this->session->userdata('sess_id_profile');

        $loker =[
            'id_profile'                   => $id_profile,
            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => $this->input->post('status', true),
            'foto'                         => $upload['file']['file_name'],
            'berkas'                       => $upload1['file']['file_name'],
        ];
        $this->db->insert('loker', $loker);
    }

    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';  
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
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';  
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

    public function getLoker($id_loker){
		// return $this->db->get_where('profil_siswa',['id_siswa'=>$id_siswa])->result();
        return $this->db->get_where('loker',['id_loker'=>$id_loker])->row();
	}

    public function editDataLoker( $id_loker){
        
        // ambil detail informasi loker
        $ambilInformasiLoker = $this->getLoker( $id_loker );
        
        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';
        $this->load->library('upload', $config);


        $foto = "";
        $berkas = "";

        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] )  ) {


            if ( $this->upload->do_upload('foto')  ){

                if ( $ambilInformasiLoker->foto  ) { // remove old photo

                    $link = $config['upload_path']. $ambilInformasiLoker->foto;
                    unlink( $link );
                    
                }

                // set value new photo
                $foto = $this->upload->data('file_name');
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/loker/edit/'. $id_loker);
                
            }  

        // gaambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiLoker->foto   ) {

                $foto = $ambilInformasiLoker->foto;
                $berkas = $ambilInformasiLoker->berkas;
            }
        }

        // apabila dia ingin mengubah document 
        if (!empty( $_FILES['berkas']['name'] )  ) {


            if ( $this->upload->do_upload('berkas') ){

                if (  $ambilInformasiLoker->berkas  ) { // remove old photo
                    
                    $link = $config['upload_path']. $ambilInformasiLoker->berkas;
                    unlink( $link );
                }

                // set value new photo
                $berkas = $this->upload->data('file_name');
               
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/loker/edit/'. $id_loker);
                
            }  

        // gaambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiLoker->berkas  ) {

                $berkas = $ambilInformasiLoker->berkas;
            }
        }
        
        // data informasi loker
        $dataInformationLoker =[

            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => $this->input->post('status', true),
            'foto'                         => $foto,
            'berkas'                         => $berkas,
		];

        // update loker
        $this->db->where('id_loker', $id_loker);	
        $this->db->update('loker', $dataInformationLoker);

    }



    // porses hapus
    function prosesHapusLoker( $id_loker ){
        $ambilInformasiLoker = $this->getLoker( $id_loker );

        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';
        $this->load->library('upload', $config);

        if (!empty( $_FILES['berkas']['name'] )  ) {
            if ( $ambilInformasiLoker->berkas) { 
                $link = $config['upload_path']. $ambilInformasiLoker->berkas;
                unlink( $link );
            }
        }
        if (!empty( $_FILES['foto']['name'] )  ) {
            if ( $ambilInformasiLoker->foto) { 
                $link = $config['upload_path']. $ambilInformasiLoker->foto;
                unlink( $link );
            }
        }
        $this->db->where('id_loker', $id_loker)->delete('loker');

    }
}

/* End of file ModelName.php */
?>