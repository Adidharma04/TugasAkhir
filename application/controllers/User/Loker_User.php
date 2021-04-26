<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker_User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa/sharing_loker_model');
    }
    public function index()
    {
        $data['loker'] = $this->sharing_loker_model->tampilDataLoker(); 
        
        $this->load->view('User/loker', $data);
    }
}
?>