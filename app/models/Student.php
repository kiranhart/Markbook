<?php

class Student {

	private $db;

	public function __construct() {
		$this->db = new Database;
	}
}