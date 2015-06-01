<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$data = [];
		$this->load->library('navbar');
		$data['navbar'] = $this->navbar->get_navbar();
		$this->load->view('login', $data);
	}

	public function check(){
		$credentials['user'] = trim(strtolower( $this->input->post('user') ));
		$credentials['password'] = sha1($this->input->post('password') . $this->config->item('salt'));
		$this->load->model('login_model');
		$response['isCorrect'] = $this->login_model->openSession( $credentials['user'], $credentials['password'] );
		$data['json'] = json_encode($response);
		$this->load->view('json',$data);
	}
}
