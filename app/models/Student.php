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

    //Get student
    public function getStudent($id) {
        $this->db->query('SELECT * FROM student WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    //Check if there is any students under that class id
    public function getStudentCountByClass($id) {
        $this->db->query('SELECT * FROM class_students WHERE classid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Check if there is any students under that teacher id
    public function getStudentCountByTeacher($id) {
        $this->db->query('SELECT * FROM student WHERE teacherid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Get all of the students by class id
    public function getAllStudentsByClass($id) {
        $this->db->query('SELECT * FROM class_students WHERE classid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }

    //Get all of the students by teacher id
    public function getAllStudentsByTeacher($id) {
        $this->db->query('SELECT * FROM student WHERE teacherid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }

    //Check if student is already in that class
    public function isStudentInClass($studentId, $classId) {
        $this->db->query('SELECT * FROM class_students WHERE studentid = :studentid AND classid = :classid');
        $this->db->bind(':studentid', $studentId);
        $this->db->bind(':classid', $classId);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Add student to class
    public function addStudentToClass($classId, $studentId) {
        $this->db->query('INSERT INTO class_students (classid, studentid) VALUES (:classid, :studentid)');
        $this->db->bind(':classid', $classId);
        $this->db->bind(':studentid', $studentId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}