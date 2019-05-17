<?php

class Classes extends Controller {

    public function __construct() {
        $this->classModel = $this->model('UClass');
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
}