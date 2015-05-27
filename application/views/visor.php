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
	<script src="<?php echo base_url('js/swiper.jquery.min.js') ?>"></script>
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
				<!-- <div class="swiper-slide" style="background: blue;"><h1>1</h1></div>
				<div class="swiper-slide" style="background: orange;"><h1>2</h1></div>
				<div class="swiper-slide" style="background: pink;"><h1>3</h1></div> -->
		</div>

		<div class="swiper-pagination"></div>

		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

		<div class="swiper-scrollbar"></div>
	</div>
</body>
</html>
