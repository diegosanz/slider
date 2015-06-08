<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('default/head');
?>
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
				<form id="form_login" action="<?php echo base_url('login/check') ?>" role="form">
					<div class="form-group form-siamese">
						<input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required autofocus>
						<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Entrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$('form').on('submit', function(event){
			event.preventDefault();
			var thisFrom = $(this);
			$("*[type='submit']", thisFrom).attr("disabled", "disabled");

			var redirect = "<?php
				if($this->session->flashdata('accessAttempt')){
					echo $this->session->flashdata('accessAttempt');
				}else{
					echo base_url('administracion');
				}?>";

			$.ajax({
				type: 'POST'
				, url: $(this).attr('action')
				, data: $(this).serialize()
				, success: function(data){
					if(data.isCorrect === true){
						location.href = redirect;
					}else{
						createAlert(
								'Login incorrecto'
							, 'Compruebe que ha escrito bien su <b>nombre</b> y su <b>contraseña</b>'
							, 'notice'
						);
					}
				}
				, error: function(error){
					createAlertErrorCom();
				}
				, complete: function() {
					$("*[type='submit']", thisFrom).prop("disabled", false);
				}
			});
		});
	</script>
<?php
	$this->load->view('default/footer');
