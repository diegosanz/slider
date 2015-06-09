<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visor extends CI_Controller {

	public function index(){
		$this->load->model('visor_model');
		$this->load->helper('visor');

		$data = [];
		$data['arrSlides'] = $this->visor_model->getActualSlides();
		$data['clave'] = $this->visor_model->listIds();
		$data['timeout'] = $this->config->item('visor_timeout');

		// reemplazo de saltos de línea por <br>
		$data = convertLineBreak($data);

		$this->load->view('visor', $data);
	}

	public function checkUpdates(){
		requireAjaxRequest();
		$this->load->model('visor_model');

		$clave['clave'] = $this->visor_model->listIds();
		$data['json'] = json_encode($clave);

		$this->load->view('json', $data);
	}
}
