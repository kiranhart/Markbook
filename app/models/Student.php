<?php

class Student {

	private $db;

	public function __construct() {
		$this->db = new Database;
	}

    //Add Student to database
    public function addStudent($teacherid, $firstname, $lastname, $birthdate, $email) {
        $this->db->query('INSERT INTO student (teacherid, firstname, lastname, birthdate, email) VALUES (:teacherid, :firstname, :lastname, :birthdate, :email)');
        $this->db->bind(':teacherid', $teacherid);
        $this->db->bind(':firstname', $firstname);
        $this->db->bind(':lastname', $lastname);
        $this->db->bind(':birthdate', $birthdate);
        $this->db->bind(':email', $email);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Check if there is any students under that class id
    public function getStudentCount($id) {
        $this->db->query('SELECT * FROM class_students WHERE classid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Get all of the students by class id
    public function getAllStudents($id) {
        $this->db->query('SELECT * FROM class_students WHERE classid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }
}