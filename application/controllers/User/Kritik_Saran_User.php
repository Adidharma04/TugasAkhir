<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_Saran_User extends CI_Controller {

    public function index()
    {
        $this->load->view('User/kritik_saran');
    }
}
?>