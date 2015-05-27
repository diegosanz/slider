<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
	$this->load->view('default/body');
?>
	<div class="container">
		<h1>Panel de administración</h1>
		<p>
			Desde aquí puedes añadir, configurar y modificar las páginas de la presentación.
		</p>

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="addEntry">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAddEntry" aria-expanded="false" aria-controls="collapseAddEntry">
							<i class="fa fa-fw fa-plus-square-o"></i>
							Añadir ficha
						</a>
					</h4>
				</div>
				<div id="collapseAddEntry" class="panel-collapse" role="tabpanel" aria-labelledby="addEntry">
					<div class="panel-body">

						<form class="wrapper-form center-block">
							<div class="form-group">
								<label> Titulo </label>
									<input type="text" class="form-control" required="required">
							</div>

							<div class="form-group">
								<label> Fecha de inicio
									<span class="annotation"> (no se mostrará)<span>
								</label>
									<input type="text" class="form-control" required="required">
							</div>

							<div class="form-group">
								<label>Fecha de fin</label>
								<input type="text" name="date-fin" id="date-fin" class="form-control">
							</div>

						</form>

					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="modifyEntry">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseModifyEntry" aria-expanded="false" aria-controls="collapseModifyEntry">
							<i class="fa fa-fw fa-pencil-square-o"></i>
							Modificar ficha
						</a>
					</h4>
				</div>
				<div id="collapseModifyEntry" class="panel-collapse collapse" role="tabpanel" aria-labelledby="modifyEntry">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="orderEntry">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOrderEntry" aria-expanded="false" aria-controls="collapseOrderEntry">
							<i class="fa fa-fw fa-sort"></i>
							Ordenar fichas
						</a>
					</h4>
				</div>
				<div id="collapseOrderEntry" class="panel-collapse collapse" role="tabpanel" aria-labelledby="orderEntry">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="deleteEntry">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseDeleteEntry" aria-expanded="false" aria-controls="collapseDeleteEntry">
							<i class="fa fa-fw fa-minus-square-o"></i>
							Borrar fichas
						</a>
					</h4>
				</div>
				<div id="collapseDeleteEntry" class="panel-collapse collapse" role="tabpanel" aria-labelledby="deleteEntry">
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>
		</div>

	</div>
<?php
	$this->load->view('default/footer');
