<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $view['students'] = $this->student_model->get_students();
        $view['programs'] = $this->program_model->get_programs();

        $view['view'] = 'Students';
        $this->load->view('base', $view);
    }

    /**
     * used for adding new program.
     */
    function register_class()
    {
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('programId', 'Program', 'required');

        if ($this->form_validation->run() == TRUE) {
            if ($this->student_model->register_class()) {
                $this->session->set_flashdata('success', 'Students have been registered');
            } else {
                $this->session->set_flashdata('fail', 'Error occurred');
            }
        } else {
            $this->session->set_flashdata('fail', validation_errors());
        }
        redirect('students');
    }
}
