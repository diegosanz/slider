<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visor extends CI_Controller {

	public function index(){
		$this->load->model('visor_model');

		$date = false; // configurar la fecha

		$data = [];
		$data['arrSlides'] = $this->visor_model->getSlides($date);

		$this->load->view('visor', $data);
	}
}
