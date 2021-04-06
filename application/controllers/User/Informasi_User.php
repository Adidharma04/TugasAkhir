<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/informasi_umum_model');
    }
    public function index()
    {
        $data['information_general'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        
        $this->load->view('User/informasi', $data);
    }
    
}
?>