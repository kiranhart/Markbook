<?php

class Student {

	private $db;

	public function __construct() {
		$this->db = new Database;
	}

    //Add Student to database
    public function addStudent($teacherid, $firstname, $lastname, $birthdate, $email, $number) {
        $this->db->query('INSERT INTO student (teacherid, firstname, lastname, birthdate, email, studentnumber) VALUES (:teacherid, :firstname, :lastname, :birthdate, :email, :studentnumber)');
        $this->db->bind(':teacherid', $teacherid);
        $this->db->bind(':firstname', $firstname);
        $this->db->bind(':lastname', $lastname);
        $this->db->bind(':birthdate', $birthdate);
        $this->db->bind(':email', $email);
        $this->db->bind(':studentnumber', $number);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function removeStudent($id) {
        $this->db->query('DELETE FROM student WHERE id = :id');
        $this->db->bind(':id', $id);
        return ($this->db->execute()) ? true : false;
    }

    public function removeStudentFromAllClasses($id) {
        $this->db->query('DELETE FROM class_students WHERE studentid = :id');
        $this->db->bind(':id', $id);
        return ($this->db->execute()) ? true : false;
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
        $this->db->query('SELECT * FROM student WHERE teacherid = :id ORDER BY lastname');
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
    //Remove student from class
    public function removeStudentFromClass($classId, $studentId) {
        $this->db->query('DELETE FROM class_students WHERE classid = :classid AND studentid = :studentid');
        $this->db->bind(':classid', $classId);
        $this->db->bind(':studentid', $studentId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } 
}