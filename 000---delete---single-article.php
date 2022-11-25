


        <section>
            <div class="grid-container">
                <div class="grid">

                    <div class="post-container">

                        <h1 class="single-h1-title ibm-serif px60 line72"><?php echo get_the_title(); ?></h1>

                        <div class="single-post-details">
                            <span class="post-date weight600"><?php echo get_the_date(); ?></span>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <span class="post-author">Jose Dacosta</span>
                            <!-- &nbsp;&nbsp;|&nbsp;&nbsp; -->
                            <span class="post-read-time">
                                <!-- <img src="<?php # print IMAGES ?>/icons-chrono.svg"> -->
                                <!-- Lectura: 2 min -->
                            </span>
                        </div>

                        <div class="single-post-excerpt px20 line32"><?php echo get_the_excerpt(); ?></div>

                        <div class="single-post-hr-separators">
                            <hr class="generic-hr">
                            <hr class="generic-hr">
                            <hr class="generic-hr">                            
                        </div>

                        <div class="single-post-content px20 line32">
                        
                            <?php

                            // "get_the_content();" should work with no need to call it inside the loop, but it seems to be a bug in the wordpress code (https://core.trac.wordpress.org/ticket/42814) and calling it inside the loop is the suggested fix by now. So...

                            while ( have_posts() ): the_post();
                            echo get_the_content();
                            endwhile;

                            ?>

                        </div>

                        <hr class="generic-hr mobile-hide">

                    </div>

                    <div class="post-sidebar-container">

                        <img class="team-member" src="<?php print IMAGES; ?>/photo-team-00.png">
                        <hr class="generic-hr">
                        <div class="team-member-name px20 weight600">Jose Dacosta</div>

                        <div class="team-member-position gray-9 px16 line24">
                            Departamento jurídico
                            <br><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet urna quis nisi mollis rhoncus tincidunt a risus. Vestibulum varius blandit vehicula. Curabitur id neque auctor, volutpat est ac.
                        </div>

                        <div class="team-member-contact">
                            <a class="team-member-contact px14" href="mailto:info@fide.es">CONTACTAR</a>
                        </div>

                        <hr class="generic-hr short-hr">


                    </div>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->
        </section> <!-- End of section -->


        