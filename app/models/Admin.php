<?php 

class Admin {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getTotalUsers() {
        $this->db->query('SELECT id FROM users');
        $rows = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    public function getTotalClasses() {
        $this->db->query('SELECT id FROM class');
        $rows = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    public function getTotalStudents() {
        $this->db->query('SELECT id FROM student');
        $rows = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    public function getTotalAssignments() {
        $this->db->query('SELECT id FROM assignment');
        $rows = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    public function getTotalAssignmentResults() {
        $this->db->query('SELECT id FROM assignment_result');
        $rows = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }
}