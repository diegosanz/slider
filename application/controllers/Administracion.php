<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends Admin_controller {

	public function index(){
		$data = [];
		$this->load->library('navbar');
		$data['navbar'] = $this->navbar->get_navbar();
		$this->load->view('administracion', $data);
	}
}
