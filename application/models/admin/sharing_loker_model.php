<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker_model extends CI_Model {
    public function tampilDataLokerUser()
    {  
        $this->db->select('loker.*');
        $this->db->order_by('created_at', 'DESC');
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
    
    public function tambahDataLoker($upload_foto,$upload_berkas){

        $id_profile = $this->session->userdata('sess_id_profile');

        $loker =[
            'id_profile'                   => $id_profile,
            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => "accept",
            'foto'                         => $upload_foto['file'],
            'berkas'                       => $upload_berkas['file'],
        ];
        $this->db->insert('loker', $loker);
    }

    public function upload( $type, $size, $name ){    
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';  
        $config['allowed_types'] = $type;
        $config['max_size']     = $size; // 3 mb

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
            if($this->upload->do_upload( $name )){
                $return = array(
                    'result' => 'success', 
                    'file' => $this->upload->data('file_name'), 
                    'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
                return $return;   
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

        // gambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiLoker->foto   ) {
                $foto = $ambilInformasiLoker->foto;
            }
        }

        // apabila dia ingin mengubah dokumen 
        if ( !empty(  $_FILES['berkas']['name']) ) {

            $conf_berkas_allowed = 'pdf|docx|doc';
            $conf_berkas_size    = 10000;
            $upload_berkas = $this->upload( $conf_berkas_allowed, $conf_berkas_size, 'berkas' );

            if ( $upload_berkas['result'] == "success" ) {

                $berkas = $upload_berkas['file'];

                // hapus file lama 
                if ( $ambilInformasiLoker->berkas ) { // remove old document

                    $link = './assets/Gambar/Upload/Informasi/'. $ambilInformasiLoker->berkas;
                    unlink( $link );
                }
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('Admin/loker/edit/'. $id_loker);
                
            }
        // Dokumen tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiLoker->berkas ) {

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
            'berkas'                       => $berkas,
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