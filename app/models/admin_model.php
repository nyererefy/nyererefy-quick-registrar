<?php

class Admin_model extends CI_Model
{
    function login($email, $password)
    {
        $query = $this->db
            ->where(array('email' => $email))
            ->get('admins');

        if ($query->num_rows() == 1) {
            if (password_verify($password, $query->row('password'))) {
                return $query->row();
            }
        }
        return null;
    }

    function change_password()
    {
        $data = array(
            'password' => password_hash(
                $this->input->post('new_password'),
                PASSWORD_BCRYPT,
                array('cost' => 12)
            )
        );

        $old_password = $this->input->post('password');
        $id = $this->session->userdata('id');

        $admin = $this->db
            ->select('password')
            ->from('admins')
            ->where('id', $id)
            ->get();

        if ($admin->num_rows() == 1) {
            $db_password = $admin->row('password');

            return (password_verify($old_password, $db_password)) ?
                $this->db
                    ->where('id', $id)
                    ->update('admins', $data) : false;
        }
        return false;
    }

    function change_email()
    {
        $data = array(
            'email' => $this->input->post('email')
        );

        $password = $this->input->post('password');
        $id = $this->session->userdata('id');

        $admin = $this->db
            ->select('password')
            ->from('admins')
            ->where('id', $id)
            ->get();

        if ($admin->num_rows() == 1) {
            $db_password = $admin->row('password');

            return (password_verify($password, $db_password)) ?
                $this->db
                    ->where('id', $id)
                    ->update('admins', $data) : false;
        }
        return false;
    }

}