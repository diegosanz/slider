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
		$data['eventsList'] = $this->slides_model->getAvailableEvents();
		$data['tiposEventos'] = $this->slides_model->getEventTypes();


		$this->load->view('administracion/modificar', $data);
	}

	/**
	 * Devuelve un json con la info de un evento
	 *
	 * @param  INT id del evento a buscar
	 */
	public function get_event($id = -1){
		requireAjaxRequest();
		$this->load->model('slides_model');

		$event = $this->slides_model->getEvents($id);
		var_dump($event);
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
}
