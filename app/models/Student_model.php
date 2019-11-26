<?php

class Student_model extends CI_Model
{
    /**
     * Used for retrieving all students.
     * @return mixed
     */
    function get_students()
    {
        return $this->db->select('*')
            ->from('students')
            ->join('programs', 'programs.id = students.programId')
            ->get()
            ->result();
    }

    /**
     * Used for students bulk registration using csv file.
     * @return bool
     */
    function register_class()
    {
        $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');

        fgetcsv($csvFile);

        while (($line = fgetcsv($csvFile)) !== FALSE):
            $reg_no = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $line[0]));
            $email = strtolower($line[1]);
            $password = password_hash(
                preg_replace('/[^A-Za-z0-9]/', '', $line[2]),
                PASSWORD_BCRYPT, array('cost' => 5)
            );
            $year = $this->input->post('year');
            $programId = $this->input->post('programId');

            //Checking if student has already been added.
            $count = $this->db->select('id')
                ->from('students')
                ->where('reg_no', $reg_no)
                ->get();

            if ($count->num_rows() > 0) {
                //If students exist, Just update their data.
                $data = array(
                    'email' => $email,
                    'password' => $password,
                    'programId' => $programId,
                    'year' => $year
                );

                $this->db
                    ->where('reg_no', $reg_no)
                    ->update('students', $data);
            } else {
                //or inserting data.
                $data = array(
                    'email' => $email,
                    'reg_no' => $reg_no,
                    'password' => $password,
                    'programId' => $programId,
                    'year' => $year
                );

                $this->db->insert('students', $data);
            }
        endwhile;

        fclose($csvFile);

        return true;
    }
}