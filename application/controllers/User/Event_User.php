<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/event_model');
    }
    public function index()
    {
        $data['event'] = $this->event_model->tampilDataEvent(); 
        
        $this->load->view('User/event', $data);
    }
}
?>