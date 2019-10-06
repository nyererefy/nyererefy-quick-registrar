<?php

class Student_Model extends CI_Model
{
    function get_students()
    {
        return $this->db->select('*')
            ->from('students')
            ->join('programs', 'programs.id = students.programId')
            ->get()
            ->result();
    }

    function register()
    {
        $csvFile = fopen($_FILES['nux_csv']['tmp_name'], 'r');

        fgetcsv($csvFile);

        while (($line = fgetcsv($csvFile)) !== FALSE):
            $nux = $this->db->select('student_id')
                ->from('vs_students')
                ->where('reg_no', strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $line[1])))
                ->get();
            if ($nux->num_rows() > 0) {
                $data = array(
                    'name' => ucwords(strtolower(preg_replace('/[^A-Za-z]/', ' ', $line[0]))),
                    'index_no' => password_hash(strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $line[2])), PASSWORD_BCRYPT, array('cost' => 4)),
                    'password' => password_hash(preg_replace('/[^A-Za-z0-9]/', '', $line[3]), PASSWORD_BCRYPT, array('cost' => 5)),
                    'sex' => strtolower(preg_replace('/[^A-Za-z]/', '', $line[4])),
                    'residence_id' => preg_replace('/[^0-9]/', '', $line[5]),
                    'school_id' => $this->input->post('school_id'),
                    'faculty_id' => $this->input->post('faculty_id'),
                    'year' => $this->input->post('year')
                );

                $reg_no =
                    $this->db->where('reg_no', strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $line[1])))->update('vs_students', $data);
            } else {

                $data = array(
                    'name' => ucwords(strtolower(preg_replace('/[^A-Za-z]/', ' ', $line[0]))),
                    'reg_no' => strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $line[1])),
                    'index_no' => password_hash(strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $line[2])), PASSWORD_BCRYPT, array('cost' => 4)),
                    'password' => password_hash(preg_replace('/[^A-Za-z0-9]/', '', $line[3]), PASSWORD_BCRYPT, array('cost' => 5)),
                    'sex' => strtolower(preg_replace('/[^A-Za-z]/', '', $line[4])),
                    'residence_id' => preg_replace('/[^0-9]/', '', $line[5]),
                    'school_id' => $this->input->post('school_id'),
                    'faculty_id' => $this->input->post('faculty_id'),
                    'year' => $this->input->post('year')
                );
                $this->db->insert('vs_students', $data);
            }
        endwhile;

        fclose($csvFile);

        return true;
    }
}