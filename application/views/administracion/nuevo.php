<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
	<title>Nuevo evento</title>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-datepicker3.min.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('js/bs-datepicker/bootstrap-datepicker.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bs-datepicker/bootstrap-datepicker.es.min.js') ?>"></script>
<?php
	$this->load->view('default/body');

	$this->load->view('administracion/view_open');
?>
		<div class="panel-heading">Añadir nuevo evento</div>
		<div class="panel-body">
			<p>
				Permite añadir nuevos eventos. Cada evento aparecerá automáticamente en la presentación en el rango de fechas configurado (ambas fechas incluidas).
			</p>
			<form action="<?php echo base_url('administracion/formAdd') ?>" class="wrapper-form center-block" id="formAdd" enctype="multipart/form-data">
				<div class="form-group">
					<label for="titulo">Titulo del evento</label>
					<input type="text" name="titulo" id="titulo" class="form-control" required autofocus>
				</div>

				<div class="form-group">
					<label for="tipo">Tipo de evento</label>
					<select id="tipo" name="tipo" class="form-control" required>
						<?php
							foreach ($tiposEventos as $evento) {
								echo sprintf('<option value="%d">%s</option>', $evento['id'], $evento['nombre']);
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="datos">Datos <span class="annotation">(Ubicación, precios, etc.)</span></label>
					<textarea name="datos" id="datos" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<label for="descripcion">Descripción <span class="annotation">(Texto extenso sobre el evento)</span></label>
					<textarea type="text" name="descripcion" id="descripcion" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<label for="f_inicio">Fechas <span class="annotation">(Inicio - fin)</span></label>
					<div class="input-daterange input-group datepicker">
						<input type="text" class="form-control" name="f_inicio" required />
						<span class="input-group-addon"> - </span>
						<input type="text" class="form-control" name="f_fin" required />
					</div>
				</div>

				<div class="form-group">
					<label for="imagen">Imagen <span class="annotation">(Formatos: JPG, PNG o GIF. Tamaño máximo: 10Mb)</span></label>
					<input type="file" name="imagen" id="imagen" class="form-control">
				</div>

				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>

<script>
	$(window).on('load', function(){
		// disparador datepicker
		$('.datepicker').datepicker({
				language: "es"
				, todayHighlight: true
		});

		// submit del formulario
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
							thisForm[0].reset();
							$(".datepicker").datepicker('clearDates');
							createAlert(
								'Guardado'
							, 'El evento se ha guardado correctamente.'
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
						createAlert(
								'Error de comunicación con el servidor'
							, 'Inténtelo de nuevo pasados unos segundos. Si el error persiste contacte con el servicio técnico.'
							, 'error'
						);
					}
				, complete: function() {
						$("*[type='submit']", thisForm).prop("disabled", false);
					}
			});
		});
	});
</script>
<?php
	$this->load->view('administracion/view_close');
	$this->load->view('default/footer');
