<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_Diskusi extends CI_Controller {

    public function index()
    {
        $this->load->view('siswa/forum_diskusi');
    }
}
?>