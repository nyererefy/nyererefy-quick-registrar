<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        $view['programs'] = $this->program_model->get_programs();

        $view['view'] = 'programs';
        $this->load->view('base', $view);
    }


    /**
     * used for adding new program.
     */
    function add()
    {
        $this->form_validation->set_rules('title', 'title', 'required|max_length[100]');
        $this->form_validation->set_rules('abbreviation', 'abbreviation', 'required|max_length[10]');

        if ($this->form_validation->run() == TRUE) {
            if ($this->program_model->add_program()) {
                $this->session->set_flashdata('success', 'Faculty has been added');
            } else {
                $this->session->set_flashdata('fail', 'Error occurred');
            }
        } else {
            $this->session->set_flashdata('fail', validation_errors());
        }
        redirect('programs');
    }

}