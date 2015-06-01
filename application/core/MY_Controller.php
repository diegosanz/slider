<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Permite el acceso si el usuario ha iniciado la sesión
class Logged_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->library('user');
		if(!$this->user->isLogged()){
			$this->session->set_flashdata('accessAttempt', base_url(uri_string()));

			redirect(base_url('login'), 'refresh');
			exit();
		}
	}
}

// Permite el acceso si el usuario es administrador
class Admin_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->library('user');
		if(!$this->user->isAdmin()){
			$this->session->set_flashdata('accessAttempt', base_url(uri_string()));

			redirect(base_url('login'), 'refresh');
			exit();
		}
	}
}
