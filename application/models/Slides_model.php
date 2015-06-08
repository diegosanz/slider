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
	 * Devuelve el evento al que corresponda ese ID
	 *
	 * @param  INT id que se desea buscar, si no se le pasa id devuelve todos los eventos
	 * @return ARRAY con los eventos
	 */
	public function getEvents($id){
		$sql = "SELECT
				id, titulo, datos, descripcion, fecha_inicio, fecha_fin, foto, id_tipos_eventos as tipo
			FROM
				eventos
			WHERE
				id = " . $this->db->escape($id);

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	/**
	 * Extrae la lista de eventos para seleccionarlos en "modificar" y "borrar"
	 *
	 * La lista sólo incluye eventos actuales o futuros
	 *
	 * @return ARRAY lista con los eventos
	 */
	public function getAvailableEvents(){
		$sql = "SELECT
				e.id, e.titulo, t.nombre as tipo, e.fecha_inicio, e.fecha_fin, e.fecha_anadido, e.fecha_modificado
			FROM
				eventos e
					INNER JOIN tipos_eventos t
						ON e.id_tipos_eventos = t.id
			WHERE
				e.fecha_fin >= curdate()
		";

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

		$formData = array(
				'titulo' => $this->input->post('titulo')
			, 'datos' => $this->input->post('datos')
			// , 'fecha_inicio' => dateConversor('d/m/Y', 'Y-m-d', $this->input->post('f_inicio'))
			// , 'fecha_fin' => dateConversor('d/m/Y', 'Y-m-d', $this->input->post('f_fin'))
			, 'fecha_inicio' => $this->input->post('f_inicio')
			, 'fecha_fin' => $this->input->post('f_fin')
			, 'descripcion' => $this->input->post('descripcion')
			, 'id_tipos_eventos' => $this->input->post('tipo')
			, 'foto' => null
			, 'ajuste' => 'default'
		);

		// validacion: trim, not NULL
		foreach ($formData as $key => $value) {
			if($formData[$key] === NULL){
				$formData[$key] = "";
			}else{
				$formData[$key] = trim($formData[$key]);
			}
		}

		// subir la foto
		$photoRoute = $this->config->item('photosRoute');
		$photoInfo = $this->uploadPhoto('imagen', $photoRoute);

		// redimensionar la foto
		if($photoInfo && $this->resizePhoto($photoRoute, $photoInfo['file_name'])){
			$formData['foto'] = $photoInfo['file_name'];

			if($photoInfo['image_width'] > $photoInfo['image_height']){
				$formData['ajuste'] = 'horizontal';
			}else{
				$formData['ajuste'] = 'vertical';
			}
		}
		return $this->db->insert('eventos', $formData);
	}

	public function formModify(){
		$this->load->helper('dates');
		$result = false;

		$id = $this->input->post('id');

		$formData = array(
				'titulo' => $this->input->post('titulo')
			, 'datos' => $this->input->post('datos')
			, 'fecha_inicio' => $this->input->post('f_inicio')
			, 'fecha_fin' => $this->input->post('f_fin')
			, 'descripcion' => $this->input->post('descripcion')
			, 'id_tipos_eventos' => $this->input->post('tipo')
			, 'foto' => null
			, 'ajuste' => 'default'
		);

		// validacion: trim, not NULL
		foreach ($formData as $key => $value) {
			if($formData[$key] === NULL){
				$formData[$key] = "";
			}else{
				$formData[$key] = trim($formData[$key]);
			}
		}

		// subir la foto
		$photoRoute = $this->config->item('photosRoute');
		$photoInfo = $this->uploadPhoto('imagen', $photoRoute);

		// redimensionar la foto
		if($photoInfo && $this->resizePhoto($photoRoute, $photoInfo['file_name'])){
			$formData['foto'] = $photoInfo['file_name'];

			if($photoInfo['image_width'] > $photoInfo['image_height']){
				$formData['ajuste'] = 'horizontal';
			}else{
				$formData['ajuste'] = 'vertical';
			}
		}

		$this->db->where('id', $id);
		$result = $this->db->update('eventos', $formData);

		return $result;
	}


	// --- PRIVATE ---
	private function uploadPhoto($file, $route){
		$result = FALSE;

		$config['upload_path'] = $route;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '12000';
		$config['overwrite'] = false;
		$config['file_name'] = time();

		$this->load->library('upload');
		$this->upload->initialize($config);

		if( $this->upload->do_upload($file) ){
			$result = $this->upload->data();
		}

		return $result;
	}

	/**
	 * Redimensiona la imagen
	 *
	 * @param STRING ruta hacia de la imagen a convertir
	 * @param STRING nombre de la imagen a convertir
	 * @return BOOLEAN resultado de la inserción
	 */
	private function resizePhoto($photoRoute, $photo){
		$config['image_library'] = 'gd2';
		$config['source_image'] = $photoRoute.$photo;
		$config['create_thumb'] = false;
		$config['maintain_ratio'] = true;
		$config['width'] = 1280;
		$config['height'] = 1080;

		$this->load->library('image_lib');
		$this->image_lib->initialize($config);

		$result= $this->image_lib->resize();

		$this->image_lib->clear();
		return $result;
	}
}
