<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class lokeruser extends CI_Controller {

    public function index()
    {
        $this->load->view('User/loker');
    }
}
?>