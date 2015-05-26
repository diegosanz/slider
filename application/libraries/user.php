<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User {
	// ATRIBUTOS
	private $userName = "";
	private $role = FALSE;
	private $roleList = array();

	public function __construct() {
		$this->roleList["admin"] = 998;
		$this->roleList["user"] = 1000;

		$CI =& get_instance();
		$this->role = $CI->session->userdata('role');
		$this->userName = $CI->session->userdata('user');
	}

	//METODOS
	public function getRole(){
		return $this->role;
	}

	public function isAdmin(){
		$response = false;
		if($this->role == $this->roleList["admin"]){
			$response = true;
		}
		return $response;
	}

	public function isUser(){
		$response = false;
		if($this->role == $this->roleList["user"]){
			$response = true;
		}
		return $response;
	}

	public function isLogged(){
		$response = false;
		if($this->role !== FALSE){
			$response = true;
		}
		return $response;
	}

	public function getUserName(){
		return $this->userName;
	}
}
