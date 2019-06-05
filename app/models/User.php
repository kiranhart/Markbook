<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //Login User
    public function login($email, $password) {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      $hashedPassword = $row->password;
      
      if (password_verify($password, $hashedPassword)) {
        return $row;
      } else {
        return false;
      }
    }

    public function recordLoginData($id) {
      $json = file_get_contents("http://www.geoplugin.net/json.gp");
      $data = json_decode($json, true);

      $this->db->query('INSERT INTO login_data (userid, continent, country, region, city, latitude, longitude, ip) VALUES (:userid, :continent, :country, :region, :city, :latitude, :longitude, :ip)');
      $this->db->bind(':userid', $id);
      $this->db->bind(':continent', $data['geoplugin_continentName']);
      $this->db->bind(':country', $data['geoplugin_countryName']);
      $this->db->bind(':region', $data['geoplugin_regionName']);
      $this->db->bind(':city', $data['geoplugin_city']);
      $this->db->bind(':latitude', $data['geoplugin_latitude']);
      $this->db->bind(':longitude', $data['geoplugin_longitude']);
      $this->db->bind(':ip', $data['geoplugin_request']);

      // Execute
      if ($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getAllLoginDates($id) {
      $this->db->query('SELECT * FROM login_data WHERE userid = :id');
      $this->db->bind(':id', $id);
      return $this->db->resultSet();
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
      if ($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //Return an entire user by email
    public function getBaseUserDataByEmail($email) {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      //Bind the values
      $this->db->bind(':email', $email);
      $row = $this->db->single();

      return ($this->db->rowCount() > 0) ? $row : null;
    }

    //Return an entire user by id
    public function getBaseUserDataById($id) {
      $this->db->query('SELECT * FROM users where id = :id');
      //Bind values
      $this->db->bind(':id', $id);
      $row = $this->db->single();

      return ($this->db->rowCount() > 0) ? $row : null;
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