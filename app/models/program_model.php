<?php

class Program_model extends CI_Model
{
    function get_programs()
    {
        return $this->db->select('*')
            ->from('programs')
            ->get()
            ->result();
    }

    function add_program()
    {
        $data = array(
            'title' => ucwords($this->input->post('title')),
            'abbreviation' => strtoupper($this->input->post('abbreviation'))
        );

        return $this->db->insert('programs', $data);
    }
}