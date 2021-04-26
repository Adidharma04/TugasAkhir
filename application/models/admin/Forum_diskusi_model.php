<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Forum_diskusi_model extends CI_Model {
        

        // ambil data topik
        function getDataTopic() {

            return $this->db->get('forum_topik');
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

        
        // proses tambah 
        function onInsertDataTopic() {

            $data = array(

                'nama'  => $this->input->post('topik')
            );
            $this->db->insert('forum_topik', $data);


            $html = '<div class="alert alert-success">Pemberitahuan <br> Topik '.$data['nama'].' berhasil terbuat</div>';
            $this->session->set_flashdata('msg', $html);

            // redirect
            redirect('admin/forum_diskusi');
        }
    }
    
    /* End of file Forum_diskusi_model.php */
    