<?php
	/**
	 * Convierte una fecha de formato de un formato a otro
	 *
	 * Conviene tener cuidado con el separador de las fechas
	 *
	 * @param  STRING formato en el que está la fecha de entrada
	 * @param  STRING formato en el que se quiere la fecha de salida
	 * @param  STRING fecha a convertir
	 * @return STRING fecha convertida
	 */
	function dateConversor($inputDate, $outputDate, $date){
		$result = false;
		$date = DateTime::createFromFormat($inputDate, $date);
		if($date !== false){
			$result = $date->format($outputDate);
		}
		return $result;
	}
