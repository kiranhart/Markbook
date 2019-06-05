<?php

class Students extends Controller {

	public function __construct() {
		
		if (!isLoggedIn()) {
			redirect('users/login');
		}

		$this->studentModel = $this->model('Student');
		$this->classModel = $this->model('UClass');
	}

	//Add
	public function add() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'firstname' => trim($_POST['firstname']),
				'lastname' => trim($_POST['lastname']),
				'birthdate' => trim($_POST['birthdate']),
				'email' => trim($_POST['email']),
				'studentnumber' => trim($_POST['studentnumber']),
				'firstname_err' => '',
				'lastname_err' => '',
				'birthdate_err' => '',
				'email_err' => '',
				'studentnumber_err' => ''
			];

			if (empty($data['firstname'])) {
				$data['firstname_err'] = 'Please enter student\'s first name';
			}

			if (empty($data['lastname'])) {
				$data['lastname_err'] = 'Please enter student\'s last name';
			}

			if (empty($data['birthdate'])) {
				$data['birthdate_err'] = 'Please enter student\'s birthdate';
			}

			if (empty($data['email'])) {
				$data['email_err'] = 'Please enter student\'s email';
			}

			if (empty($data['studentnumber'])) {
				$data['studentnumber_err'] = "Please enter student number";
			}

			if (empty($data['studentnumber_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['birthdate_err']) && empty($data['email_err'])) {
				//Add the student to user account
				if ($this->studentModel->addStudent($_SESSION['user_id'], $data['firstname'], $data['lastname'], $data['birthdate'], $data['email'], $data['studentnumber'])) {
					redirect('students/list');
				} else {
					die('Something went wrong');
				}
			} else {
				//Load with errors
				$this->view('students/add', $data);
			}

		} else {
			$data = [
				'firstname' => '',
				'lastname' => '',
				'birthdate' => '',
				'email' => '',
				'studentnumber' => '',
				'firstname_err' => '',
				'lastname_err' => '',
				'birthdate_err' => '',
				'email_err' => '',
				'studentnumber_err' => ''
			];

			$this->view('students/add', $data);
		}
	}

	//Remove
	public function remove($id) {

		$data = [];

		if ($this->studentModel->removeStudent($id)) {
			if ($this->studentModel->removeStudentFromAllClasses($id)) {
				$this->view('students/remove', $data);
			} else {
				$this->view('students/remove', $data);
			}
		} else {
			redirect('students/list');
		}
	}

	//List
	public function list() {
		$data = [
			'studentCount' => $this->studentModel->getStudentCountByTeacher($_SESSION['user_id']),
			'allStudents' => $this->studentModel->getAllStudentsByTeacher($_SESSION['user_id'])
		];
		$this->view('students/list', $data);
	}

	public function show($id) {
		$data = [];
		$this->view('students/show', $data);
	}
}