<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang='es' xml:lang='es' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Turismo Soria</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/swiper.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/visor.css') ?>">
	<script src="<?php echo base_url('js/jquery-2.1.4.min.js') ?>"></script>
	<script src="<?php echo base_url('js/swiper/swiper.jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('js/visor.js') ?>"></script>
</head>
<body>
	<div class="swiper-container">
		<div class="swiper-wrapper">
				<?php
					foreach ($arrSlides as $slide) {
						$this->load->view('slide', $slide);
					}
				?>
		</div>

		<div class="swiper-pagination"></div>

		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

		<div class="swiper-scrollbar"></div>
	</div>
<script>
// comprobar actualizaciones
$(function(){
	var timeout = <?php echo $timeout ?>;
	var clave = "<?php echo $clave ?>";
	var temporizador = window.setInterval(function(){
		$.ajax({
			type: 'POST'
			, url: '<?php echo base_url('visor/checkUpdates') ?>'
			, data: $(this).serialize()
			, success: function(data){
				// evitar la primera ejecución al cargar la página
				if(clave !== data.clave){
					location.reload(true);
				}
			}
		});
	}, timeout);
});
</script>
</body>
</html>
