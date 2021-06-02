<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
    public function tampilDataEvent()
    {  
        $sql = "SELECT 
                    profile.*, 
                    profil_siswa.*,
                    event.id_event, event.nama_event, event.tanggal_event, event.lokasi, event.foto, event.status
                    
                FROM event
                
                LEFT JOIN profil_siswa 
                ON profil_siswa.id_profile = event.id_profile

                INNER JOIN profile 
                ON profile.id_profile = event.id_profile";

        return $this->db->query( $sql );
    }

    public function tambahDataEvent($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        $tanggal_evt = $this->input->post('tanggal_event', true);
        $event =[
            'id_profile'            => $id_profile,
            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $tanggal_evt,
            'foto'                  => $upload['file']['file_name'],
            'lokasi'                => $this->input->post('lokasi', true),
            'status'                => "accept",
        ];

        $tanggal_sekarang = date('Y-m-d');

        if ( strtotime( $tanggal_evt ) < strtotime($tanggal_sekarang ) ){

            // maaf masukkan tanggal yang valid
            $html = '<div class="alert alert-danger">
                        <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                        <br>
                        <b>Pemberitahuan</b> <br>
                        Tanggal event harus hari ini ' . date('d F Y H.i A') . ' atau lebih dari hari ini
                     </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('admin/event/tambah', 'refresh');
        } else {

            $this->db->insert('event', $event);

            $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <br>
                                <b>Pemberitahuan</b> <br>
                                Data event berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
            redirect('admin/event', 'refresh');
        }

        
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Event/';    
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
    public function getEvent($id_event){
        return $this->db->get_where('event',['id_event'=>$id_event])->row();
	}
    
    public function editDataEvent( $id_event ){
        
        // ambil detail informasi event
        $ambilInformasiEvent = $this->getEvent( $id_event );
        
        

        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Event/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);


        $foto = "";
        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] ) ) {


            if ( $this->upload->do_upload('foto') ){

                if ( $ambilInformasiEvent->foto ) { 
                    // remove old photo
                    $link = $config['upload_path']. $ambilInformasiEvent->foto;
                    unlink( $link );
                }

                // set value new photo
                $foto = $this->upload->data('file_name');
                
            }else{    
                
                // upload error
                $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                $this->session->set_flashdata('msg', $html);

                redirect('admin/event/edit/'. $id_event);
                
            }  

        // gaambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiEvent->foto ) {

                $foto = $ambilInformasiEvent->foto;
            }
        }
        
        // data informasi event
        $dataInformationEvent =[

            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $this->input->post('tanggal_event', true),
            'foto'                  => $foto,
            'lokasi'                => $this->input->post('lokasi', true),
            'status'                => "accept",
		];

        // // update information_event
        $this->db->where('id_event', $id_event);	
        $this->db->update('event', $dataInformationEvent);

    }

    // porses hapus
    function prosesHapusEvent( $id_event ){
        $ambilInformasiEvent = $this->getEvent( $id_event );

        $config['upload_path'] = './assets/Gambar/Upload/Event/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ( $ambilInformasiEvent->foto ) { 
            // remove old photo
            $link = $config['upload_path']. $ambilInformasiEvent->foto;
            unlink( $link );
        }
        $this->db->where('id_event', $id_event)->delete('event');

    }
}

/* End of file ModelName.php */
?>