<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
	/**
	 * Inicia la sesión del usuario si los datos son correctos
	 *
	 * @param  STRING nombre del usuario (trimmed y lowercase)
	 * @param  STRING contraseña resultante de: sha1(<contraseña> . SALT)
	 * @return BOOLEAN true = ha iniciado sesión, false = no ha iniciado sesion
	 */
	public function openSession($user, $pass){
		$response = false;
		$sql = "SELECT
			id, nombre
		FROM
			usuarios
		WHERE
			nombre = " . $this->db->escape($user) . "
			AND pass = " . $this->db->escape($pass);

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			$data = array(
				'username' => $user
			);
			$this->session->set_userdata($data);

			$response = true;
		}

		return $response;
	}
}
