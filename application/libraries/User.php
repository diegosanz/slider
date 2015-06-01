<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User {
	// ATRIBUTOS
	private $userName = FALSE;
	private $role = FALSE;
	private $roleList = array();

	public function __construct() {
		$CI =& get_instance();

		// $this->roleList["admin"] = 1;
		// $this->roleList["user"] = 1000;

		if( $CI->session->has_userdata('username') ){
			$this->userName = $CI->session->userdata('username');
			// $this->role = $CI->session->userdata('role');
		}
	}

	// MÉTODOS
	// public function getRole(){
	// 	return $this->role;
	// }
	//
	// public function isAdmin(){
	// 	$response = false;
	// 	if($this->role === $this->roleList["admin"]){
	// 		$response = true;
	// 	}
	// 	return $response;
	// }
	//
	// public function isUser(){
	// 	$response = false;
	// 	if($this->role === $this->roleList["user"]){
	// 		$response = true;
	// 	}
	// 	return $response;
	// }

	public function isLogged(){
		$response = false;
		if($this->userName !== FALSE){
			$response = true;
		}
		return $response;
	}

	public function getUserName(){
		return $this->userName;
	}
}
