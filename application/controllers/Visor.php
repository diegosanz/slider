<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visor extends CI_Controller {

	public function index(){
		$this->load->model('visor_model');
		$this->load->helper('visor');

		$data = [];
		$data['arrSlides'] = $this->visor_model->getActualSlides();

		// reemplazo de saltos de línea por <br>
		$data = convertLineBreak($data);

		$this->load->view('visor', $data);
	}
}
