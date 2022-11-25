


<?php get_header(); ?>



    <section>

        <div class="grid-container">
            <div class="grid">
                <hr class="generic-hr short-hr-after-breadcrumb">
            </div>
        </div>

        <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="grid-container">
                <div class="grid">
                    <input type="search" id="<?php echo $unique_id; ?>" class="search-input" placeholder="Buscar en fide.es..." value="" name="s" spellcheck="false" autocomplete="off"/>
                    <input type="submit" id="searchsubmit" value="BUSCAR"/>
                </div>
            </div>
        </form>

    </section>



	<main>



		<?php

            // Reset the posts_cat array from the previous WP_Query
            unset($noticias_archive);

			// Count pagination
			$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$noticias_archive[]"

            $args_noticias_archive = array(
                "post_type" => "post",
                "category__in" => 1012,
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 20,
                "paged" => $paged,
                );                       

            $loop = new WP_Query( $args_noticias_archive );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
					$noticias_archive[] = $post->ID;
                endwhile;

            // ELSE and END IF at the end of the page, after the pagination

        ?>



        <section>
            <div class="grid-container">
                <div class="newsletter-table-title">
                    
                    Selección de noticias

                </div>

                    <?php 

                    	$i = 0;

                    	foreach ($noticias_archive as $post => $post_id) {

                            $noticias_medio = get_post_meta( $noticias_archive[$i], 'medio', false );
                            $noticias_date = get_the_date("M. 'y", $noticias_archive[$i]);
                            $noticias_link = get_post_meta( $noticias_archive[$i], 'link', false );

                            print '
                                <div class="grid table-row-padding">
                                    <span class="table-category-link weight600">' . $noticias_medio[0] . '</span>

                                    <div class="table-article-date gray-9">' . $noticias_date . '</div>

                                    <div class="table-article-container">
                                        <a class="table-article-title weight600 red-hover" target="_blank" href="' . esc_url($noticias_link[0]) . '">' . get_the_title($noticias_archive[$i]) . '</a>
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


