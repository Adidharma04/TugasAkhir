<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class informasi_umum_model extends CI_Model {
    public function tampilDataInformasiUmum()
    {  
        $this->db->select('information_general.*');
        return $this->db->get('information_general')->result();
    }
    
    public function tambahDataInformasiUmum($upload){

    
        $id_profile = $this->session->userdata('sess_id_profile');

        $information_general =[
            'id_profile'                   => $id_profile,
            'nama_informasi'               => $this->input->post('nama_informasi', true),
            'deskripsi_informasi'          => $this->input->post('deskripsi_informasi', true),
            'status'                       => $this->input->post('status', true),
            'foto'                         => $upload['file']['file_name'],
        ];
        $this->db->insert('information_general', $information_general);
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Informasi/';    
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
    public function getInformasiUmum($id_general){
        return $this->db->get_where('information_general',['id_general'=>$id_general])->row();
	}
    public function editDataInformasiUmum( $id_general){
        
        // ambil detail informasi
        $ambilInformasiUmum = $this->getInformasiUmum( $id_general );
        
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

                redirect('Admin/informasi_umum/edit/'. $id_general);
                
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

        // update job_vacancy
        $this->db->where('id_general', $id_general);	
        $this->db->update('information_general', $dataInformasiUmum);

    }



    // porses hapus
    function prosesHapusInformasiUmum( $id_general ){

        $this->db->where('id_general', $id_general)->delete('information_general');

    }
}

/* End of file ModelName.php */
?>