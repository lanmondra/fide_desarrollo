


<?php get_header(); ?>



    <div class="grid-container">
        <div class="grid">
        	<hr class="generic-hr short-hr-after-breadcrumb">
        </div>
    </div>

    <section>
        <div class="newsletter-head-cta">
            <div class="grid-container">
                <div class="grid">

                    <div class="newsletter-head-cta-image-container">
                        <img src="<?php print IMAGES; ?>/newsletter-fide-section2.png">
                    </div>
                    <hr class="generic-hr mobile-only">
                    <span class="newsletter-head-cta-text px28 ibm-serif">La actualidad legal y tributaria, cada mes en tu email.</span>
                    <br>
                    <a href="https://eepurl.com/gBL4ir" class="newsletter-head-cta-button ibm-sans">SUSCRIBIRME</a>
                
                </div>
            </div>
        </div>
    </section>



	<main>



		<?php

            // Reset the posts_cat array from the previous WP_Query
            unset($newsletter_archive);

			// Count pagination
			$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$posts_cat_archive[]"

            $args_newsletter_archive = array(
                "post_type" => "post",
                "category__in" => 1002,
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 20,
                "paged" => $paged,
                );                       

            $loop = new WP_Query( $args_newsletter_archive );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
					$newsletter_archive[] = $post->ID;
                endwhile;

            // ELSE and END IF at the end of the page, after the pagination

        ?>

        <section>
            <div class="grid-container">
                <div class="newsletter-table-title">
                    
                    <?php
                        $newsletter_counter = get_category(1002)->category_count;
                        print $newsletter_counter . ' newsletters publicadas';
                        if ($loop->max_num_pages != 1) { ?>, página <?php print $paged . ' de ' . $loop->max_num_pages; } else {}
                    ?>

                </div>

                    <?php 

                        $i = 0;

                        foreach ($newsletter_archive as $post => $post_id) {

                            $newsletter_date = get_the_date("M. 'y", $newsletter_archive[$i]);
                            $newsletter_link = get_post_meta( $newsletter_archive[$i], 'link', false );

                            print '
                                <div class="grid table-row-padding">
                                    <span class="table-category-link weight600 table-newsletter">Newsletter</span>

                                    <div class="table-article-date gray-9 table-newsletter-date">' . $newsletter_date . '</div>

                                    <div class="table-article-container table-newsletter-title">
                                        <a class="table-article-title weight600 red-hover" target="_blank" href="' . esc_url($newsletter_link[0]) . '">' . get_the_title($newsletter_archive[$i]) . '</a>
                                    </div>
                                </div>
                            ';

                            if ($i==19) { print '<div class="table-bottom-margin"></div>'; } else { print '<hr class="table-hr-line">';}

                            ++$i;

                        }

                    ?>

            </div>
        </section>

	</main>



    <div class="grid-container">

    	<div class="pagination-margins">
            <div class="grid">

				<?php
					
					// PROVISIONAL PAGINATION

					if ($loop->max_num_pages == 1) {

						// DO NOTHING // DO NOT SHOW PAGINATION AT ALL
					
					} else {

						if ($paged == 1) {
							?><span class="pagination pag-disabled-previous 16px">ANTERIOR</span><?php
						} else {
							?>
								<span class="pag-link-previous 16px">
									<?php previous_posts_link( 'ANTERIOR' ); ?>	
								</span>
							<?php
						}

						?>
						<div class="pagination pag-info 16px">
							PÁGINA <?php print	$paged . ' DE ' . $loop->max_num_pages; ?>
						</div>
						<?php


						if ($paged == $loop->max_num_pages) {
							?><span class="pagination pag-disabled-next 16px">Siguiente</span><?php
						} else {
							?>
								<span class="pag-link-next 16px">
									<?php next_posts_link( 'SIGUIENTE' ); ?>	
								</span>
							<?php
						}
					
					}					
					
					// End of provisional navigation

					// CLOSE THE IF FROM THE TOP OF THE PAGE
					else:
						_e( "" );
					endif;

					wp_reset_postdata(); 

				?>

            </div> <!-- End of grid -->
        </div> <!-- End of container-margin -->
    </div> <!-- End of grid container -->



<?php get_footer(); ?>


