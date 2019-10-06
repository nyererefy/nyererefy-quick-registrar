<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $view['students'] = $this->student_model->get_students();

        $view['view'] = 'home';
        $this->load->view('base', $view);
    }
}
