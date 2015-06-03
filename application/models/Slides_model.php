<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slides_model extends CI_Model {

	/**
	 * Extrae de la BD los tipos de eventos, si se le pasa un ID de un evento
	 * busca en la BD solamente ese evento
	 *
	 * @param  INT (opcional) ID del evento
	 * @return ARRAY eventos y sus datos en otro ARRAY interno
	 */
	public function getEventTypes($id = FALSE){
		$sql = "SELECT
				id, nombre, clase_css
			FROM
				tipos_eventos
			";

		if($id !== FALSE){
			$sql .= ' WHERE
					id = ' . $this->db->escape($id);
		}

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	/**
	 * Inserta el formulario que recibe por POST en la BD
	 *
	 * @return BOOLEAN ? inserta : no inserta
	 */
	public function formAdd(){
		$this->load->helper('dates');

		$resul = false;

		$formData = array(
				'titulo' => $this->input->post('titulo')
			, 'datos' => $this->input->post('datos')
			, 'fecha_inicio' => dateConversor('d/m/Y', 'Y-m-d', $this->input->post('f_inicio'))
			, 'fecha_fin' => dateConversor('d/m/Y', 'Y-m-d', $this->input->post('f_fin'))
			, 'descripcion' => $this->input->post('descripcion')
			, 'id_tipos_eventos' => $this->input->post('tipo')
			, 'foto' => null
		);

		/**
		Validación: xss, salto de línea, not NULL, max length

		REDIMENSIONADO DE IMAGENES
		*/

		$photo = $this->uploadPhoto('imagen');

		if($photo){
			$formData['foto'] = $photo;
		}


		$result = $this->db->insert('eventos', $formData);


		return $result;
	}


	// --- PRIVATE ---
	private function uploadPhoto($file){
		$result = FALSE;

		$config['upload_path'] = './img/uploaded/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '12000';
		$config['overwrite'] = false;
		$config['file_name'] = time();

		$this->load->library('upload');
		$this->upload->initialize($config);

		if( $this->upload->do_upload($file) ){
			$result = $this->upload->data()['file_name'];
		}

		return $result;
	}

}
