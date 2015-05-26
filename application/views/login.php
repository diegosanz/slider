<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
	<title>Login</title>
<?php
	$this->load->view('default/body');
?>
	<div class="container">
		<div class="wrapper-form center-block">
			<h1>Login</h1>
			<p>
				Entrada al panel de administración.
			</p>
			<form id="form_login" action="<?php echo base_url('login/check') ?>">
				<div class="form-group form-siamese">
					<input type="text" class="form-control" required="required" placeholder="Usuario" autocomplete="off">
					<input type="password" class="form-control" required="required" placeholder="Contraseña">
				</div>
				<button type="submit" class="btn btn-block btn-primary">Entrar</button>
			</form>
		</div>
	</div>
<?php
	$this->load->view('default/footer');
