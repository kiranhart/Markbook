<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->classModel = $this->model('UClass');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'firstname' => trim($_POST['firstname']),
          'lastname' => trim($_POST['lastname']),
          'prefix' => trim($_POST['prefix']),
          'email' => trim($_POST['email']),
          'sex' => trim($_POST['sex']),
          'birthdate' => trim($_POST['birthdate']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirmpassword']),
          'firstname_err' => '',
          'lastname_err' => '',
          'prefix_err' => '',
          'email_err' => '',
          'sex_err' => '',
          'birthdate_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

          //Validate Email
          if (empty($data['email'])) {
            $data['email_err'] = 'Please enter email';
        } else {
            //Check email
            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already in use';
            }
        }

        //Validate names
        if (empty($data['firstname'])) {
            $data['firstname_err'] = 'Please enter First name';
        }

        if (empty($data['lastname'])) {
            $data['lastname_err'] = 'Please enter Last name';
        }

        //Validate prefix, sex, birthdate
        if (empty($data['prefix'])) {
            $data['prefix_err'] = 'Please enter a prefix';
        }

        if (empty($data['sex'])) {
            $data['sex_err'] = 'Please enter your Sex';
        }
        
        if (empty($data['birthdate'])) {
            $data['birthdate_err'] = 'Please enter your birthday';
        }

        //Passwords      
        if (empty($data['password'])) {
            $data['password_err'] = 'Please enter a password';
        } elseif (strlen($data['password']) < 8) {
            $data['password_err'] = 'Password must be at least 8 characters';
        }

        if (empty($data['confirm_password'])) {
            $data['confirm_password_err'] = 'Please confirm password';
        } else {
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        }

        // Make sure errors are empty
        if (empty($data['email_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['prefix_err']) && empty($data['sex_err']) && empty($data['birthdate_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
          //Validated
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'firstname' => '',
          'lastname' => '',
          'prefix' => '',
          'email' => '',
          'sex' => '',
          'birthdate' => '',
          'password' => '',
          'confirm_password' => '',
          'firstname_err' => '',
          'lastname_err' => '',
          'prefix_err' => '',
          'email_err' => '',
          'sex_err' => '',
          'birthdate_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        if ($this->userModel->findUserByEmail($data['email'])) {
          //Found the user
        } else {
          $data['email_err'] = 'That email isn\'t registered!';
        }

        // Make sure errors are empty
        if (empty($data['email_err']) && empty($data['password_err'])){
          // Validated  
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if ($loggedInUser) {
            //Create user sessioM
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Incorrect password!';
            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function home() {
      $data = [
        'pageName' => 'User Home Page',
        'classCount' => $this->classModel->getClassCount($_SESSION['user_email'])
      ];

      $this->view('users/home', $data);
    }

    public function account() {
        $data = [];
        $this->view('users/account', $data);
    }

    private function createUserSession($loggedInUser) {
      $_SESSION['user_id'] = $loggedInUser->id;
      $_SESSION['user_email'] = $loggedInUser->email;
      $_SESSION['user_data'] = $loggedInUser;
      redirect('users/home');
    }

    public function logout() {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_data']);
      session_destroy();
      redirect('pages/index');
    }
  }