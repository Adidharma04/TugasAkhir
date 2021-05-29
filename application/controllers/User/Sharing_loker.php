<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/sharing_loker_model');
    }
    public function index()
    {
        $data['loker'] = $this->sharing_loker_model->tampilDataLokerUser(); 
        
        $this->load->view('User/Sharing_loker/index', $data);
    }
    public function detail($id_loker){
        //-- Title Halaman
            $data ['loker'] = $this->sharing_loker_model->getLoker($id_loker);
            $this->load->view('User/sharing_loker/detail',$data);
    }
}
?>