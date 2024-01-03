 


        <?php if (

            is_front_page() or 
            is_page( array( 'actualidad', 'newsletter', 'contacto' )) or 
            is_single() or
            is_category ()

        ){
        
            print '

                <section class="non-printable">
                    <div class="newsletter-cta">
                        <div class="grid-container">

                            <div class="newsletter-cta-content">
                                <span class="newsletter-cta-text ibm-serif weight600">Recibe nuestra newsletter mensual</span>
                                <br>
                                <a href="https://eepurl.com/gBL4ir" class="newsletter-cta-button ibm-sans">SUSCRIBIRME</a>
                            </div>

                        </div>
                    </div>
                </section>

            ';

        } elseif (

            is_category( array( 'alcohol', 'cerveza', 'vino' ) )) {
            print '

                <section class="non-printable">
                    <div class="alcohol-cta">
                        <div class="grid-container">
                            <div class="grid">

                                <div class="cta-image-container">
                                    <img class="cta-image-container-img" src="'. IMAGES . '/fide-alcohol-bebidas-s.png">
                                </div>
                                <span class="alcohol-cta-text px28 ibm-serif weight600">Líderes en Impuestos Especiales<br>¿Cómo podemos ayudarte?</span>
                                <br>
                                <a href="https://www.fide.es/alcohol-y-bebidas-alcoholicas" class="alcohol-cta-button ibm-sans">VER ESPECIALIDAD</a>
                            
                            </div>
                        </div>
                    </div>
                </section>

            ';
        } ?>


        <footer class="unselectable">

            <hr class="footer-hr-line">
            <div class="grid-container">

                <div class="grid">
                
                    <div class="footer-fide-logo">
                        <a href="<?php echo site_url(); ?>" title="fide.es - Inicio">
                            <img src="<?php print IMAGES; ?>/fide-logo-tax.svg" alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div>

                    <div class="footer-sections">
                        <ul>
                            <li><a href="<?php echo site_url(); ?>/actualidad">Actualidad</a></li>
                            <li><a href="<?php echo site_url(); ?>/servicios">Servicios</a></li>
                            <li><a href="<?php echo site_url(); ?>/especialidades">Especialidades</a></li>
                            <li><a href="<?php echo site_url(); ?>/contacto">Contacto</a></li>
                        </ul>
                    </div>

                    <div class="address address-barcelona">
                        <p class="footer-city weight600">Barcelona</p>
                        <p class="footer-city-address gray-9">
                            Rambla Cataluña 38, 7ª<br>
                            08007 Barcelona<br>
                            Tel. 934 883 600<br>
                            
                        </p>
                    </div>

                    <div class="address address-madrid">
                        <p class="footer-city weight600">Madrid</p>
                        <p class="footer-city-address gray-9">
                            C/ Guzmán el Bueno 74, 1º<br>
                            28015 Madrid<br>
                            Tel. 910 851 756
                        </p>
                    </div>
					<!-- NUEVA DIRECCION VIGO  -->
					
                       <div class="address address-santiago">
                        <p class="footer-city weight600">Vigo</p>
                        <p class="footer-city-address gray-9">
                            C/ Marqués de Valladares 14, 6ª Oficinas 7 y 8<br>
                            36201 Vigo<br>
                            Tel. 886 035 929
                        </p>
                    </div>
                  
				  
                </div>

            </div>

            <div class="footer-gray-band gray-9">
                <div class="grid-container">

                    <div class="footer-credits">
                        Copyright © <?php echo date('Y'); ?> FIDE
                    </div>

                    <div class="footer-links-container">
                        <ul class="footer-links">
                            <!-- <li><a href="<?php # echo site_url(); ?>/politica-de-privacidad">Política de privacidad</a></li> -->
                            <!-- <li><a href="<?php # echo site_url(); ?>/politica-de-cookies">Política de cookies</a></li> -->
                            <li><a href="<?php echo site_url(); ?>/aviso-legal">Aviso legal</a></li>
                        </ul>
                        <ul class="footer-links-social">
<li><a href="https://www.linkedin.com/company/fidetaxlegal" target="_blank"><img class="footer-social-icon" src="<?php print IMAGES; ?>/icons-linkedin.svg"></a></li>
<li><a href="https://twitter.com/fidetax_legal" target="_blank"><img class="footer-social-icon" src="<?php print IMAGES; ?>/icons-twitter.svg"></a></li>
<li><a href="https://www.youtube.com/channel/UCpYYQd3LNiO3lwTdfd9hXiA" target="_blank"><img class="footer-social-icon" src="<?php print IMAGES; ?>/icons-youtube.svg"></a></li>
                        </ul>
                    </div>
            
                </div>
            </div>

        </footer>



    </main>

        

        <?php wp_footer(); ?>

        <!-- Loading JavaScript here to be sure that every element is loaded, and only then the theme JS file can act on it -->
	    <script src="<?php print TEMPPATH; ?>/js/script.js?v=002" type="text/javascript"></script>



</body>



</html>


