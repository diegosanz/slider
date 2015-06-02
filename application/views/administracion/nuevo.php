<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
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
			<form action="<?php echo base_url('administracion/add') ?>" class="wrapper-form center-block">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control" required>
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
					<label for="f_inicio">Fechas</label>
					<div class="input-daterange input-group datepicker">
						<input type="text" class="form-control" name="f_inicio" required />
						<span class="input-group-addon"> - </span>
						<input type="text" class="form-control" name="f_fin" required />
					</div>
				</div>

				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen" id="imagen" class="form-control">
				</div>

				<button type="submit" class="btn btn-primary">
					<i class="fa fa-floppy-o"></i> Guardar
				</button>
			</form>
		</div>

<script>
	$(window).on('load', function(){
		// disparador datepicker
		$('.datepicker').datepicker({
				language: "es"
		});
	});
</script>
<?php
	$this->load->view('administracion/view_close');
	$this->load->view('default/footer');
