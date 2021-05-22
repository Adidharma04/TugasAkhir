<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_Diskusi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        
        if ( empty( $this->session->userdata('sess_id_profile') ) ) {
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("Admin/login");
        }if($this->session->userdata('sess_level') != "siswa"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Siswa!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('Admin/login', 'refresh');
        }

        $this->load->model('Siswa/forum_diskusi_model');
    }
    public function index()
    {
        $data['topik'] = $this->forum_diskusi_model->getDataTopic();
        $data['forum'] = $this->forum_diskusi_model->getDataForum();
        $this->load->view('siswa/Forum_diskusi/index', $data);
    }
    public function discuss($id_forum){

        $data['detail'] = $this->forum_diskusi_model->getDataForumById( $id_forum );
        $data['diskusi'] = $this->forum_diskusi_model->getDataForumDetail( $id_forum );
        $this->load->view('siswa/Forum_diskusi/detail_forum', $data);
    }
}
?>