<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slides_model extends CI_Model {

	/**
	 * Inserta el formulario que recibe por POST en la BD
	 *
	 * @return BOOLEAN ? inserta : no inserta
	 */
	public function formAdd(){
		$formData = array(
				'titulo' => $this->input->post('titulo')
			, 'datos' => $this->input->post('titulo')
			, 'fecha_inicio' => $this->input->post('titulo')
			, 'fecha_fin' => $this->input->post('titulo')
			, 'descripcion' => $this->input->post('titulo')
		);

		/**
		COMPROBAR CONFIG EXTRA JQUERY

		REDIMENSIONADO
		*/

		$photo = $this->uploadFile('imagen');
	}


	// --- PRIVATE ---
	private function uploadPhoto($file){
		// Nuevo nombre del fichero en el servidor: segundos + "_1" + ".svg"
		// si hay más archivos con el mismo nombre cambiará a _2, _3...
		$result = false;

		$finalName = time(); // Random?

		$config['upload_path'] = './img/uploaded/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '12000';
		$config['overwrite'] = false;
		$config['file_name'] = $finalName;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if( $this->upload->do_upload($file) ){
			$result = $this->upload->data()['file_name'] . $this->upload->data()['file_ext'];
		}

		return $result;
	}

}
