<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboarduser extends CI_Controller {

    public function index ()
    {
        $this->load->view('User/index');
    }
}
?>