/**
 * Añade al objeto String el método format
 *
 * Uso:
 *	"Hola {0}, que tal {1}".format("pepe", "estás");
 * Produce:
 *	"Hola pepe, que tal estás"
 */
// if (!String.format) {
// 	String.prototype.format = function() {
// 		var formatted = this;
// 		for (var i = 0; i < arguments.length; i++) {
// 			var regexp = new RegExp('\\{'+i+'\\}', 'gi');
// 			formatted = formatted.replace(regexp, arguments[i]);
// 		}
// 		return formatted;
// 	};
// }

/**
 * Reemplaza todas las ocurrencias en una cadena
 *
 * @param STRING cadena de texto origen en la que se va a buscar
 * @param STRING cadena de texto que se va a buscar por la que se sustituirá el "replace"
 * @param STRING cadena de texto por la que se va a sustituir el "find"
 * @returns void
 */
function replaceAll(str, find, replace) {
	return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

/**
 * Escapa los carecteres para RegExp
 *
 * @param STRING cadena que queremos escapar
 * @returns STRING cadena escapada
 */
function escapeRegExp(string) {
	return string.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}

/**
 * Crea una alerta de PNotify
 *
 * @param STRING título de la alerta
 * @param STRING texto de la alerta
 * @param STRING tipo de la alerta. Disponibles: notice (naranja), success (verde), error (rojo), info (azul)
 * @returns void
 */
var createAlert = function(title, text, type){
	$(function(){
		new PNotify({
			title: title
			, text: text
			, type: type
		});
	});
}

/**
 * Crea una alerta con un mensaje predefinido de error de comuniacación con el servidor
 *
 * Esta función es llamada cuando el servidor responde con un error en la petición (404, 500, etc)
 */
var createAlertErrorCom = function(){
	createAlert(
			'Error de comunicación con el servidor'
		, 'Inténtelo de nuevo pasados unos segundos. Si el error persiste contacte con el servicio técnico.'
		, 'error'
	);
}
