<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_User extends CI_Controller {

    public function index()
    {
        $this->load->view('User/informasi');
    }
}
?>