<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Visor_model extends CI_Model {

	/**
	 * Devuelve un array con el listado de los eventos
	 *
	 * @return ARRAY con los eventos
	 */
	public function getSlides(){
		$sql = "SELECT
				titulo, datos, descripcion, tipo, foto, ajuste
			FROM
				eventos_actuales
			";

		$query = $this->db->query($sql);

		return $query->result_array();
	}
}
