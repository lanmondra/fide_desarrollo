


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
            unset($notainformativa_archive);

			// Count pagination
			$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$notainformativa_archive[]"

            $args_notainformativa_archive = array(
                "post_type" => "post",
                "category__in" => array(1004),
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 20,
                "paged" => $paged,
                );                       

            $loop = new WP_Query( $args_notainformativa_archive );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
					$notainformativa_archive[] = $post->ID;
                endwhile;

            // ELSE and END IF at the end of the page, after the pagination

        ?>



        <section>
            <div class="grid-container">
                <div class="newsletter-table-title">
                    
                    Últimas notas informativas

                </div>

                    <?php 

                        $i = 0;

                        foreach ($notainformativa_archive as $post => $post_id) {

                            $notainfo_only_topic_cats = wp_get_post_categories( $post_id, array("exclude" => array( 363, 1002, 1023, 1024, 1025, 1026, 1032, 1037, 1038, 1021, 1017, 1018, 1019, 1012, 1003, 1, 1041, 1011 )) );

                            if ($notainfo_only_topic_cats[0] === 1004) {
                            	if (isset($notainfo_only_topic_cats[1])) {$notainformativa_cat = $notainfo_only_topic_cats[1];}
                            	else {$notainformativa_cat = 1004;}
                            }
                            else {$notainformativa_cat = $notainfo_only_topic_cats[0];}

                            $notainformativa_date = get_the_date( "M. 'y", $notainformativa_archive[$i] );
                            $notainformativa_link = get_permalink( $notainformativa_archive[$i] );                            

                            print '
                                <div class="grid table-row-padding">
                                    <a class="table-category-link weight600" href="' . esc_url(get_category_link($notainformativa_cat)) . '">' . get_the_category_by_ID($notainformativa_cat) . '</a>

                                    <div class="table-article-date gray-9">' . $notainformativa_date . '</div>

                                    <div class="table-article-container">
                                        <a class="table-article-title weight600 red-hover" href="' . esc_url($notainformativa_link) . '">' . get_the_title($notainformativa_archive[$i]) . '</a>
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
                            PÁGINA <?php print  $paged . ' DE ' . $loop->max_num_pages; ?>
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


