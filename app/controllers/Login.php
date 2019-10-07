<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    /**
     * Default email: admin@nyererefy.com
     * Default password: password
     */
    function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|max_length[100]|min_length[6]|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|max_length[100]|min_length[6]|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $data = $this->admin_model->login($email, $password);

            if ($data) {
                $session_data = array(
                    'id' => $data->id,
                    'email' => $data->email,
                    'is_login' => true
                );

                $this->session->set_userdata($session_data);

                redirect(base_url());
            } else {
                $this->session->set_flashdata('login_failed', 'Wrong password / Email');
                redirect('login');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    function test()
    {
        $this->load->library('unit_test');

        $data = $this->admin_model->login('admin@nyererefy.com', 'password');

        echo $this->unit->run($data, 'is_object', 'It should return student data');
        echo $this->unit->run($data->email, 'is_string', 'It should return string');
    }
}
