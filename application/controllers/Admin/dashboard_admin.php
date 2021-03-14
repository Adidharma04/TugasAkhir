<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_admin extends CI_Controller {

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Dashboard | Admin';
         //----------------------------
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/dashboard_admin/index',$data);
        $this->load->view('Template/Admin/footer');
    }
}

/* End of file Controllername.php */

?>