<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index()	{
		$userData = array(
			'username' => ''
		);
		$this->session->unset_userdata($userData);
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect(base_url('login'), 'refresh');
	}
}
