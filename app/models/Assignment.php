<?php 

class Assignment {

	private $db;

	public function __construct() {
		$this->db = new Database;
    }
    
    //Add assignment to class
    public function addAssignment($teacherid, $classid, $name, $desc, $marks, $weight, $knowledge, $thinking, $application, $communication, $assignedDate, $due) {
        $this->db->query('INSERT INTO assignment (teacherid, classid, name, description, marks, weight, knowledge, thinking, application, communication, assigneddate, duedate) VALUES (:teacherid, :classid, :name, :description, :marks, :weight, :knowledge, :thinking, :application, :communication, :assigneddate, :duedate)');
        $this->db->bind(':teacherid', $teacherid);
        $this->db->bind(':classid', $classid);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $desc);
        $this->db->bind(':marks', $marks);
        $this->db->bind(':weight', $weight);
        $this->db->bind(':knowledge', $knowledge);
        $this->db->bind(':thinking', $thinking);
        $this->db->bind(':application', $application);
        $this->db->bind(':communication', $communication);
        $this->db->bind(':assigneddate', $assignedDate);
        $this->db->bind(':duedate', $due);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Add assignment result
    public function addAssignmentResult($id, $teacherid, $classid, $studentid, $totalmarks, $knowledge, $thinking, $application, $communication, $late) {
        $this->db->query('INSERT INTO assignment_result (assignmentid, teacherid, classid, studentid, totalmarks, knowledge, thinking, application, communication, late) VALUES (:assignmentid, :teacherid, :classid, :studentid, :totalmarks, :knowledge, :thinking, :application, :communication, :late)');
        $this->db->bind(':assignmentid', $id);
        $this->db->bind(':teacherid', $teacherid);
        $this->db->bind(':classid', $classid);
        $this->db->bind(':studentid', $studentid);
        $this->db->bind(':totalmarks', $totalmarks);
        $this->db->bind(':knowledge', $knowledge);
        $this->db->bind(':thinking', $thinking);
        $this->db->bind(':application', $application);
        $this->db->bind(':communication', $communication);
        $this->db->bind(':late', $late);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update assignment data
    public function updateAssignment($id, $name, $desc, $marks, $weight, $knowledge, $thinking, $application, $communication, $duedate) {
        $this->db->query('UPDATE assignment SET name = :name, description = :description, marks = :marks, weight = :weight, knowledge = :knowledge, thinking = :thinking, application = :application, communication = :communication duedate = :duedate WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $desc);
        $this->db->bind(':marks', $marks);
        $this->db->bind(':weight', $weight);
        $this->db->bind(':knowledge', $knowledge);
        $this->db->bind(':thinking', $thinking);
        $this->db->bind(':application', $application);
        $this->db->bind(':communication', $communication);
        $this->db->bind(':duedate', $duedate);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update assignment results
    public function updateAssignmentResult($id, $totalMarks, $knowledge, $thinking, $application, $communication, $late) {
        $this->db->query('UPDATE assignment_result SET totalmarks = :totalmarks, knowledge = :knowledge, thinking = :thinking, application = :application, communication = :communication, late = :late WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':totalmarks', $totalMarks);
        $this->db->bind(':knowledge', $knowledge);
        $this->db->bind(':thinking', $thinking);
        $this->db->bind(':application', $application);
        $this->db->bind(':communication', $communication);
        $this->db->bind(':late', $late);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update results by assignment id, class id, student id
    public function updateAssignmentResultByData($assignmentid, $classid, $studentid, $totalmarks, $knowledge, $thinking, $application, $communication, $late) {
        $this->db->query('UPDATE assignment_result SET totalmarks = :totalmarks, knowledge = :knowledge, thinking = :thinking, application = :application, communication = :communication, late = :late WHERE assignmentid = :assignmentid AND classid = :classid AND studentid = :studentid');
        $this->db->bind(':totalmarks', $totalmarks);
        $this->db->bind(':knowledge', $knowledge);
        $this->db->bind(':thinking', $thinking);
        $this->db->bind(':application', $application);
        $this->db->bind(':communication', $communication);
        $this->db->bind(':late', $late);
        $this->db->bind(':assignmentid', $assignmentid);
        $this->db->bind(':studentid', $studentid);
        $this->db->bind(':classid', $classid);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Get single assignment from id
    public function getAssignment($id) {
        $this->db->query('SELECT * FROM assignment WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    //Get all assignment results of a student in class
    public function getAllAssignmentResultsFromStudent($classid, $studentid) {
        $this->db->query('SELECT * FROM assignment_result WHERE classid = :classid AND studentid = :studentid');
        $this->db->bind(':classid', $classid);
        $this->db->bind(':studentid', $studentid);
        $data = $this->db->resultSet();
        return $data;
    }

    //Get assignment result count of student
    public function getAssignmentResultCountFromStudent($classid, $studentid) {
        $this->db->query('SELECT * FROM assignment_result WHERE classid = :classid AND studentid = :studentid');
        $this->db->bind(':classid', $classid);
        $this->db->bind(':studentid', $studentid);
        $rows = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
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

    //Check if assignment result exist
    public function doesAssignmentResultExist($assignmentId, $classId, $studentId) {
        $this->db->query('SELECT * FROM assignment_result WHERE assignmentid = :assignmentid AND classid = :classid AND studentid = :studentid');
        $this->db->bind(':assignmentid', $assignmentId);
        $this->db->bind(':studentid', $studentId);
        $this->db->bind(':classid', $classId);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}