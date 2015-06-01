<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
	<script type="text/javascript" src="<?php echo base_url('moment.js') ?>"></script>
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
					<label for="descripcion">Descripción </label>
					<textarea type="text" name="descripcion" id="descripcion" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<label for="f_inicio">Fecha inicio <span class="annotation">(Fecha desde la que se empezará a motrar en la presentación)</label>
					<input type="text" name="f_inicio" id="f_inicio" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="f_fin">Fecha fin <span class="annotation">(Fecha a partir de la cual dejará de mostrarse en la presentación)</label>
					<input type="text" name="f_fin" id="f_fin" class="form-control" required>
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
<?php
	$this->load->view('administracion/view_close');
	$this->load->view('default/footer');
