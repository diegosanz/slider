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
