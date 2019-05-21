<?php

class Assignments extends Controller {

    public function __construct() {
        
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->assignmentModel = $this->model('Assignment');
    }


    public function list() {
        $data = [
			'assignmentCount' => $this->assignmentModel->getAssignmentCountByTeacher($_SESSION['user_id']),
			'allAssignments' => $this->assignmentModel->getAllAssignmentsByTeacher($_SESSION['user_id'])
		];
        $this->view('assignments/list', $data);
    }

    public function add() {
        $data = [];
        $this->view('assignments/add', $data);
    }

    public function update($id) {
        $data = [];
        $this->view('assignments/update');
    }

    public function remove($id) {
        $data = [];
        $this->view('assignments/remove');
    }
}