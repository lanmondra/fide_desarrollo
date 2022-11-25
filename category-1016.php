


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
            unset($normativa_archive);

			// Count pagination
			$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$normativa_archive[]"

            $args_normativa_archive = array(
                "post_type" => "post",
                "category__in" => array(1017, 1018, 1019),
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 20,
                "paged" => $paged,
                );                       

            $loop = new WP_Query( $args_normativa_archive );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
					$normativa_archive[] = $post->ID;
                endwhile;

            // ELSE and END IF at the end of the page, after the pagination

        ?>



        <section>
            <div class="grid-container">
                <div class="newsletter-table-title">
                    
                    Últimas normas publicadas

                </div>

                    <?php 

                    	$i = 0;

                    	foreach ($normativa_archive as $post => $post_id) {

                            $normativa_cat = wp_get_post_categories( $post_id, array("include" => array( 1017, 1018, 1019 )));
                            $normativa_cat_01 = get_the_category_by_ID($normativa_cat[0]);
                            if ($normativa_cat_01 === "Normativa estatal") {$normativa_cat_02 = "Estatal";}
                            elseif ($normativa_cat_01 === "Normativa autonómica") {$normativa_cat_02 = "Autonómica";}
                            else {$normativa_cat_02 = "Internacional";}

                            $normativa_date = get_the_date("M. 'y", $normativa_archive[$i]);
                            $normativa_link = get_permalink( $normativa_archive[$i] );

                            print '
                                <div class="grid table-row-padding">
                                    <span class="table-category-link weight600">' . $normativa_cat_02 . '</span>

                                    <div class="table-article-date gray-9">' . $normativa_date . '</div>

                                    <div class="table-article-container">
                                        <a class="table-article-title weight600 red-hover" href="' . esc_url($normativa_link) . '">' . get_the_title($normativa_archive[$i]) . '</a>
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


