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
    public function createClass($userid, $useremail, $classname, $classcode, $classdesc) {
        $this->db->query('INSERT INTO class (ownerid, useremail, classname, classcode, classdescription) VALUES (:ownerid, :useremail, :classname, :classcode, :classdescription)');
        $this->db->bind(':ownerid', $userid);
        $this->db->bind(':useremail', $useremail);
        $this->db->bind(':classname', $classname);
        $this->db->bind(':classcode', $classcode);
        $this->db->bind(':classdescription', $classdesc);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //Get all of the classes by an email
    public function getAllClasses($email) {
        $this->db->query('SELECT * FROM class WHERE useremail = :email');
        $this->db->bind(':email', $email);
        $data = $this->db->resultSet();
        return $data;
    }
}