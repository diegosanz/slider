<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends Logged_controller {

	public function index(){
		redirect(base_url('administracion/nuevo'));
	}

	public function nuevo(){
		$this->load->library('navbar');
		$data['navbar'] = $this->navbar->get_navbar();
		$this->load->view('administracion/nuevo', $data);
	}

	public function modificar(){
		$this->load->library('navbar');
		$data['navbar'] = $this->navbar->get_navbar();
		$this->load->view('administracion/modificar', $data);
	}

	// public function ordenar(){
	// 	$data['operationView'] = 'ordenar';
	// 	$this->load->library('navbar');
	// 	$data['navbar'] = $this->navbar->get_navbar();
	// 	$this->load->view('administracion', $data);
	// }
}
