<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (firstname, lastname, prefix, email, password, birthdate, sex, managed, accountype) VALUES(:firstname, :lastname, :prefix, :email, :password, :birthdate, :sex, :managed, :accountype)');
      // Bind values
      $this->db->bind(':firstname', $data['firstname']);
      $this->db->bind(':lastname', $data['lastname']);
      $this->db->bind(':prefix', $data['prefix']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':birthdate', $data['birthdate']);
      $this->db->bind(':sex', $data['sex']);
      $this->db->bind(':managed', 0);
      $this->db->bind(':accountype', 0);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
  }