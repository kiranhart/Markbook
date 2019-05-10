<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Markbook',
        'description' => 'The mark book program you\'ve always wanted'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'A markbook system designed for ICS3U0'
      ];

      $this->view('pages/about', $data);
    }
  }