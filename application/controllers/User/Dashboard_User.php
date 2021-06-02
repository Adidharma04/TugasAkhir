<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends CI_Controller {

    public function index ()
    {
        $this->load->view('user/dashboard');
    }
}
?>