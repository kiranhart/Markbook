<?php

class Assignments extends Controller {

    public function __construct() {
        
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->assignmentModel = $this->model('Assignment');
        $this->classModel = $this->model('UClass');
    }


    public function list() {
        $data = [
			'assignmentCount' => $this->assignmentModel->getAssignmentCountByTeacher($_SESSION['user_id']),
			'allAssignments' => $this->assignmentModel->getAllAssignmentsByTeacher($_SESSION['user_id'])
		];
        $this->view('assignments/list', $data);
    }

    public function add() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'classes' => $this->classModel->getAllClassesById($_SESSION['user_id']),
                'assignmentname' => trim($_POST['assignmentname']),
                'assignmentdesc' => trim($_POST['assignmentdesc']),
                'assignmentmarks' => trim($_POST['assignmentmarks']),
                'assignmentweight' => trim($_POST['assignmentweight']),
                'assignmentknowledge' => trim($_POST['assignmentknowledge']),
                'assignmentthinking' => trim($_POST['assignmentthinking']),
                'assignmentapplication' => trim($_POST['assignmentapplication']),
                'assignmentcommunication' => trim($_POST['assignmentcommunication']),
                'assigneddate' => trim($_POST['assigneddate']),
                'duedate' => trim($_POST['duedate']),
                'class' => trim($_POST['class']),
                'assignmentname_err' => '',
                'assignmentdesc_err' => '',
                'assignmentmarks_err' => '',
                'assignmentweight_err' => '',
                'assignmentknowledge_err' => '',
                'assignmentthinking_err' => '',
                'assignmentapplication_err' => '',
                'assignmentcommunication_err' => '',
                'assigneddate_err' => '',
                'duedate_err' => '',
                'class_err' => ''
            ];

            if (empty($data['assignmentname'])) {
                $data['assignmentname_err'] = "Enter a name for the assignment";
            }

            if (empty($data['assignmentdesc'])) {
                $data['assignmentdesc_err'] = "Enter assignment description";
            }

            if (empty($data['assignmentmarks'])) {
                $data['assignmentmarks_err'] = "Enter a number of marks for assignment";
            } else {
                if ($data['assignmentmarks'] < 1) {
                    
                    $data['assignmentmarks_err'] = "Assignments need at least 1 mark.";
                }
            }

            if (empty($data['assignmentweight'])) {
                $data['assignmentweight_err'] = "Enter assignment weight";
            } 

            if (empty($data['assigneddate'])) {
                $data['assigneddate_err'] = "Enter assigned date for assignment";
            } 

            if (empty($data['duedate'])) {
                $data['duedate_err'] = "Enter due date for assignment";
            } 

            if (empty($data['class'])) {
                $data['class_err'] = "Enter select a class to add assignment to.";
            } 

            if (empty($data['assignmentknowledge'])) {
                $data['assignmentknowledge_err'] = "Please enter knowledge marks.";
            }

            if (empty($data['assignmentthinking'])) {
                $data['assignmentthinking_err'] = "Please enter thinking marks";
            }

            if (empty($data['assignmentapplication'])) {
                $data['assignmentapplication_err'] = "Please enter application marks";
            }

            if (empty($data['assignmentcommunication'])) {
                $data['assignmentcommunication_err'] = "Please enter communication marks";
            }

            if (empty($data['assignmentknowledge_err']) && empty($data['assignmentthinking_err']) && empty($data['assignmentapplication_err']) && empty($data['assignmentcommunication_err']) && empty($data['assignmentname_err']) && empty($data['assignmentdesc_err']) && empty($data['assignmentmarks_err']) && empty($data['assignmentweight_err']) && empty($data['assigneddate_err']) && empty($data['duedate_err']) && empty($data['class_err'])) {
                //Add assignment
                if ($this->assignmentModel->addAssignment($_SESSION['user_id'], $data['class'], $data['assignmentname'], $data['assignmentdesc'], $data['assignmentmarks'], $data['assignmentweight'], $data['assignmentknowledge'], $data['assignmentthinking'], $data['assignmentapplication'], $data['assignmentcommunication'], $data['assigneddate'], $data['duedate'])) {
                    redirect('classes/show/' . $data['class']);
                } else {
                    die("Something went wrong");
                }
            } else {
                //Load with errors
                $this->view('assignments/add', $data);
            }

        } else {
            $data = [
                'classes' => $this->classModel->getAllClassesById($_SESSION['user_id']),
                'assignmentname' => '',
                'assignmentdesc' => '',
                'assignmentmarks' => '',
                'assignmentweight' => '',
                'assignmentknowledge' => '',
                'assignmentthinking' => '',
                'assignmentapplication' => '',
                'assignmentcommunication' => '',
                'assigneddate' => '',
                'duedate' => '',
                'class' => '',
                'assignmentname_err' => '',
                'assignmentdesc_err' => '',
                'assignmentmarks_err' => '',
                'assignmentweight_err' => '',
                'assignmentknowledge_err' => '',
                'assignmentthinking_err' => '',
                'assignmentapplication_err' => '',
                'assignmentcommunication_err' => '',
                'assigneddate_err' => '',
                'duedate_err' => '',
                'class_err' => ''
            ];
            
            $this->view('assignments/add', $data);
        }
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