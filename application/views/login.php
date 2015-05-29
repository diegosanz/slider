<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
	<link rel="stylesheet" href="<?php echo base_url('css/login.css'); ?>">
	<title>Login</title>
<?php
	$this->load->view('default/body');
?>
	<div class="container">
		<div class="wrapper-form center-block login-container">
				<h1>Login</h1>
			<div class="well">
				<p>
					Entrada al panel de administración.
				</p>
				<form id="form_login" action="<?php echo base_url('login/check') ?>">
					<div class="form-group form-siamese">
						<input type="text" class="form-control" required="required" placeholder="Usuario" autocomplete="off">
						<input type="password" class="form-control" required="required" placeholder="Contraseña">
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Entrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
	$this->load->view('default/footer');
