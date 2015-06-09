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
		$this->load->model('slides_model');
		$this->load->library('navbar');

		$data['navbar'] = $this->navbar->get_navbar();
		$data['tiposEventos'] = $this->slides_model->getEventTypes();

		$this->load->view('administracion/nuevo', $data);
	}

	/**
	 * Muestra el formulario de "modificar"
	 */
	public function modificar(){
		$this->load->model('slides_model');
		$this->load->library('navbar');

		$data['navbar'] = $this->navbar->get_navbar();
		$data['tiposEventos'] = $this->slides_model->getEventTypes();

		$this->load->view('administracion/modificar', $data);
	}

	public function borrar(){
		$this->load->model('slides_model');
		$this->load->library('navbar');

		$data['navbar'] = $this->navbar->get_navbar();
		$data['tiposEventos'] = $this->slides_model->getEventTypes();


		$this->load->view('administracion/borrar', $data);
	}

	// -------------------------------
	// AJAX
	// -------------------------------
	/**
	 * Devuelve un json con la lista de eventos disponibles
	 */
	public function get_avalilable_events(){
		requireAjaxRequest();
		$this->load->model('slides_model');

		$data['json'] = json_encode( $this->slides_model->getAvailableEvents() );
		$this->load->view('json', $data);
	}

	/**
	 * Devuelve un json con la info de un evento
	 *
	 * @param  INT id del evento a buscar
	 */
	public function get_event($id = -1){
		requireAjaxRequest();
		$this->load->model('slides_model');

		$data['json'] = json_encode( $this->slides_model->getEvents($id) );
		$this->load->view('json', $data);
	}

	/**
	 * Recibe el formulario de "nuevo" por AJAX y responde un JSON con la información de la inserción
	 */
	public function formAdd(){
		requireAjaxRequest();
		$this->load->model('slides_model');

		$response['isCorrect'] = $this->slides_model->formAdd();
		$data['json'] = json_encode($response);

		$this->load->view('json', $data);
	}

	/**
	 * Recibe el formulario de "modificar" por AJAX y responde un JSON con la información de la inserción
	 */
	public function formModify(){
		requireAjaxRequest();
		$this->load->model('slides_model');

		$response['isCorrect'] = $this->slides_model->formModify();
		$data['json'] = json_encode($response);

		$this->load->view('json', $data);
	}

	public function formDelete(){
		requireAjaxRequest();
		$this->load->model('slides_model');

		$response['isCorrect'] = $this->slides_model->formDelete();
		$data['json'] = json_encode($response);

		$this->load->view('json', $data);
	}
}
