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
	<table class="table table-hover table-striped datatable">
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
			<?php
				$struct = '<tr data-id="%d" class="selectable-tr">
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
				</tr>';

				foreach ($eventsList as $event) {
					echo sprintf(
							$struct
						, $event['id']
						, $event['titulo']
						, $event['tipo']
						, $event['fecha_inicio']
						, $event['fecha_fin']
						, $event['fecha_anadido']
						, $event['fecha_modificado']
					);
				}
			?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modificar</h4>
			</div>
			<div class="modal-body">
				<form >
					<?php $this->load->view('administracion/event_form') ?>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(window).on('load', function(){
		// dataTables
		$('.datatable').dataTable( {
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

		// disparador datepicker
		$('.datepicker').datepicker({
					language: "es"
				, todayHighlight: true
		});

		// ventana modal
		$('.selectable-tr').on('click', function(){
			// pasos:
			// 1. pedir ajax
			// 2. success: reemplazar en la modal, error: alerta
			// 3. mostrar modal

			var id = $(this).data('id');
			var modal = $('#modify-modal');

			$.ajax({
					type: 'POST'
				, url: '<?php echo base_url('administracion/get_event') ?>/' + id
				, success: function(data){
						// campos de texto
						$('input, textarea', modal).each(function(){

						});

						// select
						$('select', modal).each(function(){
							$("option[value="+ valor +"]", this).attr("selected", true);
						});
					}
				, error: function(error){
						createAlert(
								'Error de comunicación con el servidor'
							, 'Inténtelo de nuevo pasados unos segundos. Si el error persiste contacte con el servicio técnico.'
							, 'error'
						);
					}
			});

			modal.modal('show');
		});
	});
</script>
<?php
	$this->load->view('administracion/view_close');
	$this->load->view('default/footer');
