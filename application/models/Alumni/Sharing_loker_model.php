<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharing_loker_model extends CI_Model {
    
    public function tampilDataLoker()
    {
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('loker', $where);

    }public function tambahDataLoker($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        $loker =[
            'id_profile'                   => $id_profile,
            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => 'pending',
            'foto'                         => $upload['file']['file_name'],
        ];
        $this->db->insert('loker', $loker);
    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
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
    public function getLoker($id_loker){
		// return $this->db->get_where('profil_siswa',['id_siswa'=>$id_siswa])->result();
        return $this->db->get_where('loker',['id_loker'=>$id_loker])->row();
	}
    public function editDataLoker( $id_loker){
        
        // ambil detail informasi loker
        $ambilInformasiLoker = $this->getLoker( $id_loker );
        
        // upload foto
        $config['upload_path'] = './assets/Gambar/Upload/Loker/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);


        $foto = "";
        // apabila dia ingin mengubah gambar 
        if ( !empty( $_FILES['foto']['name'] ) ) {


            if ( $this->upload->do_upload('foto') ){

                if ( $ambilInformasiLoker->foto ) { // remove old photo

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

            if ( $ambilInformasiLoker->foto ) {

                $foto = $ambilInformasiLoker->foto;
            }
        }
        
        // data informasi loker
        $dataInformationLoker =[

            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => 'pending',
            'foto'                         => $foto,
		];

        // update loker
        $this->db->where('id_loker', $id_loker);	
        $this->db->update('loker', $dataInformationLoker);

    }   // porses hapus
    function prosesHapusLoker( $id_loker ){

        $this->db->where('id_loker', $id_loker)->delete('loker');

    }

    
    
}

/* End of file ModelName.php */
?>