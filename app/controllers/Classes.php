<?php

class Classes extends Controller {

    public function __construct() {

        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->classModel = $this->model('UClass');
        $this->assignmentModel = $this->model('Assignment');
        $this->studentModel = $this->model('Student');
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'classname' => trim($_POST['classname']),
                'classcode' => trim($_POST['classcode']),
                'classdescription' => trim($_POST['classdescription']),
                'classname_err' => '',
                'classcode_err' => '',
                'classdescription_err' => ''
            ];   
            
            if (empty($data['classname'])) {
                $data['classname_err'] = 'Please enter a class name';
            }

            if (empty($data['classcode'])) {
                $data['classcode_err'] = 'Please enter a class code';
            }

            if (empty($data['classdescription'])) {
                $data['classdescription_err'] = 'Please enter a class description';
            }

            if (empty($data['classname_err']) && empty($data['classcode_err']) && empty($data['classdescription_err'])) {
                //Add the class
                if ($this->classModel->createClass($_SESSION['user_id'], $_SESSION['user_email'], $data['classname'], $data['classcode'], $data['classdescription'])) {
                    redirect('classes/list');
                } else {
                    die("Something went wrong");
                }
            } else {
                //Load view with errors
                $this->view('classes/add', $data);
            }

        } else {
            $data = [
                'classname' => '',
                'classcode' => '',
                'classdescription' => '',
                'classname_err' => '',
                'classcode_err' => '',
                'classdescription_err' => ''
            ];

            //Load View
            $this->view('classes/add', $data);
        }
    }

    public function list() {
        
        $classCount = $this->classModel->getClassCount($_SESSION['user_email']);
        $allClasses = $this->classModel->getAllClasses($_SESSION['user_email']);

        $data = [
            'classCount' => $classCount,
            'allClasses' => $allClasses
        ];

        $this->view('classes/list', $data);
    }

    
    public function show($id) {

        $studentList =$this->studentModel->getAllStudentsByClass($id);
        $allStudents = array();
        foreach ($studentList as $singleStudent) {
            array_push($allStudents, $this->studentModel->getStudent($singleStudent->studentid));
        }

        $data = [
            'classData' => $this->classModel->getClassById($id), 
            'assignmentCount' => $this->assignmentModel->getAssignmentCount($id),
            'allAssignments' => $this->assignmentModel->getAllAssignments($id),
            'studentCount' => $this->studentModel->getStudentCountByClass($id),
            'allStudents' => $allStudents
        ];
        $this->view('classes/show', $data);
    }

    public function addstudent($id) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'allStudents' => $this->studentModel->getAllStudentsByTeacher($_SESSION['user_id']),
                'classData' => $this->classModel->getClassById($id),
                'student' => trim($_POST['student']),
                'student_err' => ''
            ];

            if (empty($data['student'])) {
                $data['student_err'] = 'Please select a student';
            }

            if (empty($data['student_err'])) {
                if ($this->studentModel->isStudentInClass($data['student'], $data['classData']->id)) {
                    redirect('classes/addstudent/' . $data['classData']->id);
                } else {
                    if ($this->studentModel->addStudentToClass($data['classData']->id, $data['student'])) {
                        redirect('classes/show/' . $data['classData']->id);
                    } else {
                        die("Something went wrong!");
                    }
                }
            } else {
                //Load with errors
                $this->view('classes/addstudent', $data);
            }

        } else {
            $data = [
                'allStudents' => $this->studentModel->getAllStudentsByTeacher($_SESSION['user_id']),
                'classData' => $this->classModel->getClassById($id),
                'student' => '',
                'student_err' => ''
            ];
            $this->view('classes/addstudent', $data);
        }
    }

    public function removestudent($id) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'allStudents' => $this->studentModel->getAllStudentsByClass($id),
                'classData' => $this->classModel->getClassById($id),
                'student' => trim($_POST['student']),
                'student_err' => ''
            ];

            if (empty($data['student'])) {
                $data['student_err'] = 'Please select a student';
            }

            if (empty($data['student_err'])) {
                if ($this->studentModel->isStudentInClass($data['student'], $data['classData']->id)) {
                    if ($this->studentModel->removeStudentFromClass($data['classData']->id, $data['student'])) {
                        redirect('classes/show/' . $data['classData']->id);
                    } else {
                        die("Something went wrong!");
                    }
                } 
            } else {
                //Load with errors
                $this->view('classes/removestudent', $data);
            }

        } else {

            $students = array();

            foreach($this->studentModel->getAllStudentsByClass($id) as $ss) {
                array_push($students, $this->studentModel->getStudent($ss->studentid));
            }

            $data = [
                'allStudents' => $students,
                'classData' => $this->classModel->getClassById($id),
                'student' => '',
                'student_err' => ''
            ];
            $this->view('classes/removestudent', $data);
        }
    }
}