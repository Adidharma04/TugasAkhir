<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa/informasi_umum_model');
    }
    public function index()
    {
        $data['informasi_umum'] = $this->informasi_umum_model->tampilDataInformasiUmum(); 
        
        $this->load->view('User/informasi', $data);
    }
    
}
?>