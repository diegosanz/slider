<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends Logged_controller {

	/**
	 * Redirección a "administracion/nuevo"
	 */
	public function index(){
		redirect(base_url('administracion/nuevo'));
	}

	/**
	 * Muestra el formulario de "nuevo"
	 */
	public function nuevo(){
		$this->load->library('navbar');
		$data['navbar'] = $this->navbar->get_navbar();
		$this->load->view('administracion/nuevo', $data);
	}

	/**
	 * Muestra el formulario de "modificar"
	 *
	 * @param
	 * @return void
	 */
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

	/**
	 * Recibe el formulario de "nuevo" por AJAX y responde un JSON con la información de la inserción
	 */
	public function formAdd(){
		requireAjaxRequest();
		$this->load->model('Slides_model');

		$formData = array(
				'titulo' => $this->input->post('titulo')
			, 'datos' => $this->input->post('titulo')
			, 'fecha_inicio' => $this->input->post('titulo')
			, 'fecha_fin' => $this->input->post('titulo')
			, 'descripcion' => $this->input->post('titulo')
			, 'foto' => $this->input->post('titulo')
		);

		$response = $this->slides_model->formAdd();
	}
}
