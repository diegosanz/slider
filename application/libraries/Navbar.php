<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navbar {

	protected $CI;

	// Se establecen los atributos como usuario no logueado
	private $isLogued = false;
	private $elements = array(
		"userName" => 'No logueado'
		, "loginBtn" => array(
			'text' => '<i class="fa fa-fw fa-sign-in"></i> Entrar'
			, 'link' => 'login'
		)
	);


	public function __construct() {
		$this->CI =& get_instance();

		// si el usuario está logueado se cambian los atributos
		if( $this->CI->user->isLogged() ){
			$this->elements = array(
				"userName" => '<i class="fa fa-user"></i> '.$this->CI->user->getUserName()
				, "loginBtn" => array(
					'text' => '<i class="fa fa-fw fa-sign-out"></i> Salir'
					, 'link' => 'logout'
				)
			);
		}
	}

	/**
	 * Devuelve el array de elementos
	 *
	 * @param  elemento que se quiere recoger
	 * @return ARRAY elementos
	 */
	public function get_navbar(){
		return $this->elements;
	}
}
