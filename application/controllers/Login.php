<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$data = [];
		$this->load->library('navbar');
		$data['navbar'] = $this->navbar->get_navbar();
		$this->load->view('login', $data);
	}

	public function check(){
		$credentials['user'] = $this->input->post('user');
		$credentials['password'] = $this->input->post('password');
	}
}
