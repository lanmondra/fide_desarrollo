<?php /* Template Name: Contacto */ ?>



<?php get_header(); ?>



    <main>



        <div class="grid-container">
            <div class="grid">
                <hr class="generic-hr short-hr-after-breadcrumb">
            </div>
        </div>



        <section>
            <div class="grid-container">
                <div class="grid">



					<div class="contact-form-container">
						<p class="px20 line36">Por favor, rellene el siguiente formulario:</p>
					    <?php echo do_shortcode("[contact]"); ?>
					</div>



					<div class="address-bcn-container">
						<p class="px20 line36"><b>Barcelona</b></p>
						<div class="map-img-container">
							<a class="crop" href="https://goo.gl/maps/GGf24Eyy9PFVu2y86" target="_blank">
								<img class="cropped" src="<?php print IMAGES; ?>/fide-mapa-bcn-2x.jpg">
							</a>
						</div>
						<a href="https://goo.gl/maps/GGf24Eyy9PFVu2y86" class="google-maps-button px14" target="_blank">VER EN GOOGLE MAPS</a>
						<span class="cf-address">
							Rambla Cataluña 38, 7ª<br>
							08007 Barcelona<br>
							Tel. 934 883 600
						</span>
					</div>

					<div class="address-mad-container">
						<p class="px20 line36"><b>Madrid</b></p>
						<div class="map-img-container">
							<a class="crop" href="https://goo.gl/maps/xBBFuPi1tEt4KyeR7" target="_blank">
								<img class="cropped" src="<?php print IMAGES; ?>/fide-mapa-mad2-2x.jpg">
							</a>
						</div>						
						<a href="https://goo.gl/maps/xBBFuPi1tEt4KyeR7" class="google-maps-button px14" target="_blank">VER EN GOOGLE MAPS</a>
						<span class="cf-address">
							C/ Guzmán el Bueno 74, 1º<br>
							28015 Madrid<br>
							Tel. 910 851 756
						</span>

					</div>
					<!-- NUEVA DIRRECION SANTIAGO -->
               
					<div class="address-sant-container">
						<p class="px20 line36"><b>Santiago</b></p>
						<div class="map-img-container">
							<a class="crop" href="https://goo.gl/maps/QcebDKxWbW7mUjMEA" target="_blank">
								<img class="cropped" src="<?php print IMAGES; ?>/fide-mapa-sant-2x.jpg">
							</a>
						</div>						
						<a href="https://goo.gl/maps/QcebDKxWbW7mUjMEA" class="google-maps-button px14" target="_blank">VER EN GOOGLE MAPS</a>
						<span class="cf-address">
							Av. de Montevideo 1, 1º<br>
							15706 Santiago de Compostela<br>
							Tel. 881 949 803
						</span>

					</div>
					
					

                </div>
            </div>
        </section>



<?php get_footer(); ?>


