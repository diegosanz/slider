<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
	<title>Modificar evento</title>
	<link rel="stylesheet" href="<?php echo base_url('css/dataTables.bootstrap.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.dataTables.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/dataTables.bootstrap.js') ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-datepicker3.min.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('js/bs-datepicker/bootstrap-datepicker.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bs-datepicker/bootstrap-datepicker.es.min.js') ?>"></script>

<?php
	$this->load->view('default/body');

	$this->load->view('administracion/view_open');
?>
<div class="panel-heading">Modificar evento</div>
<div class="panel-body">
	<p>
		Desde aquí puedes modificar un evento ya creado. Sólo se muestran eventos cuya fecha de finalización es igual o posterior a la fecha actual.
	</p>
	<hr>
	<div id="datatable-container">
		<table class="table table-hover table-striped datatable" id="events-list">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Tipo</th>
					<th>Fecha inicio</th>
					<th>Fecha fin</th>
					<th>Fecha añadido</th>
					<th>Fecha modificación</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<form action="<?php echo base_url('administracion/formModify') ?>" id="formModify" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Modificar</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" data-db-bind="id">
					<?php $this->load->view('administracion/event_form') ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	var reloadTable = function(){
		$.ajax({
			type: 'POST'
			, url: '<?php echo base_url('administracion/get_avalilable_events') ?>'
			, beforeSend: function(){
					$("#datatable-container").html('<table class="table table-hover table-striped datatable" id="events-list"> <thead> <tr> <th>Titulo</th> <th>Tipo</th> <th>Fecha inicio</th> <th>Fecha fin</th> <th>Fecha añadido</th> <th>Fecha modificación</th> </tr> </thead> <tbody> </tbody> </table>');
				}
			, success: function(data){
					var html = "";
					var tr = "";
					var struct = '<tr data-id="{id}" class="selectable-tr"><td>{titulo}</td><td>{tipo}</td><td>{fecha_inicio}</td><td>{fecha_fin}</td><td>{fecha_anadido}</td><td>{fecha_modificado}</td></tr>';
					for (var fila in data) {
						tr = struct;
						for(var col in data[fila]){
							tr = replaceAll(tr, '{'+col+'}', data[fila][col]);
						}
						html += tr;
					}

					$('#events-list tbody').html(html);
				}
			, error: function(error){
					createAlertErrorCom();
				}
			, complete: function(){
				// llamada a dataTables
				$('.datatable').dataTable( {
					destroy: true,
					language: {
						"processing": "Procesando...",
						"lengthMenu": "Mostrar _MENU_ registros",
						"zeroRecords": "No se encontraron resultados",
						"emptyTable": "No hay datos que mostrar",
						"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						"infoEmpty": "",
						"infoFiltered": "(filtrado de un total de _MAX_ registros)",
						"infoPostFix": "",
						"search": "Buscar: ",
						"url": "",
						"infoThousands": ",",
						"loadingRecords": "Cargando...",
						paginate: {
							"first": "Primero",
							"last": "Último",
							"next": "Siguiente",
							"previous": "Anterior"
						},
						"aria": {
							"sortAscending": ": Activar para ordenar la columna de manera ascendente",
							"sortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					}
				} );
			}
		});
	}

	$(window).on('load', function(){
		// cargar la tabla
		reloadTable();

		// dataTables
		// $('.datatable').dataTable( {
		// 	language: {
		// 		"processing": "Procesando...",
		// 		"lengthMenu": "Mostrar _MENU_ registros",
		// 		"zeroRecords": "No se encontraron resultados",
		// 		"emptyTable": "No hay datos que mostrar",
		// 		"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		// 		"infoEmpty": "",
		// 		"infoFiltered": "(filtrado de un total de _MAX_ registros)",
		// 		"infoPostFix": "",
		// 		"search": "Buscar: ",
		// 		"url": "",
		// 		"infoThousands": ",",
		// 		"loadingRecords": "Cargando...",
		// 		paginate: {
		// 			"first": "Primero",
		// 			"last": "Último",
		// 			"next": "Siguiente",
		// 			"previous": "Anterior"
		// 		},
		// 		"aria": {
		// 			"sortAscending": ": Activar para ordenar la columna de manera ascendente",
		// 			"sortDescending": ": Activar para ordenar la columna de manera descendente"
		// 		}
		// 	}
		// } );

		// disparador datepicker
		$('.datepicker').datepicker({
					language: "es"
				, todayHighlight: true
				, format: "yyyy-mm-dd"
		});

		// ventana modal
		$('#datatable-container').on('click', '.selectable-tr', function(){
			// pasos:
			// 1. pedir ajax
			// 2. success: reemplazar en la modal, error: alerta
			// 3. mostrar modal

			var id = $(this).data('id');
			var modal = $('#modify-modal');
			var photosRoute = "<?php echo base_url($this->config->item('photosRoute')); ?>";

			$.ajax({
					type: 'POST'
				, url: '<?php echo base_url('administracion/get_event') ?>/' + id
				, success: function(data){
						data = data[0];

						// campos de texto
						$('input[data-db-bind]', modal).each(function(){
							$(this).val( data[ $(this).data('db-bind') ] );
						});

						// textarea
						$('textarea[data-db-bind]', modal).each(function(){
							$(this).html( data[ $(this).data('db-bind') ] );
						});

						// select
						$('select', modal).each(function(){
							var bind = $(this).data('db-bind');
							var value = data[bind];

							$('option[value='+ value +']', 'select[data-db-bind='+ bind +']').attr("selected", "selected");
							// $("option[value="+ $(this).data('db-bind') +"]", this).attr("selected", true);
						});

						// reseteo datepicker
						$('#f_inicio').datepicker('update', $('#f_inicio').val());
						$('#f_fin').datepicker('update', $('#f_fin').val());

						// info de la foto
						if(data.foto){
							$('.info-foto').html('<div class="well"><img src="'+  photosRoute + '/' + data.foto + '"></img></div><p>Seleccione otra foto para sustituirla:</p>')
						}else{
							$('.info-foto').html('');
						}
					}
				, error: function(error){
						createAlertErrorCom();
					}
				, complete: function(){
						modal.modal('show');
					}
			});
		});

		// limpiar al ocultar ventana modal
		$('#modify-modal').on('hide.bs.modal', function (e) {
			$('option', $(this)).attr("selected", false);
			$('select').each(function(){
				$(this).html( $(this).html() );
			});
			$('form', $(this))[0].reset();
			$('.datepicker input', $(this)).datepicker('clearDates');
		});

		// enviar el formulario
		$('form').on('submit', function(event){
			event.preventDefault();
			$("*[type='submit']", thisForm).attr("disabled", "disabled");

			var thisForm = $(this);
			var formData = new FormData(thisForm[0]);
			formData.append('imagen', $("#imagen")[0].files[0]);

			$.ajax({
					type: 'POST'
				, url: thisForm.attr('action')
				, data: formData
				, cache: false
				, contentType: false
				, processData: false
				, success: function(data){
						if(data.isCorrect === true){
							createAlert(
								'Guardado'
							, 'El evento se ha modificado correctamente.'
							, 'success'
							);
						}else{
							createAlert(
								'Error'
							, 'El formulario no era correcto'
							, 'warning'
							);
						}
					}
				, error: function(error){
						createAlertErrorCom();
					}
				, complete: function() {
						reloadTable();
						$('#modify-modal').modal('hide');
						$("*[type='submit']", thisForm).prop("disabled", false);
					}
			});
		});
	});
</script>
<?php
	$this->load->view('administracion/view_close');
	$this->load->view('default/footer');
