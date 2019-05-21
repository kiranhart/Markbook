<?php 

class Assignment {

	private $db;

	public function __construct() {
		$this->db = new Database;
    }
    
    //Add assignment to class
    public function addAssignment($teacherid, $classid, $name, $desc, $marks, $weight, $assignedDate, $due) {
        $this->db->query('INSERT INTO assignment (teacherid, classid, name, description, marks, weight, assigneddate, duedate) VALUES (:teacherid, :classid, :name, :description, :marks, :weight, :assigneddate, :duedate)');
        $this->db->bind(':teacherid', $teacherid);
        $this->db->bind(':classid', $classid);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $desc);
        $this->db->bind(':marks', $marks);
        $this->db->bind(':weight', $weight);
        $this->db->bind(':assigneddate', $assignedDate);
        $this->db->bind(':duedate', $due);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Add assignment result
    public function addAssignmentResult($id, $teacherid, $studentid, $totalmarks, $late) {
        $this->db->query('INSERT INTO assignment_result (assignmentid, teacherid, studentid, totalmarks, late) VALUES (:assignmentid, :teacherid, :studentid, :totalmarks, :late)');
        $this->db->bind(':assignmentid', $id);
        $this->db->bind(':teacherid', $teacherid);
        $this->db->bind(':studentid', $studentid);
        $this->db->bind(':totalmarks', $totalmarks);
        $this->db->bind(':late', $late);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update assignment data
    public function updateAssignment($id, $name, $desc, $marks, $weight, $duedate) {
        $this->db->query('UPDATE assignment SET name = :name, description = :description, marks = :marks, weight = :weight, duedate = :duedate WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $desc);
        $this->db->bind(':marks', $marks);
        $this->db->bind(':weight', $weight);
        $this->db->bind(':duedate', $due);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update assignment results
    public function updateAssignmentResult($id, $totalMarks, $late) {
        $this->db->query('UPDATE assignment_result SET totalmarks = :totalmarks, late = :late WHERE id = :id');
        $this->db->query(':id', $id);
        $this->db->query(':totalmarks', $totalMarks);
        $this->db->query(':late', $late);
    }

    //Check if there is any assignemnts under that class id
    public function getAssignmentCountByTeacher($id) {
        $this->db->query('SELECT * FROM assignment WHERE teacherid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Get all of the assigments by class id
    public function getAllAssignmentsByTeacher($id) {
        $this->db->query('SELECT * FROM assignment WHERE teacherid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }

    public function getAssignmentCountByClass($id) {
        $this->db->query('SELECT * FROM assignment WHERE classid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Get all of the assigments by class id
    public function getAllAssignmentsByClass($id) {
        $this->db->query('SELECT * FROM assignment WHERE classid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }
}