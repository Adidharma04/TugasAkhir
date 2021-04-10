<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharing_loker_model extends CI_Model {
    
    public function tampilDataLoker()
    {
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('job_vacancy', $where);

    }public function tambahDataLoker($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        $job_vacancy =[
            'id_profile'                   => $id_profile,
            'nama_pekerjaan'               => $this->input->post('nama_pekerjaan', true),
            'deskripsi_pekerjaan'          => $this->input->post('deskripsi_pekerjaan', true),
            'alamat'                       => $this->input->post('alamat', true),
            'status'                       => 'pending',
            'foto'                         => $upload['file']['file_name'],
        ];
        $this->db->insert('job_vacancy', $job_vacancy);
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
    public function getLoker($id_vacancy){
		// return $this->db->get_where('information_student',['id_student'=>$id_student])->result();
        return $this->db->get_where('job_vacancy',['id_vacancy'=>$id_vacancy])->row();
	}
    public function editDataLoker( $id_vacancy){
        
        // ambil detail informasi loker
        $ambilInformasiLoker = $this->getLoker( $id_vacancy );
        
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

                redirect('Admin/loker/edit/'. $id_vacancy);
                
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

        // update job_vacancy
        $this->db->where('id_vacancy', $id_vacancy);	
        $this->db->update('job_vacancy', $dataInformationLoker);

    }   // porses hapus
    function prosesHapusLoker( $id_vacancy ){

        $this->db->where('id_vacancy', $id_vacancy)->delete('job_vacancy');

    }

    
    
}

/* End of file ModelName.php */
?>