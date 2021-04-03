<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class event_model extends CI_Model {
    public function tampilDataEvent()
    {  
        $this->db->select('event.*');
        return $this->db->get('event')->result();
    }
    public function tambahDataEvent($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        $event =[
            'id_profile'            => $id_profile,
            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $this->input->post('tanggal_event', true),
            'foto'                  => $upload['file']['file_name'],
            'lokasi'                => $this->input->post('lokasi', true),
            'jenis_event'           => $this->input->post('jenis_event', true),
            'status'                => $this->input->post('status', true),
        ];
        $this->db->insert('event', $event);
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
        
        // ambil detail informasi siswa
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

                redirect('Admin/event/edit/'. $id_event);
                
            }  

        // gaambar tetap alias tidak diubah sama sekali
        } else {

            if ( $ambilInformasiEvent->foto ) {

                $foto = $ambilInformasiEvent->foto;
            }
        }
        
        // data informasi siswa
        $dataInformationEvent =[

            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $this->input->post('tanggal_event', true),
            'foto'                  => $foto,
            'lokasi'                => $this->input->post('lokasi', true),
            'jenis_event'           => $this->input->post('jenis_event', true),
            'status'                => $this->input->post('status', true),
		];

        // // update information_event
        $this->db->where('id_event', $id_event);	
        $this->db->update('event', $dataInformationEvent);

    }

    // porses hapus
    function prosesHapusEvent( $id_event ){

        $this->db->where('id_event', $id_event)->delete('event');

    }
}

/* End of file ModelName.php */
?>