<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Visor_model extends CI_Model {

	/**
	 * Devuelve un array con el listado de los eventos
	 *
	 * @return    ARRAY con los eventos
	 */
	public function getSlides(){
		$result = [];

		$result[] = array(
			'titulo' => 'Titulo'
			, 'datos' => 'Localicación: Museo<br>Precio: 10€'
			, 'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			, 'tipo' => 'exposicion'
		);

		$result[] = array(
			'titulo' => 'Titulo 2'
			, 'datos' => 'Localicación: Parque<br>Precio: Gratis'
			, 'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
			, 'tipo' => 'infantil'
		);

		$result[] = array(
			'titulo' => 'Titulo 3'
			, 'datos' => 'Localicación: Teatro<br>Precio: adultos 2€, niños gratis.'
			, 'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
			, 'tipo' => 'teatro'
		);

		return $result;
	}
}
