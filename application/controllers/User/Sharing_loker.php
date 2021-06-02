<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class sharing_loker extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Sharing_loker_model');
    }
    public function index()
    {
        $data['loker'] = $this->Sharing_loker_model->tampilDataLokerUser(); 
        
        $this->load->view('user/Sharing_loker/index', $data);
    }
    public function detail($id_loker){
        //-- Title Halaman
            $data ['loker'] = $this->Sharing_loker_model->getLoker($id_loker);
            $data['latepost'] = $this->Sharing_loker_model->tampilDataLokerUser();
            $this->load->view('user/sharing_loker/detail',$data);
    }
}
?>