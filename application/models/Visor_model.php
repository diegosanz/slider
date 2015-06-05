<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Visor_model extends CI_Model {

	/**
	 * Devuelve el listado de los eventos que hay publicados en este momento
	 *
	 * @return ARRAY con los eventos
	 */
	public function getActualSlides(){
		$sql = "SELECT
				titulo, datos, descripcion, tipo, foto, ajuste
			FROM
				eventos_actuales
			";

		$query = $this->db->query($sql);

		return $query->result_array();
	}
}
