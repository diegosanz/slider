<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends Admin {

	public function index(){
		$this->load->view('administracion');
	}
}
