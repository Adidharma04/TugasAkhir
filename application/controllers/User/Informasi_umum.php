<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_umum extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Informasi_umum_model');
    }
    
    public function index()
    {
        $data['informasi_umum'] = $this->Informasi_umum_model->tampilDataInformasiUmumUser();
        
        $this->load->view('user/informasi_umum/index', $data);
    }

    public function detail($id_umum){
        //-- Title Halaman
            $data ['informasi_umum'] = $this->Informasi_umum_model->getInformasiUmum($id_umum);
            $data['latepost'] = $this->Informasi_umum_model->tampilDataInformasiUmumUser();
            $this->load->view('user/informasi_umum/detail',$data);
    }
    
}
?>