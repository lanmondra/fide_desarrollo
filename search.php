


<?php get_header(); ?>



	<section>
		<main class="search-main">



            <?php

                // Reset the posts_cat array from the previous WP_Query
                unset($posts_search);

				// Count pagination
				$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

                $args = array(
                    "post_type" => "post",
                    "post_status" => "publish",
                    "orderby" => array(
                        "post_date"     =>  "DESC",
                        ),
                    "s" => get_search_query(),
                    "posts_per_page" => 10,
                    "paged" => $paged,
                    );                       

                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) :
                    while ( $loop->have_posts() ) : $loop->the_post();
						$posts_search[] = $post->ID;
                    endwhile;

                // ELSE and END IF at the end of the page, after the pagination

            ?>



            <div class="grid-container">
                <div class="grid">
                    <hr class="generic-hr short-hr-after-breadcrumb">
                </div>
            </div>

            <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="grid-container">
                    <div class="grid">
                        <input type="search" class="search-input px18" placeholder="Buscar en fide.es..." value="<?php the_search_query(); ?>" name="s" id="search" spellcheck="false" autocomplete="off"/>
                        <input type="submit" id="searchsubmit" class="px18" value="BUSCAR"/>
                    </div>
                </div>
            </form>

            <div class="grid-container">
                <div class="results-table-title">
                    <?php echo $wp_query->found_posts ?> resultados para "<?php the_search_query(); ?>"<?php if ($loop->max_num_pages != 1) { ?>, página <?php print $paged . ' de ' . $loop->max_num_pages; } else {} ?>
                </div>


                <?php 

                    $i = 0;

                    foreach ($posts_search as $post => $post_id) {



                        // ACTIVATE WHEN ALL POSTS HAVE A TOPIC CAT ASSOCIATED
                        // $only_topic_cats = wp_get_post_categories( $posts_search[$i], array("exclude" => $non_topic_cats) );

                        $only_topic_cats = wp_get_post_categories( $posts_search[$i], array("exclude" => array( 363, 1023, 1024, 1025 )) );
                        

                        if ($only_topic_cats == null) {
                            $only_topic_cats = array( 1 );
                        }

                        $excerpt_a = get_the_excerpt($post_id);
                        $excerpt_b = get_the_content(null, false, $post_id);
                        $excerpt_c = strip_tags($excerpt_a . " " . $excerpt_b);
                        $excerpt = mb_substr($excerpt_c, 0, 200) . '...';

                        // SET SPECIFIC VARIABLES DEPENDING ON THE CONTENT TYPE

                        // SET FOR "NOTICIAS"
                        if (in_array(1012, $only_topic_cats)) {
                            $img_url = array("https://www.fide.es/wp-content/themes/fide2019/images/news-700x429.jpg");
                            $excerpt = get_post_meta($post_id, "medio", true) . " (Noticia seleccionada)";

                        // SET FOR "NOTICIAS FIDE"
                        } elseif (in_array(1003, $only_topic_cats)) {
                            $img_url = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[$i]), array('1024','576') );
                            $excerpt = get_post_meta($post_id, "medio", true) . " (En colaboración con FIDE)";

                        // SET "NORMATIVA ESTATAL", "INTERNACIONAL" AND "AUTONÓMICA"
                        } elseif (in_array(1017, $only_topic_cats) || in_array(1018, $only_topic_cats) || in_array(1019, $only_topic_cats)) {
                            $img_url = array("https://www.fide.es/wp-content/themes/fide2019/images/normativa.jpg");

                        // SET FOR EVERYTHING ELSE
                        } else {
                            $img_url = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[$i]), array('1024','576') );
                        }

                        // SET GENERIC IMAGE FOR POSTS WITHOUT IMAGE
                        if ( $img_url == "" ) {
                            $img_url = array("https://www.fide.es/wp-content/themes/fide2019/images/empty.jpg"); }
                        $end_of_results = end($posts_search);
                
                        // DETECT THE TYPE OF CONTENT AND FORMAT IT ACCORDINGLY
                        // $news_channel = get_post_meta( $posts_search[$i], 'medio', false );
                        // $news_link = get_post_meta( $posts_search[$i], 'link', false );

                        print '
                            <div class="search-result-module-margin">
                                <div class="grid">

                                    <div class="result-image">
                                        <a href="' . esc_url(get_permalink($posts_search[$i])) . '">
                                            <div class="crop">
                                                <img class="cropped" src="' . $img_url[0] . '">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="result-cat-and-date line24">
                                        <a class="result-table-category-link weight600" href="' . esc_url(get_category_link($only_topic_cats[0])) .'">' . get_the_category_by_ID($only_topic_cats[0]) . '</a>
                                        <br>
                                        <span class="gray-9">' . get_the_date("d M 'y", $posts_search[$i]) . '</span>
                                    </div>
                      
                                    <div class="result-title-and-excerpt line24">
                                        <a class="table-article-title weight600 red-hover" href="' . esc_url(get_permalink($posts_search[$i])) . '">' . get_the_title($posts_search[$i]) . '</a>
                                        <span class="table-article-excerpt gray-9 weight400">&nbsp;&nbsp;|&nbsp;&nbsp;' . $excerpt . '</span>
                                    </div>

                                </div>
                            </div>
                        ';

                        if ($end_of_results == $posts_search[$i]) { print '<div class="table-bottom-margin"></div>'; } else { print '<hr class="generic-hr">'; }

                        ++$i;

                    }

                ?>

            </div>



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

                            // REPEAT BASIC CODE TO SHOW IF SEARCH FIND NO MATCHES
                            else:
                            ?>

                                <div class="grid-container">
                                    <div class="grid">
                                        <hr class="generic-hr short-hr-after-breadcrumb">
                                    </div>
                                </div>

                                <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <div class="grid-container">
                                        <div class="grid">
                                            <input type="search" class="search-input px18" placeholder="Buscar en fide.es..." value="<?php the_search_query(); ?>" name="s" id="search" spellcheck="false" autocomplete="off"/>
                                            <input type="submit" id="searchsubmit" class="px18" value="BUSCAR"/>
                                        </div>
                                    </div>
                                </form>

                                <div class="grid-container">
                                    <div class="results-table-title">
                                        No se ha encontrado ningún resultado para "<?php the_search_query(); ?>"
                                        <br>
                                        <span class="search-try-again-message px16 gray-9 weight400 line24">Por favor, revisa el término introducido en el campo de búsqueda o ponte en contacto con nosotros si necesitas cualquier información.
                                    </div>
                                    <div style="min-height:300px;"></div>

                            <?php

                            // CLOSE THE IF FROM THE TOP OF THE PAGE
                            endif;

                            wp_reset_postdata(); 

                        ?>

                    </div> <!-- End of grid -->
                </div> <!-- End of container-margin -->
            </div> <!-- End of grid container -->



		</main>
	</section>



<?php get_footer(); ?>


