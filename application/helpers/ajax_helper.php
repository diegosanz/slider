<?php
	/**
	 * Muestra el 404 y cancela la ejecución de la página si la petición no era AJAX
	 */
	function requireAjaxRequest(){
		$CI =& get_instance();
		if(! $CI->input->is_ajax_request()){
			show_404();
		}
	}
