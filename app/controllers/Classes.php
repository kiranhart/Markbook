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
                'classknowledge' => trim($_POST['classknowledge']),
                'classthinking' => trim($_POST['classthinking']),
                'classapplication' => trim($_POST['classapplication']),
                'classcommunication' => trim($_POST['classcommunication']),
                'classterm' => trim($_POST['classterm']),
                'classfinal' => trim($_POST['classfinal']),
                'classknowledge_err' => '',
                'classthinking_err' => '',
                'classapplication_err' => '',
                'classcommunication_err' => '',
                'classname_err' => '',
                'classcode_err' => '',
                'classdescription_err' => '',
                'classterm_err' => '',
                'classfinal_err' => ''
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

            if (empty($data['classknowledge'])) {
                $data['classknowledge_err'] = "Please enter knowledge %";
            }

            if (empty($data['classthinking'])) {
                $data['classthinking_err'] = "Please enter thinking %";
            }

            if (empty($data['classapplication'])) {
                $data['classapplication_err'] = "Please enter application %";
            }

            if (empty($data['classcommunication'])) {
                $data['classcommunication_err'] = "Please enter communication %";
            }

            if (empty($data['classterm'])) {
                $data['classterm_err'] = "Please fill out class term %";
            }

            if (empty($data['classfinal'])) {
                $data['classfinal_err'] = "Please fill out class final %";
            }

            $kr = (empty($data['classknowledge'])) ? 0 : $data['classknowledge'];
            $tr = (empty($data['classthinking'])) ? 0 : $data['classthinking'];
            $ar = (empty($data['classapplication'])) ? 0 : $data['classapplication'];
            $cr = (empty($data['classcommunication'])) ? 0 : $data['classcommunication'];

            $ct = (empty($data['classterm'])) ? 0 : $data['classterm'];
            $cf = (empty($data['classfinal'])) ? 0 : $data['classfinal'];

            if (($kr + $tr + $ar + $cr) != 100) {
                $data['classknowledge_err'] = "K.T.A.C Must total to 100%";
                $data['classthinking_err'] = "K.T.A.C Must total to 100%";
                $data['classapplication_err'] = "K.T.A.C Must total to 100%";
                $data['classcommunication_err'] = "K.T.A.C Must total to 100%";
            } 

            if (($ct + $cf) != 100) {
                $data['classterm_err'] = "Term + Final Must Total 100%";
                $data['classfinal_err'] = "Term + Final Must Total 100%";
            }

            if (empty($data['classterm_err']) && empty($data['classfinal_err']) && empty($data['classname_err']) && empty($data['classcode_err']) && empty($data['classdescription_err']) && empty($data['classknowledge_err']) && empty($data['classthinking_err']) && empty($data['classapplication_err']) && empty($data['classcommunication_err'])) {
                //Add the class
                if ($this->classModel->createClass($_SESSION['user_id'], $_SESSION['user_email'], $data['classname'], $data['classcode'], $data['classdescription'], $kr, $tr, $ar, $cr, $data['classterm'], $data['classfinal'])) {
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
                'classknowledge' => '',
                'classthinking' => '',
                'classapplication' => '',
                'classcommunication' => '',
                'classterm' => '',
                'classfinal' => '',
                'classknowledge_err' => '',
                'classthinking_err' => '',
                'classapplication_err' => '',
                'classcommunication_err' => '',
                'classname_err' => '',
                'classcode_err' => '',
                'classdescription_err' => '',
                'classterm_err' => '',
                'classfinal_err' => ''
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
            'assignmentCount' => $this->assignmentModel->getAssignmentCountByClass($id),
            'allAssignments' => $this->assignmentModel->getAllAssignmentsByClass($id),
            'studentCount' => $this->studentModel->getStudentCountByClass($id),
            'allStudents' => $allStudents
        ];
        $this->view('classes/show', $data);
    }

    public function student($classid, $studentid) {
        $classData = $this->classModel->getClassById($classid);
        $studentData = $this->studentModel->getStudent($studentid);
        $allAssignments = $this->assignmentModel->getAllAssignmentsByClass($classid);
        $assignmentResults = $this->assignmentModel->getAllAssignmentResultsFromStudent($classid, $studentid);
        $resultCount = $this->assignmentModel->getAssignmentResultCountFromStudent($classid, $studentid);

        $data =  [
            'classData' => $classData,
            'studentData' => $studentData,
            'allAssignments' => $allAssignments,
            'assignmentResults' => $assignmentResults,
            'assignmentResultCount' => $resultCount
        ];
        
        $this->view('classes/student', $data);
    }

    public function addmark($classid, $studentid, $assignmentid) {

        $classData = $this->classModel->getClassById($classid);
        $studentData = $this->studentModel->getStudent($studentid);
        $assignmentData = $this->assignmentModel->getAssignment($assignmentid);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'classData' => $classData,
                'studentData' => $studentData,
                'assignmentData' => $assignmentData,
                'knowledgemarks' => trim($_POST['knowledgemarks']),
                'thinkingmarks' => trim($_POST['thinkingmarks']),
                'applicationmarks' => trim($_POST['applicationmarks']),
                'communicationmarks' => trim($_POST['communicationmarks']),
                'late' => trim($_POST['late']),
                'knowledgemarks_err' => '',
                'thinkingmarks_err' => '',
                'applicationmarks_err' => '',
                'communicationmarks_err' => ''
            ];

            if (!isset($data['marks'])) {
                $data['marks_err'] = "Please enter total marks";
            }

            if (!isset($data['knowledgemarks'])) {
                $data['knowledgemarks_err'] = "Please enter knowledge marks";
            }

            if (!isset($data['thinkingmarks'])) {
                $data['thinkingmarks_err'] = "Please enter thinking marks";
            }

            if (!isset($data['applicationmarks'])) {
                $data['applicationmarks_err'] = "Please enter application marks";
            }

            if (!isset($data['communicationmarks'])) {
                $data['communicationmarks_err'] = "Please enter communication marks";
            }

            if (empty($data['knowledgemarks_err']) && empty($data['thinkingmarks_err']) && empty($data['applicationmarks_err']) && empty($data['communicationmarks_err'])) {

                //Is there already assignment results?
                if ($this->assignmentModel->doesAssignmentResultExist($assignmentid, $classid, $studentid)) {
                    if ($this->assignmentModel->updateAssignmentResultByData($assignmentid, $classid, $studentid, 0, $data['knowledgemarks'], $data['thinkingmarks'], $data['applicationmarks'], $data['communicationmarks'], $data['late'])) {
                        redirect('classes/student/' . $classid . '/' . $studentid);
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    if ($this->assignmentModel->addAssignmentResult($assignmentid, $_SESSION['user_id'], $classid, $studentid, 0, $data['knowledgemarks'], $data['thinkingmarks'], $data['applicationmarks'], $data['communicationmarks'], $data['late'])) {
                        redirect('classes/student/' . $classid . '/' . $studentid);
                    } else {
                        die('Something went wrong');
                    }
                }

            } else {
                //Load with errors
                $this->view('classes/addmark', $data);
            }

        } else {
            $data = [
                'classData' => $classData,
                'studentData' => $studentData,
                'assignmentData' => $assignmentData,
                'knowledgemarks' => '',
                'thinkingmarks' => '',
                'applicationmarks' => '',
                'communicationmarks' => '',
                'late' => '',
                'knowledgemarks_err' => '',
                'thinkingmarks_err' => '',
                'applicationmarks_err' => '',
                'communicationmarks_err' => ''
            ];

            $this->view('classes/addmark', $data);
        }
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