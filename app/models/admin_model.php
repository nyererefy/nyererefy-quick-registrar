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
}