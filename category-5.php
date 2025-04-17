


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

            // Reset the formacion_eventos array from the previous WP_Query
            unset($formacion_eventos_archive);

			// Count pagination
			$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$formacion_eventos_archive[]"

            $args_formacion_eventos_archive = array(
                "post_type" => "post",
                "category__in" => array(5),
                "post_status" => "publish",
                "orderby" => array(
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 22,
                "paged" => $paged,
                );                       

            $loop = new WP_Query( $args_formacion_eventos_archive );

            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post();
					$formacion_eventos_archive[] = $post->ID;
                endwhile;

            // ELSE and END IF at the end of the page, after the pagination

        ?>

            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", () => {
                    let titleCategory = document.getElementsByClassName('category_5_title');
                    let category = document.getElementsByClassName('category_5');                             
                    for(let i = 0; i < titleCategory.length; i++) {                      
                        const size = titleCategory[i].clientHeight;                      
                        category[i].style.height = `${ 300 - size }px`;  
                        const sizeTextBody = 300 - size;                       
                                                 
                    }
                });
            </script>



        <section>
			<div class="grid-container">
                <div class="grid">

                	<?php 
                    if ($formacion_eventos_archive[0]) : ?>
                    <div class="category-first-featured">
                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($formacion_eventos_archive[0])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php fide_feat_img_url($formacion_eventos_archive[0]) ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($formacion_eventos_archive[0]); ?>
                        <h3 class="category_5_title"><?php fide_title_link_shortened($formacion_eventos_archive[0], 300); ?></h3>
                        <div class="category_5 categorys-default">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $formacion_eventos_archive[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($formacion_eventos_archive[0], 700) ?>                          
                        </span>
                        </div>
                        <div class="difuminado-default"></div>
                        <?php fide_read_more_link($formacion_eventos_archive[0]); ?> 
                    </div>
                    <?php endif; ?>   

                	<?php if ($formacion_eventos_archive[1]) : ?>
                    <div class="category-second-featured">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($formacion_eventos_archive[1])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php fide_feat_img_url($formacion_eventos_archive[1]) ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($formacion_eventos_archive[1]); ?>
                        <h3 class="category_5_title"><?php fide_title_link_shortened($formacion_eventos_archive[1], 300); ?></h3>
                        <div class="category_5 categorys-default">
                            <span class="gray-9"><?php echo get_the_date("d M 'y", $formacion_eventos_archive[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="line24">
                            <?php fide_excerpt($formacion_eventos_archive[1], 700) ?>                           
                            </span>
                        </div>
                        <div class="difuminado-default"></div>
                        <?php fide_read_more_link($formacion_eventos_archive[1]); ?>

                    </div>
                    <?php endif; ?>   

                	<?php if ($formacion_eventos_archive[2]) : ?>
                    <div class="category-third-featured">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($formacion_eventos_archive[2])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php fide_feat_img_url($formacion_eventos_archive[2]) ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($formacion_eventos_archive[2]); ?>
                        <h3 class="category_5_title"><?php fide_title_link_shortened($formacion_eventos_archive[2], 300);?></h3>
                        <div class="category_5 categorys-default">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $formacion_eventos_archive[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($formacion_eventos_archive[2], 700) ?>                        
                        </span>
                        </div>
                        <div class="difuminado-default"></div>
                        <?php fide_read_more_link($formacion_eventos_archive[2]); ?>

                    </div>
                    <?php endif; ?>   

                </div>
            </div>


            <!-- Parte para mostrar despues de las primeras 3 noticias principales -->
            <div class="grid-container">
                <div class="newsletter-table-title">                   
                    <?php 
                        $noticias_counter = get_category(5)->category_count;
                        print $noticias_counter . ' cursos y eventos realizados';
                        if ($loop->max_num_pages != 1) { print ', página ' . $paged . ' de ' . $loop->max_num_pages; } else {}
                    ?>
                </div>
                    <?php 
                    	// SLICE THE FIRST 3 VALUES OF THE ARRAY TO PREVENT REPEATING THE PREVIOUSLY HIGHLIGHTED POSTS
                    	$output = array_slice($formacion_eventos_archive, 3);
                    	$i = 0;
                    	foreach ($output as $post => $post_id) {
                            $cats_minus_featured = wp_get_post_categories( $output[$i], array("exclude" => array( 363 )) );
                            print '
                                <div class="grid table-row-padding">
                                    <span class="table-category-link weight600">' . get_the_category_by_ID($cats_minus_featured[0]) . '</span>

                                    <div class="table-article-date gray-9">' . get_the_date("d M. 'y", $output[$i]) . '</div>

                                    <div class="table-article-container">
                                        <a class="table-article-title weight600 red-hover" href="' . esc_url(get_permalink($output[$i])) . '">' . get_the_title($output[$i]) . '</a>
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



