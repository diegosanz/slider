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

	public function listIds(){
		$result = false;

		$sql = "SELECT
				GROUP_CONCAT( fecha_modificado ) AS clave
			FROM
				eventos
			ORDER BY
				1
		";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			$result = $query->result_array()[0]['clave'];
		}

		return $result;
	}
}
