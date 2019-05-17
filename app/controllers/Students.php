<?php

class Students extends Controller {

	public function __construct() {
		$this->studentModel = $this->model('Student');
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
				'address' => trim($_POST['address']),
				'phone' => trim($_POST['phone']),
				'firstname_err' => '',
				'lastname_err' => '',
				'birthdate_err' => '',
				'email_err' => ''
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

			if (empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['birthdate_err']) && empty($data['email_err'])) {
				//Add the student to user account
				
			} else {
				//Load with errors
				$this->view('student/add', $data);
			}

		} else {
			$data = [
				'firstname' => '',
				'lastname' => '',
				'birthdate' => '',
				'email' => '',
				'address' => '',
				'phone' => '',
				'firstname_err' => '',
				'lastname_err' => '',
				'birthdate_err' => '',
				'email_err' => ''
			];

			$this->view('student/add', $data);
		}
	}

	//List
	public function list() {
		$data = [];
		$this->view('student/list', $data);
	}
}