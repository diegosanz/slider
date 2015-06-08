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

		// ventana modal
		$('#datatable-container').on('click', '.selectable-tr', function(){
			// pasos:
			// 1. pedir ajax
			// 2. success: reemplazar en la modal, error: alerta
			// 3. mostrar modal

			var id = $(this).data('id');

			(new PNotify({
				title: '¿Está seguro de que quiere borrar esta entrada?',
				text: 'Las entradas borradas no se podrán recuperar',
				icon: 'glyphicon glyphicon-question-sign',
				hide: false,
				type: 'info',
				confirm: {
					confirm: true
				},
				buttons: {
					closer: false,
					sticker: false
				},
				history: {
					history: false
				}
			})).get().on('pnotify.confirm', function() {
				alert('Ok, cool.');
			}).on('pnotify.cancel', function() {
				alert('Oh ok. Chicken, I see.');
			});


		});
	});
</script>
<?php
	$this->load->view('administracion/view_close');
	$this->load->view('default/footer');
