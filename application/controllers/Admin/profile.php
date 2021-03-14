<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Profile | Admin';
         //----------------------------
        $this->load->view('Template/Admin/navbar',$data);
        $this->load->view('Template/Admin/sidebar',$data);
        $this->load->view('Admin/profile/index',$data);
        $this->load->view('Template/Admin/footer');
    }

}

/* End of file profile.php */
?>