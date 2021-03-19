<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_Kerja_User extends CI_Controller {

    public function index()
    {
        $this->load->view('User/record_kerja');
    }
}
?>