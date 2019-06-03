<?php 

class UClass {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //Check if there is any classes created by user by email
    public function getClassCount($email) {
        $this->db->query('SELECT * FROM class WHERE useremail = :useremail');
        $this->db->bind(':useremail', $email);
        $row = $this->db->single();
        return ($this->db->rowCount() > 0) ? $this->db->rowCount() : 0;
    }

    //Create Class
    public function createClass($userid, $useremail, $classname, $classcode, $classdesc, $knowledge, $thinking, $application, $communication, $term, $final) {
        $this->db->query('INSERT INTO class (ownerid, useremail, classname, classcode, classdescription, knowledge, thinking, application, communication, termmark, finalmark) VALUES (:ownerid, :useremail, :classname, :classcode, :classdescription, :knowledge, :thinking, :application, :communication, :termmark, :finalmark)');
        $this->db->bind(':ownerid', $userid);
        $this->db->bind(':useremail', $useremail);
        $this->db->bind(':classname', $classname);
        $this->db->bind(':classcode', $classcode);
        $this->db->bind(':classdescription', $classdesc);
        $this->db->bind(':knowledge', $knowledge);
        $this->db->bind(':thinking', $thinking);
        $this->db->bind(':application', $application);
        $this->db->bind(':communication', $communication);
        $this->db->bind(':termmark', $term);
        $this->db->bind(':finalmark', $final);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Remove a specific class
    public function removeClassById($classID) {
        $this->db->query('DELETE FROM class WHERE id = :id');
        $this->db->bind(':id', $classID);
        return ($this->db->execute()) ? true : false;
    }

    //Get all of the classes by an email
    public function getAllClasses($email) {
        $this->db->query('SELECT * FROM class WHERE useremail = :email');
        $this->db->bind(':email', $email);
        $data = $this->db->resultSet();
        return $data;
    }

    //Get all of the classes by an id
    public function getAllClassesById($id) {
        $this->db->query('SELECT * FROM class WHERE ownerid = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
        return $data;
    }
    
    //Get the class by id
    public function getClassById($id) {
        $this->db->query('SELECT * FROM class WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}