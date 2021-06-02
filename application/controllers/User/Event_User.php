<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa/Event_model');
    }
    public function index()
    {
        $data['event'] = $this->Event_model->tampilDataEvent(); 
        
        $this->load->view('user/event', $data);
    }
}
?>