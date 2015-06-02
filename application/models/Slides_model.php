<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slides_model extends CI_Model {

	/**
	 * Inserta el formulario que recibe por POST en la BD
	 *
	 * @return BOOLEAN ? inserta : no inserta
	 */
	public function formAdd(){

	}


	// --- PRIVATE ---
	private function subirSvg($file, $path, $finalName = false){
		// Nuevo nombre del fichero en el servidor: segundos + "_1" + ".svg"
		// si hay más archivos con el mismo nombre cambiará a _2, _3...
		$result = false;
		if($finalName){
			$finalName = $finalName."_1.svg";
		}else{
			$finalName = time()."_1.svg";
		}

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '12000';
		$config['overwrite'] = false;
		$config['file_name'] = $finalName;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if( $this->upload->do_upload($file) ){
			$result = $this->upload->data()['file_name'];
		}

		return $result;
	}

}
