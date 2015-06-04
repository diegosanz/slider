<?php
/**
 * Convierte los saltos de línea en etiquetas <br>
 *
 * @param  STRING / ARRAY cadena a convertir o si es array hace una ejecución recursiva
 * @return STRING con los saltos convertidos
 */
function convertLineBreak($text){
	if(is_array($text)){
		foreach ($text as $key => $value) {
			$text[$key] = convertLineBreak($value);
		}
	}else{
		$text = str_replace("\n", "<br>", $text);
	}
	return $text;
}
