<?php /* Template Name: Home */ ?>



<?php get_header(); ?>



    <main>



        <?php

            # GET THE FIRST THREE FEATURED POSTS, SAVE THEIR IDs ON "$featured[]"

            $args_actualidad_featured = array(
                "post_type" => "post",
                "category__in" => 363,
                "category__not_in" => array( 11, 1002, 1003, 1012, 1017, 1018, 1019 ),
                "post_status" => "publish",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 3
                );

            $loop = new WP_Query( $args_actualidad_featured );
            while ( $loop->have_posts() ) : $loop->the_post();
            $actualidad_featured[] = $post->ID;
            endwhile; wp_reset_postdata();

            # FIRST POSTS STORED ON POSTS ALREADY SHOWN - THE NEXT ONES WILL APPEND WITH ".="
            $posts_already_shown = $actualidad_featured;

            # GET THE IMAGES FOR THE FIRST THREE FEATURED POSTS
            $actualidad_featured_image_1 = wp_get_attachment_image_src ( get_post_thumbnail_id($actualidad_featured[0]), array('1024','576') );
            $actualidad_featured_image_2 = wp_get_attachment_image_src ( get_post_thumbnail_id($actualidad_featured[1]), array('1024','576') );
            $actualidad_featured_image_3 = wp_get_attachment_image_src ( get_post_thumbnail_id($actualidad_featured[2]), array('1024','576') );
        ?>



        <section>
            <div class="grid-container">
                <div class="grid">

                    <div class="actualidad-featured-image">
                        <a href="<?php echo esc_url(get_permalink($actualidad_featured[0])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $actualidad_featured_image_1[0] ?>">
                            </div>
                        </a>
                    </div>

                    <div class="actualidad-featured-text">
                        <?php fide_list_cats_links($actualidad_featured[0]); ?>
                        <h1><?php fide_title_link($actualidad_featured[0]); ?></h1>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $actualidad_featured[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($actualidad_featured[0], 240) ?>
                            <br>
                            <?php fide_read_more_link($actualidad_featured[0]); ?>
                        </span>
                    </div>
                
                </div>
            </div>
        </section>



        <?php

            # GET THE LAST THREE NOTAS INFORMATIVAS

            $args_notas_informativas = array(
                "post_type" => "post",
                "category__and" => array( 1004, 1041 ),
                "post_status" => "publish",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 3,
                );

            $loop = new WP_Query( $args_notas_informativas );
            while ( $loop->have_posts() ) : $loop->the_post();
            $notas_informativas[] = $post->ID;
            endwhile; wp_reset_postdata();

        ?>

        <section>
            <div class="grid-container">
                <div class="grid">

                    <div class="actualidad-notas-informativas">

                        <hr class="generic-hr">
                        <a class="px14 weight600" href="<?php echo site_url(); ?>/actualidad/notas-informativas">NOTAS INFORMATIVAS</a>
                        <hr class="generic-hr">

                        <p><?php fide_notas_title_and_excerpt($notas_informativas[0], 180) ?></p>
                        <hr class="generic-hr">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[1], 180) ?></p>
                        <hr class="generic-hr">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[2], 180) ?></p>

                    </div>

                    <div class="actualidad-second-featured article-module-padding">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($actualidad_featured[1])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php echo $actualidad_featured_image_2[0] ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($actualidad_featured[1]); ?>
                        <h3><?php fide_title_link($actualidad_featured[1]); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $actualidad_featured[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($actualidad_featured[1], 200) ?>
                            <br>
                            <?php fide_read_more_link($actualidad_featured[1]); ?>
                        </span>

                    </div>

                    <div class="actualidad-third-featured article-module-padding">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($actualidad_featured[2])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php echo $actualidad_featured_image_3[0] ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($actualidad_featured[2]); ?>
                        <h3><?php fide_title_link($actualidad_featured[2]); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $actualidad_featured[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($actualidad_featured[2], 200) ?>
                            <br>
                            <?php fide_read_more_link($actualidad_featured[2]); ?>
                        </span>

                    </div>

                </div>
            </div>

            <hr class="generic-hr hr-up mobile-hide">

        </section>



        <section>

            <div class="grid-container">
                <div class="grid">
                    <div class="section-title px40 ibm-serif weight600 col-1-1 noticias-fide-section-title">
                        <span>FIDE en los Medios </span>
                    </div>
                </div>
            </div>



            <?php

                # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$noticias_destacadas[]"

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

                while ( $loop->have_posts() ) : $loop->the_post();
                    $noticias_destacadas[] = $post->ID;
                endwhile;

                // ELSE and END IF at the end of the highlighted posts div

            ?>



            <div class="grid-container">
                <div class="grid">

                    <?php if ($noticias_destacadas[0]) : ?>
                    <div class="category-first-featured news-media-featured-container">

                        <div class="news-media-image unselectable">
                            <a href="<?php echo esc_url(get_permalink($noticias_destacadas[0])); ?>">
                                <img src="<?php echo fide_news_media_img_url($noticias_destacadas[0]); ?>">
                            </a>
                        </div>
          
                        <h3 class="news-media-h3"><?php fide_title_link_shortened($noticias_destacadas[0], 60); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $noticias_destacadas[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($noticias_destacadas[0], 190) ?>
                            <br>
                            <?php fide_read_more_link($noticias_destacadas[0]); ?>
                        </span>

                    </div>
                    <?php endif; ?>   

                    <?php if ($noticias_destacadas[1]) : ?>
                    <div class="category-second-featured news-media-featured-container">

                        <div class="news-media-image unselectable">
                            <a href="<?php echo esc_url(get_permalink($noticias_destacadas[1])); ?>">
                                <img src="<?php echo fide_news_media_img_url($noticias_destacadas[1]); ?>">
                            </a>
                        </div>
          
                        <h3 class="news-media-h3"><?php fide_title_link_shortened($noticias_destacadas[1], 60); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $noticias_destacadas[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($noticias_destacadas[1], 190) ?>
                            <br>
                            <?php fide_read_more_link($noticias_destacadas[1]); ?>
                        </span>

                    </div>
                    <?php endif; ?>   

                    <?php if ($noticias_destacadas[2]) : ?>
                    <div class="category-third-featured news-media-featured-container">

                        <div class="news-media-image unselectable">
                            <a href="<?php echo esc_url(get_permalink($noticias_destacadas[2])); ?>">
                                <img src="<?php echo fide_news_media_img_url($noticias_destacadas[2]); ?>">
                            </a>
                        </div>
          
                        <h3 class="news-media-h3"><?php fide_title_link_shortened($noticias_destacadas[2], 60); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $noticias_destacadas[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($noticias_destacadas[2], 190) ?>
                            <br>
                            <?php fide_read_more_link($noticias_destacadas[2]); ?>
                        </span>

                    </div>
                    <?php endif; ?>   

                </div>
            </div>        



            <?php

                # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$noticias_archive[]"

                $args_noticias_archive = array(
                    "post_type" => "post",
                    "category__in" => 1003,
                    "post__not_in" => $noticias_destacadas,
                    "post_status" => "publish",
                    "orderby" => array(
                        "post_date"     =>  "DESC",
                        ),
                    "posts_per_page" => 10,
                    "paged" => $paged,
                    );                       

                $loop = new WP_Query( $args_noticias_archive );

                while ( $loop->have_posts() ) : $loop->the_post();
                    $noticias_archive[] = $post->ID;
                endwhile;

            ?>



            <div class="grid-container">
                <div class="newsletter-table-title">
                    
                    Archivo de noticias publicadas

                </div>

                    <?php 

                        for ($i = 0; $i <= 9; $i++) {

                            $noticias_medio = get_post_meta( $noticias_archive[$i], 'medio', false );
                            $noticias_date = get_the_date("M. 'y", $noticias_archive[$i]);
                            $noticias_link = get_post_meta( $noticias_archive[$i], 'link', false );

                            print '
                                <div class="grid table-row-padding table-row-padding-news">

                                    <span class="table-category-link table-news-media-logo">
                                        <img src="' . fide_news_media_img_alpha_url($noticias_archive[$i]) . '">
                                    </span>

                                    <div class="table-article-date table-article-date-news gray-9">' . $noticias_date . '</div>

                                    <div class="table-article-container table-article-container-news">
                                        <a class="table-article-title weight600 red-hover" target="_blank" href="' . esc_url($noticias_link[0]) . '">' . get_the_title($noticias_archive[$i]) . '</a>
                                    </div>
                                </div>
                            ';

                            if ($i==9) { print '<div class="table-bottom-margin"></div>'; } else { print '<hr class="table-hr-line">';}

                        }

                    ?>

            </div>

        </section>



        <?php

            # GET THE LAST NORMATIVA POST

            $args_normativa = array(
                "post_type" => "post",
                "category__in" => array( 1016 ),
                "category__not_in" => array( 11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019 ),
                "post__not_in" => $posts_already_shown,
                "post_status" => "publish",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 1,
                );

            $loop = new WP_Query( $args_normativa );
            while ( $loop->have_posts() ) : $loop->the_post();
            $normativa[] = $post->ID;
            endwhile; wp_reset_postdata();

            $posts_already_shown = array_merge($posts_already_shown, $normativa);
            $normativa_img = wp_get_attachment_image_src ( get_post_thumbnail_id($normativa[0]), array('1024','576') );

        ?>

        <section>

            <hr class="generic-hr hr-up">

            <div class="grid-container">
                <div class="grid">
                    <div class="section-title px40 ibm-serif weight600 col-1-1">
                        <span>Normativa</span>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid margin-bottom">

                    <div class="actualidad-normativa-text">
                        <?php fide_list_cats_links($normativa[0]); ?>
                        <h1><?php fide_title_link($normativa[0]); ?></h2>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $normativa[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($normativa[0], 800) ?>
                            <br>
                            <?php fide_read_more_link($normativa[0]); ?>
                        </span>
                    </div>

                    <div class="actualidad-normativa-image">
                        <a href="<?php echo esc_url(get_permalink($normativa[0])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $normativa_img[0]; ?>">
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </section>



        <?php

        # GET LAST POSTS FOR "NORMATIVA-EST/INT/AUT", SAVE THEIR IDs ON "$last_news[]"

            $args_last_normativa = array(
                "post_type" => "post",
                "post_status" => "publish",
                "category_name" => "normativa-estatal, normativa-autonomica, normativa-internacional",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 10,
                );

            $loop = new WP_Query( $args_last_normativa );
            while ( $loop->have_posts() ) : $loop->the_post();
            $last_normativa[] = $post->ID;
            endwhile; wp_reset_postdata();

        ?>

        <section>
            <div class="grid-container">
                <div class="table-title">Normativa reciente</div>

                    <?php 

                        $i = 0;

                        foreach ($last_normativa as $post => $post_id) {

                            $cats_only_within_normativa = wp_get_post_categories( $last_normativa[$i], array("include" => array(1017,1018,1019)) );

                            if ( get_the_category_by_ID($cats_only_within_normativa[0]) == 'Normativa estatal') {
                                $normativa_area_short_name = 'Estatal';
                            } elseif ( get_the_category_by_ID($cats_only_within_normativa[0]) == 'Normativa autonómica') {
                                $normativa_area_short_name = 'Autonómica';
                            } elseif ( get_the_category_by_ID($cats_only_within_normativa[0]) == 'Normativa internacional') {
                                $normativa_area_short_name = 'Internacional';
                            }

                            print '
                                <div class="grid table-row-padding">
                                    <a class="table-category-link weight600" href="' . site_url() . '/actualidad/normativa">' . $normativa_area_short_name . '</a>

                                    <div class="table-article-date gray-9">' . get_the_date("d M. 'y", $last_normativa[$i]) . '</div>

                                    <div class="table-article-container">
                                        <a class="table-article-title weight600 red-hover" href="' . esc_url(get_permalink($last_normativa[$i])) . '">' . get_the_title($last_normativa[$i]) . '</a>
                                        <span class="table-article-excerpt gray-9 weight400">&nbsp;&nbsp;' . substr(get_the_excerpt($last_normativa[$i]), 0, 100) . '</span>
                                    </div>
                                </div>
                            ';

                            if ($i==9) { print '<div class="table-bottom-margin"></div>'; } else { print '<hr class="table-hr-line">';}

                            ++$i;

                        }

                    ?>

                </div>
            </div>
        </section>



        <?php

            # GET THE LAST 6 JURISPRUDENCIA POSTS

            $args_jurisprudencia = array(
                "post_type" => "post",
                "category__in" => array( 1015 ),
                "category__not_in" => array( 11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019 ),
                "post__not_in" => $posts_already_shown,
                "post_status" => "publish",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 5,
                );

            $loop = new WP_Query( $args_jurisprudencia );
            while ( $loop->have_posts() ) : $loop->the_post();
            $jurisprudencia[] = $post->ID;
            endwhile; wp_reset_postdata();

            $posts_already_shown = array_merge($posts_already_shown, $jurisprudencia);
            $jurisprudencia_img = wp_get_attachment_image_src ( get_post_thumbnail_id($jurisprudencia[0]), array('1024','576') );

        ?>

        <section class="margin-top">

            <hr class="generic-hr hr-up">

            <div class="grid-container">
                <div class="grid">
                    <div class="section-title px40 ibm-serif weight600 col-1-1">
                        <span>Jurisprudencia</span>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid">

                    <div class="actualidad-featured-image">
                        <a href="<?php echo esc_url(get_permalink($jurisprudencia[0])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $jurisprudencia_img[0] ?>">
                            </div>
                        </a>
                    </div>

                    <div class="jurisprudencia-featured-text">
                        <?php fide_list_cats_links($jurisprudencia[0]); ?>
                        <h1><?php fide_title_link($jurisprudencia[0]); ?></h1>
                        <div class="two-columns-text">
                            
                            <span class="gray-9"><?php echo get_the_date("d M 'y", $jurisprudencia[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="line24">
                                <?php fide_excerpt($jurisprudencia[0], 590) ?>
                                <br>
                                <?php fide_read_more_link($jurisprudencia[0]); ?>
                            </span>
                        </div>
                    </div>

                    <div class="jurisprudencia-breves">
                        <hr class="generic-hr mobile-only">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[1], 200) ?></p>
                        <hr class="generic-hr">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[2], 200) ?></p>
                        <hr class="generic-hr">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[3], 200) ?></p>
                        <hr class="generic-hr">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[4], 200) ?></p>
                    </div>
                
                </div>
            </div>

            <div class="jurisprudencia-bottom-margin"></div>

        </section>



        <?php

            # GET THE LAST 6 LEGISLACIÓN POSTS

            $args_legislacion = array(
                "post_type" => "post",
                "category__in" => array( 1014 ),
                "category__not_in" => array( 11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019 ),
                "post__not_in" => $posts_already_shown,
                "post_status" => "publish",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 5,
                );

            $loop = new WP_Query( $args_legislacion );
            while ( $loop->have_posts() ) : $loop->the_post();
            $legislacion[] = $post->ID;
            endwhile; wp_reset_postdata();

            $posts_already_shown = array_merge($posts_already_shown, $legislacion);

            # GET THE IMAGES FOR THE FIRST THREE POSTS
            $legislacion_image_1 = wp_get_attachment_image_src ( get_post_thumbnail_id($legislacion[0]), array('1024','576') );
            $legislacion_image_2 = wp_get_attachment_image_src ( get_post_thumbnail_id($legislacion[1]), array('1024','576') );
            $legislacion_image_3 = wp_get_attachment_image_src ( get_post_thumbnail_id($legislacion[2]), array('1024','576') );

        ?>

        <section>

            <hr class="generic-hr hr-up">

            <div class="grid-container">
                <div class="grid">
                    <div class="section-title px40 ibm-serif weight600 col-1-1">
                        <span>Legislación</span>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid">

                    <div class="legislacion-first-featured">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($legislacion[0])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php echo $legislacion_image_1[0] ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($legislacion[0]); ?>
                        <h3><?php fide_title_link($legislacion[0]); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $legislacion[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($legislacion[0], 200) ?>
                            <br>
                            <?php fide_read_more_link($legislacion[0]); ?>
                        </span>

                    </div>

                    <div class="legislacion-second-featured">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($legislacion[1])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php echo $legislacion_image_2[0] ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($legislacion[1]); ?>
                        <h3><?php fide_title_link($legislacion[1]); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $legislacion[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($legislacion[1], 200) ?>
                            <br>
                            <?php fide_read_more_link($legislacion[1]); ?>
                        </span>

                    </div>

                    <div class="legislacion-third-featured">

                        <div class="article-image">
                            <a href="<?php echo esc_url(get_permalink($legislacion[2])); ?>">
                                <div class="crop">
                                    <img class="cropped" src="<?php echo $legislacion_image_3[0] ?>">
                                </div>
                            </a>
                        </div>
          
                        <?php fide_list_cats_links($legislacion[2]); ?>
                        <h3><?php fide_title_link($legislacion[2]); ?></h3>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $legislacion[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($legislacion[2], 200) ?>
                            <br>
                            <?php fide_read_more_link($legislacion[2]); ?>
                        </span>

                    </div>
                
                </div>
            </div>

            <div class="legislacion-bottom-margin"></div>

        </section>



        <?php

            # GET THE LAST INTERNACIONAL POST

            $args_internacional = array(
                "post_type" => "post",
                "category__in" => array( 1013 ),
                "category__not_in" => array( 11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019 ),
                "post__not_in" => $posts_already_shown,
                "post_status" => "publish",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 1,
                );

            $loop = new WP_Query( $args_internacional );
            while ( $loop->have_posts() ) : $loop->the_post();
            $internacional[] = $post->ID;
            endwhile; wp_reset_postdata();

            $posts_already_shown = array_merge($posts_already_shown, $internacional);
            $internacional_img = wp_get_attachment_image_src ( get_post_thumbnail_id($internacional[0]), array('1024','576') );

        ?>



        <section>

            <hr class="generic-hr hr-up">

            <div class="grid-container">
                <div class="grid">
                    <div class="section-title px40 ibm-serif weight600 col-1-1">
                        <span>Internacional</span>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid">

                    <div class="internacional-featured-text">
                        <?php fide_list_cats_links($internacional[0]); ?>
                        <h1><?php fide_title_link($internacional[0]); ?></h1>
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $internacional[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($internacional[0], 280) ?>
                            <br>
                            <?php fide_read_more_link($internacional[0]); ?>
                        </span>
                    </div>
                
                    <div class="internacional-featured-image">
                        <a href="<?php echo esc_url(get_permalink($internacional[0])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $internacional_img[0] ?>">
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="internacional-bottom-margin"></div>

        </section>



        <?php

        # GET LAST POSTS FOR "NOTICIAS", SAVE THEIR IDs ON "$last_news[]"

            $args_last_news = array(
                "post_type" => "post",
                "post_status" => "publish",
                "category_name" => "noticias",
                "orderby" => array(
                    "menu_order"    => "ASC",
                    "post_date"     =>  "DESC",
                    ),
                "posts_per_page" => 10,
                );

            $loop = new WP_Query( $args_last_news );
            while ( $loop->have_posts() ) : $loop->the_post();
            $last_news[] = $post->ID;
            endwhile; wp_reset_postdata();

        ?>

        <section>

            <hr class="generic-hr hr-up">

            <div class="grid-container">
                <div class="grid">
                    <div class="section-title px40 ibm-serif weight600 col-1-1">
                        <span>Noticias</span>
                    </div>
                </div>
            </div>

            <div class="grid-container">

                <?php 

                    $i = 0;

                    foreach ($last_news as $post => $post_id) {

                        $cats_minus_featured = wp_get_post_categories( $last_news[$i], array("exclude" => array(363)) );
                        $news_channel = get_post_meta( $last_news[$i], 'medio', false );
                        $news_link = get_post_meta( $last_news[$i], 'link', false );

                        print '
                            <div class="grid table-row-padding">
                                <span class="table-category-link weight600">' . end($news_channel) . '</span>

                                <div class="table-article-date gray-9">' . get_the_date("d M. 'y", $last_news[$i]) . '</div>

                                <div class="table-article-container">
                                    <a class="table-article-title weight600 red-hover" target="_blank" href="' . esc_url(end($news_link)) . '">' . get_the_title($last_news[$i]) . '</a>
                                    <span class="table-article-excerpt gray-9 weight400">&nbsp;&nbsp;' . substr(get_the_excerpt($last_news[$i]), 0, 100) . '</span>
                                </div>
                            </div>
                        ';

                        if ($i==9) { print '<div class="table-bottom-margin"></div>'; } else { print '<hr class="table-hr-line">';}

                        ++$i;

                    }

                ?>

            </div>
        </section>



<?php get_footer(); ?>


