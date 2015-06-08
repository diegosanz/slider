<div class="form-group">
	<label for="titulo">Titulo del evento</label>
	<input type="text" name="titulo" id="titulo" class="form-control" data-db-bind="titulo" required autofocus>
</div>

<div class="form-group">
	<label for="tipo">Tipo de evento</label>
	<select id="tipo" name="tipo" class="form-control" data-db-bind="tipo" required>
		<?php
			foreach ($tiposEventos as $evento) {
				echo sprintf('<option value="%d">%s</option>', $evento['id'], $evento['nombre']);
			}
		?>
	</select>
</div>

<div class="form-group">
	<label for="datos">Datos <span class="annotation">(Ubicación, precios, etc.)</span></label>
	<textarea name="datos" id="datos" class="form-control" data-db-bind="datos" required></textarea>
</div>

<div class="form-group">
	<label for="descripcion">Descripción <span class="annotation">(Texto extenso sobre el evento)</span></label>
	<textarea type="text" name="descripcion" id="descripcion" class="form-control" data-db-bind="descripcion" required></textarea>
</div>

<div class="form-group">
	<label for="f_inicio">Fechas en las que se mostrará <span class="annotation">(Inicio - fin)</span></label>
	<div class="input-daterange input-group datepicker">
		<input type="text" class="form-control" id="f_inicio" name="f_inicio" data-db-bind="fecha_inicio" autocomplete="off" required />
		<span class="input-group-addon"> - </span>
		<input type="text" class="form-control" id="f_fin" name="f_fin" data-db-bind="fecha_fin" autocomplete="off" required />
	</div>
</div>

<div class="form-group">
	<label for="imagen">Imagen <span class="annotation">(Formatos: JPG, PNG o GIF. Tamaño máximo: 10Mb)</span></label>
	<div class="info-foto"></div>
	<input type="file" name="imagen" id="imagen" class="form-control">
</div>
