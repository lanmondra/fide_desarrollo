


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

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$noticias_archive[]"

            $args_noticias_destacadas = array(
                "post_type" => "post",
                "category__and" => array( 1003, 363 ),
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 3,
                );                       

            $loop = new WP_Query( $args_noticias_destacadas );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
					$noticias_destacadas[] = $post->ID;
                endwhile;

            // ELSE and END IF at the end of the highlighted posts div

        ?>

            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", () => {
                    let titleCategory = document.getElementsByClassName('category_1003_title');
                    let category = document.getElementsByClassName('category_1003');                             
                    for(let i = 0; i < titleCategory.length; i++) {                      
                        const size = titleCategory[i].clientHeight;                      
                        category[i].style.height = `${ 200 - size }px`;  
                        const sizeTextBody = 300 - size;                                                                   
                    }
                });

            </script>



        <div class="grid-container">
            <div class="grid">

                <?php if ($noticias_destacadas[0]) : ?>
                <div class="category-first-featured news-media-featured-container">

                    <div class="news-media-image unselectable">
                        <a href="<?php echo esc_url(get_permalink($noticias_destacadas[0])); ?>">
                            <img src="<?php echo fide_news_media_img_url($noticias_destacadas[0]); ?>">
                        </a>
                    </div>
      
                    <h3 class="news-media-h3 category_1003_title"><?php fide_title_link_shortened($noticias_destacadas[0], 300); ?></h3>
                    <div class ="category_1003 categorys-default">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $noticias_destacadas[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                        <?php fide_excerpt($noticias_destacadas[0], 700) ?>                       
                    </span>
                    </div>
                        <div class="difuminado-default"></div>
                        <?php fide_read_more_link($noticias_destacadas[0]); ?>

                </div>
                <?php endif; ?>   

                <?php if ($noticias_destacadas[1]) : ?>
                <div class="category-second-featured news-media-featured-container">

                    <div class="news-media-image unselectable">
                        <a href="<?php echo esc_url(get_permalink($noticias_destacadas[1])); ?>">
                            <img src="<?php echo fide_news_media_img_url($noticias_destacadas[1]); ?>">
                        </a>
                    </div>
      
                    <h3 class="news-media-h3 category_1003_title"><?php fide_title_link_shortened($noticias_destacadas[1], 300); ?></h3>
                    <div class ="category_1003 categorys-default">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $noticias_destacadas[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                        <?php fide_excerpt($noticias_destacadas[1], 700) ?>                        
                    </span>
                    </div>
                        <div class="difuminado-default"></div>
                        <?php fide_read_more_link($noticias_destacadas[1]); ?>

                </div>
                <?php endif; ?>   

                <?php if ($noticias_destacadas[2]) : ?>
                <div class="category-third-featured news-media-featured-container">

                    <div class="news-media-image unselectable">
                        <a href="<?php echo esc_url(get_permalink($noticias_destacadas[2])); ?>">
                            <img src="<?php echo fide_news_media_img_url($noticias_destacadas[2]); ?>">
                        </a>
                    </div>
      
                    <h3 class="news-media-h3 category_1003_title"><?php fide_title_link_shortened($noticias_destacadas[2], 300); ?></h3>
                    <div class ="category_1003 categorys-default">
                    <span class="gray-9"><?php echo get_the_date("d M 'y", $noticias_destacadas[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                    <span class="line24">
                        <?php fide_excerpt($noticias_destacadas[2], 700) ?>                       
                    </span>
                    </div>
                        <div class="difuminado-default"></div>
                        <?php fide_read_more_link($noticias_destacadas[2]); ?>

                </div>
                <?php endif; ?>   

            </div>
        </div>        



        <?php
            
            // CLOSE THE IF OPENED TO GET HIGHLIGHTED POSTS
            else:
                _e( "" );
            endif;

            wp_reset_postdata(); 

        ?>



        <?php

            // Reset the posts_cat array from the previous WP_Query
            unset($noticias_archive);

            // Count pagination
            $paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$noticias_archive[]"

            $args_noticias_archive = array(
                "post_type" => "post",
                "category__in" => 1003,
                "post__not_in" => $noticias_destacadas,
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 15,
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
                    
                    <?php 
                        $noticias_counter = get_category(1003)->category_count;
                        print $noticias_counter . ' noticias publicadas';
                        if ($loop->max_num_pages != 1) { print ', página ' . $paged . ' de ' . $loop->max_num_pages; } else {}
                    ?>

                </div>

                    <?php 

                        foreach ($noticias_archive as $id) {

                            $noticias_medio_logo = get_post_meta( $id, 'medio', false );
                            $noticias_date = get_the_date("M. 'y", $id);
                            $noticias_link = get_post_meta( $id, 'link', false );

                            print '
                                <div class="grid table-row-padding table-row-padding-news">

                                    <span class="table-category-link table-news-media-logo">
                                        <img src="' . fide_news_media_img_alpha_url($id) . '">
                                    </span>

                                    <div class="table-article-date table-article-date-news gray-9">' . $noticias_date . '</div>

                                    <div class="table-article-container table-article-container-news">
                                        <a class="table-article-title weight600 red-hover" target="_blank" href="' . esc_url($noticias_link[0]) . '">' . get_the_title($id) . '</a>
                                    </div>
                                </div>
                            ';

                            if ($id==end($noticias_archive)) { print '<div class="table-bottom-margin"></div>'; } else { print '<hr class="table-hr-line">';}

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


