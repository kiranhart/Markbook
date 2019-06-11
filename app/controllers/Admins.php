<?php 

class Admins extends Controller {

    public function __construct() {
        if (!isLoggedIn()) {
            redirect("users/login");
        } 

        if (isLoggedIn() && userAccountType() != 10) {
            redirect('errors/403');
        } 

        $this->adminModel = $this->model('Admin');
    }

    public function index() {
        $data = [
            'totalUsers' => $this->adminModel->getTotalUsers(),
            'totalStudents' => $this->adminModel->getTotalStudents(),
            'totalClasses' => $this->adminModel->getTotalClasses(),
            'totalAssignments' => $this->adminModel->getTotalAssignments(),
            'totalAssignmentResults' => $this->adminModel->getTotalAssignmentResults()
        ];
        $this->view('admins/index', $data);
    }
}