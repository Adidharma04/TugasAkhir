<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class recordkerjauser extends CI_Controller {

    public function index()
    {
        $this->load->view('User/recordkerja');
    }
}
?>