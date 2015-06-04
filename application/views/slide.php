<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="swiper-slide">
	<div class="row-full-height">
		<div class="col-md-4 col-full-height panel-info <?php echo $tipo; ?>">
			<section class="header">
				<div class="hoyensoria">
					<h1 class="hoyen">
						HOY EN
							<span class="soria">
								SORIA
							</span>
					</h1>
				</div>
				<div class="img-type-container">
					<div class="img-type"></div>
				</div>
			</section>

			<section>
				<h2 class="title">
					<?php echo $titulo ?>
				</h2>
				<p class="datos">
					<?php echo $datos ?>
				</p>
				<p class="descripcion">
					<?php echo $descripcion ?>
				</p>
			</section>

			<section class="img-footer">
				<img class="footer-ayto" src="<?php echo 'img/ayto.png' ?>">
				<img class="footer-soria" src="<?php echo 'img/soria.png' ?>">
			</section>
		</div>
		<div class="col-md-8 photo-column">
			<?php
				if( ! $foto){
					$foto = base_url('/img/slides_default/'. $tipo .'.jpg');
				}else{
					$foto = base_url($this->config->item('photosRoute') . $foto);
				}
			?>
			<!-- <img src="<?php echo $foto ?>" class="img-principal <?php echo $ajuste ?>"> -->
			<div class="photo-container">
				<div class="photo-background <?php echo $ajuste ?>" style="background-image: url('<?php echo $foto ?>');">
					&nbsp;
				</div>
				<div class="photo-main <?php echo $ajuste ?>" style="background-image: url('<?php echo $foto ?>');">
					&nbsp;
				</div>
			</div>
		</div>
	</div>
</div>
