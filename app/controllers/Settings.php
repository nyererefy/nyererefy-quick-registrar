<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $view['view'] = 'settings';
        $this->load->view('base', $view);
    }

    public function change_email()
    {
        $this
            ->form_validation
            ->set_rules('email', 'email', 'trim|max_length[100]|min_length[3]|required');

        if ($this->form_validation->run() == FALSE) {
            $view['view'] = 'settings';
            $this->load->view('base', $view);
        } else {
            if ($this->admin_model->change_email()) {
                $this->session->set_userdata('email', $this->input->post('email'));
                $this->session->set_flashdata('success', 'Email has been updated');
                redirect('settings');
            } else {
                $this->session->set_flashdata('fail', 'Wrong password');
                redirect('settings');
            }
        }
    }

    function change_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[10]|required');

        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|min_length[6]|max_length[10]|required|matches[confirm_password]');

        if ($this->form_validation->run() == FALSE) {
            $view['view'] = 'settings';
            $this->load->view('base', $view);
        } else {
            if ($this->admin_model->change_password()) {
                $this->session->set_flashdata('success', 'Password has been updated');
                redirect('settings');
            } else {
                $this->session->set_flashdata('fail', 'Wrong password');
                redirect('settings');
            }
        }
    }

}
