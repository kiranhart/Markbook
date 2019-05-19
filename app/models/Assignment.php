<?php 

class Assignment {

	private $db;

	public function __construct() {
		$this->db = new Database;
    }
    
    //Add assignment to class
    public function addAssignment($classid, $name, $desc, $marks, $weight, $assignedDate, $due) {
        $this->db->query('INSERT INTO assignment (classid, name, description, marks, weight, assigneddate, duedate) VALUES (:classid, :name, :description, :marks, :weight, :assigneddate, :duedate)');
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

    //Check if there is any assignemnts under that class id
    public function getAssignmentCount($id) {
        $this->db->query('SELECT * FROM assignment WHERE classid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Get all of the assigments by class id
    public function getAllAssignments($id) {
        $this->db->query('SELECT * FROM assignment WHERE classid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }
}