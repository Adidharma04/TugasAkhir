<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Forum_diskusi_model extends CI_Model {
        

        // ambil data topik
        function getDataTopic() {

            return $this->db->get('forum_topik');
        }

        public function getForum($id_forum){
            return $this->db->get_where('forum',['id_forum'=>$id_forum])->row();
        }


        function getDataForum( $id_forum = null ) {

            $SQL = "SELECT forum_topik.*, forum.*, profile.username FROM forum
                    JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
                    JOIN profile ON profile.id_profile = forum.id_profile ";
            return $this->db->query( $SQL );
        }



        function getDataForumById( $id_forum ) {

            $SQL = "SELECT forum_topik.*, forum.*, profile.username FROM forum
                JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
                JOIN profile ON profile.id_profile = forum.id_profile WHERE id_forum = '$id_forum'";


            return $this->db->query( $SQL )->row();
        }

        function getDataForumDetail( $id_forum ) {

            $SQL = "SELECT forum_topik.*, forum.*, forum_detail.*, profile.username FROM forum_detail
                
                JOIN forum ON forum.id_forum = forum_detail.id_forum
                JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
                JOIN profile ON profile.id_profile = forum_detail.id_profile WHERE forum.id_forum = '$id_forum'";


            return $this->db->query( $SQL );
        }

        // proses tambah topik
        function onInsertDataTopic() {

            $data = array(

                'nama'  => $this->input->post('topik')
            );
            $this->db->insert('forum_topik', $data);


            $html = '<div class="alert alert-success">Pemberitahuan <br> Topik '.$data['nama'].' berhasil terbuat</div>';
            $this->session->set_flashdata('msg', $html);

            // redirect
            redirect('admin/Forum_diskusi');
        }

        // Khusus Forum-----------------------------------------------------------------------------------------
        
        // Upload topik
        public function upload(){    
            $config['upload_path'] = './assets/Gambar/Upload/Forum/';    
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

        // proses tambah Data Forum
        function tambahDataForum($upload) {

            $id_profile = $this->session->userdata('sess_id_profile');

            $forum = array(
                'id_profile'        => $id_profile,
                'id_topik'          => $this->input->post('id_topik'),
                'nama_forum'        => $this->input->post('nama_forum'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'tanggal_forum'     => $this->input->post('tanggal_forum'),
                'foto'              => $upload['file']['file_name'],
                
            );
            $this->db->insert('forum', $forum);
        }

        // proses Edit Data Forum
        function editDataForum() {
            $id_forum   = $this->input->post('id_forum');
            $id_profile = $this->session->userdata('sess_id_profile');
            
            $forum = array(
                'id_profile'        => $id_profile,
                'id_topik'          => $this->input->post('id_topik'),
                'nama_forum'        => $this->input->post('nama_forum'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'tanggal_forum'     => $this->input->post('tanggal_forum'),
                
            );
            $this->db->where('id_forum', $id_forum);
            $this->db->update('forum', $forum);
        }

         // porses hapus
        function prosesHapusForum( $id_forum ){

            $this->db->where('id_forum', $id_forum)->delete('forum');
            $this->db->where('id_forum', $id_forum)->delete('forum_detail');
        }
        
        // Khusus Forum-----------------------------------------------------------------------------------------

        
        // Khusus Detail Forum-----------------------------------------------------------------------------------------

        // proses tambah Data Detail Forum
        function tambahDataDetailForum() {
            $id_profile = $this->session->userdata('sess_id_profile');

            $forumDetail = array(
                'id_profile'        => $id_profile,
                'id_forum'          => $this->input->post('id_forum'),
                'notes'             => $this->input->post('notes'),
                
            );
            $this->db->insert('forum_detail', $forumDetail);
        }
    }
    
    /* End of file Forum_diskusi_model.php */
    