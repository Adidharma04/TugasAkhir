<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_Kuliah_User extends CI_Controller {

    public function index()
    {
        $this->load->view('User/record_kuliah');
    }
}
?>