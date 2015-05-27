<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visor extends CI_Controller {

	public function index(){
		$data = [];

		$data['arrSlides'][] = array(
			'titulo' => 'Titulo'
			, 'datos' => 'Localicación: Teatro<br>Precio: 10€'
			, 'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			, 'tipo' => 'exposicion'
		);

		$data['arrSlides'][] = array(
			'titulo' => 'Titulo 2'
			, 'datos' => 'Localicación: Otro sitio<br>Precio: Gratis'
			, 'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			, 'tipo' => 'infantil'
		);


		$this->load->view('visor', $data);
	}
}
