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

            <script type="text/javascript">                             
                window.addEventListener("resize", () => {
                    resizeTextMain();
                })
                document.addEventListener("DOMContentLoaded", () => {
                    resizeTextMain();
                });
                   
                function resizeTextMain() {                    
                    let titleMain = document.getElementsByClassName('title_main');                  
                    let main = document.getElementsByClassName('main');

                    let img = document.getElementsByClassName('cropped');
                    
                                                 
                    for(let i = 0; i < titleMain.length; i++) {                      
                        const size = titleMain[i].clientHeight;
                        const sizeImg = img[i].clientHeight;
                        const sizeTextBody = 390 - size;     
                        main[i].style.height = `${390- size}px`;    
                        console.log('ancho ',sizeImg )
                        console.log('titulo ',size)
                        console.log('texto ',sizeImg - size)
                        
                                          
                    }
                    
                }
               
            </script>

            <style>
                .main{
                    position: relative;
                    overflow: hidden;                                      
                }             
            </style>


        <!-- Primera columna de la HOME-->
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
                        <h1 class="title_main"><?php fide_title_link($actualidad_featured[0]); ?></h1>
                        <div class = "main">
                            <span class="gray-9"><?php echo get_the_date("d M 'y", $actualidad_featured[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="line24">
                            <?php fide_excerpt($actualidad_featured[0], 900) ?>                           
                            </span>
                        </div>
                        <div class="prueba" style=""></div>
                        <?php fide_read_more_link($actualidad_featured[0]); ?>
                    </div>
                
                </div>
            </div>
        </section>
    <!-- Fin Primera columna de la HOME-->


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
        <!-- Jaava Script-->
         <SCRIPT type="text/javascript">
                window.addEventListener("resize", () => {
                    resizeText();
                })
                document.addEventListener("DOMContentLoaded", () => {
                    resizeText();
                });
                function resizeText() {
                    let titleNoteInformat = document.getElementsByClassName('title_note_informative');
                    let notaInfo = document.getElementsByClassName('nota-info');  
                                                 
                    for(let i = 0; i < titleNoteInformat.length; i++) {                      
                        const size = titleNoteInformat[i].clientHeight;
                                            
                        notaInfo[i].style.height = `${ 280 - size }px`;  
                        const sizeTextBody = 280 - size;
                                          
                    }
                }

            </SCRIPT>

            <style>
                .nota-info {
                    position: relative;
                    overflow: hidden;                                       
                }              
            </style>
    <?php
        # GET THE LAST THREE NOTAS INFORMATIVAS
        $args_notas_informativas = array(
        "post_type" => "post",
        "category__and" => array(1004, 1041),
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 3,
        );
        $loop = new WP_Query($args_notas_informativas);
        while ($loop->have_posts()) : $loop->the_post();
            $notas_informativas[] = $post->ID;
        endwhile;
        wp_reset_postdata();
    ?>


     <?php
    # GET THE LAST 6 DE CERCA POSTS
    $args_to_near = array(
        "post_type" => "post",
        "category__in" => array(1049),
        "category__not_in" => array(11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019),
        "post__not_in" => $posts_already_shown,
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 5,
    );
    

    $loop = new WP_Query($args_to_near);
    while ($loop->have_posts()) : $loop->the_post();
        $to_near[] = $post->ID;
    endwhile;
    wp_reset_postdata();

    $to_near_lent = $to_near;
    $posts_already_shown = array_merge($posts_already_shown, $to_near);
    $to_near_img = wp_get_attachment_image_src(get_post_thumbnail_id($to_near[0]), array('1049', '576'));

    ?>

    <!-- Jaava Script Notas informativas -->
    <SCRIPT type="text/javascript">
        window.addEventListener("resize", () => {
            resizeText();
        })
        document.addEventListener("DOMContentLoaded", () => {
            resizeText();
        });

        function resizeText() {
            let titleNoteInformat = document.getElementsByClassName('title_note_informative');
            let notaInfo = document.getElementsByClassName('nota-info');

            for (let i = 0; i < titleNoteInformat.length; i++) {
                const size = titleNoteInformat[i].clientHeight;

                notaInfo[i].style.height = `${ 280 - size }px`;
                const sizeTextBody = 280 - size;

            }
        }
    </SCRIPT>

    <style>
        .nota-info {
            position: relative;
            overflow: hidden;
        }
    </style>

    <!-- NOTAS INFORMATIVAS -->

    <?php

    
   
    ?>

    <section>
        <div class="grid-container">
            <div class="grid">       
                
            <?php if(count($to_near_lent) == 0 ) :?>                      
                <div class="actualidad-notas-informativas">                                    
                    <br/>
                    <hr class="generic-hr">
                    <a class="px14 weight600" style="text-align: center; background-color: #AC0600; color: white; white; font-size: 20px; font-weight: bold;" href="<?php echo site_url(); ?>/actualidad/notas-informativas">NOTAS INFORMATIVAS</a>
                    <hr class="generic-hr">
                    <div class="breves" style="height: 150px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[0], 350) ?></p>                       
                    </div>
                    <div class="difuminacion-informative"></div> 
                     
                    <hr class="generic-hr">
                    <div class="breves" style="height: 150px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[1], 350) ?></p> 
                    </div>
                     <div class="difuminacion-informative" ></div> 
                    <hr class="generic-hr">
                    <div class="breves" style="height: 150px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[2], 340) ?></p> 
                    </div>
                    <div class="difuminacion-informative" ></div> 
                </div>
            <?php elseif(count($to_near_lent) == 1 ) :?>  
                <div class="actualidad-notas-informativas">                 
                    <hr class="generic-hr">
                    <a class="px14 weight600" style="text-align: center; background-color: #AC0600; color: white; font-size: 20px; font-weight: bold;" href="<?php echo site_url(); ?>/actualidad/notas-informativas">DE CERCA</a>
                    <hr class="generic-hr">
                    <div class="breves" style="height: 151px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($to_near[0], 260) ?></p>                       
                    </div>     
                    <div class="difuminacion-informative" ></div> 
                    <br/>
                    <hr class="generic-hr">
                    <a class="px14 weight600" style="text-align: center; background-color: #AC0600; color: white; font-size: 20px; font-weight: bold;" href="<?php echo site_url(); ?>/actualidad/notas-informativas">NOTAS INFORMATIVAS</a>
                    <hr class="generic-hr">

                    <div class="breves" style="height: 150px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[1], 260) ?></p>                        
                    </div>
                    <div class="difuminacion-informative" ></div> 
                    <div class="breves" style="height: 150px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[2], 260) ?></p>                        
                    </div>
                    <div class="difuminacion-informative" ></div> 
                </div>
            <?php elseif(count($to_near_lent) >= 2 ) :?> 
                <div class="actualidad-notas-informativas">                 
                    <hr class="generic-hr">
                    <a class="px14 weight600" style="text-align: center; background-color: #AC0600; color: white; white; font-size: 20px; font-weight: bold;" href="<?php echo site_url(); ?>/actualidad/notas-informativas">DE CERCA</a>
                    <hr class="generic-hr">

                    <div class="breves" style="height: 151px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($to_near[0], 260) ?></p>                       
                    </div>     
                    <div class="difuminacion-informative" ></div> 

                    <div class="breves" style="height: 151px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($to_near[1], 260) ?></p>                       
                    </div>     
                    <div class="difuminacion-informative" ></div> 
                    <br/>
                    <hr class="generic-hr">
                    <a class="px14 weight600" style="text-align: center; background-color: #AC0600; color: white; white; font-size: 20px; font-weight: bold;" href="<?php echo site_url(); ?>/actualidad/notas-informativas">NOTAS INFORMATIVAS</a>
                    <hr class="generic-hr">
                    <div class="breves" style="height: 150px; overflow: hidden;">
                        <p><?php fide_notas_title_and_excerpt($notas_informativas[0], 460) ?></p>
                    </div>
                    <div class="difuminacion-informative" ></div>                    
                </div>
            <?php endif; ?> 

               

                <div class="actualidad-second-featured article-module-padding">
                    <div class="article-image">
                        <a href="<?php echo esc_url(get_permalink($actualidad_featured[1])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $actualidad_featured_image_2[0] ?>">
                            </div>
                        </a>
                    </div>

                    <?php fide_list_cats_links($actualidad_featured[1]); ?>
                    <h3 class="title_note_informative"><?php fide_title_link($actualidad_featured[1]); ?></h3>
                    <div class="nota-info">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $actualidad_featured[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($actualidad_featured[1], 500) ?>
                        </span>
                    </div>
                    <div class="difuminacion-informative" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($actualidad_featured[1]); ?>

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
                    <h3 class="title_note_informative"><?php fide_title_link($actualidad_featured[2]); ?></h3>
                    <div class="nota-info">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $actualidad_featured[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($actualidad_featured[2], 500) ?>

                        </span>
                    </div>
                    <div class="difuminacion-informative" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($actualidad_featured[2]); ?> 

                    
                </div>
               
                </div>

            </div>
        </div>
    </section>
    <!-- FIN NOTAS INFORMATIVAS -->

    <!-- CATEGORIA NUEVA INFORMES  -->
    <?php
        # GET THE LAST 3 INFORMES POSTS
        $args_informes = array(
        "post_type" => "post",
        "category__in" => array(1046, 1052),
        "category__not_in" => array(11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019),
        "post__not_in" => $posts_already_shown,
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 5,
        );

        $loop = new WP_Query($args_informes);
        while ($loop->have_posts()) : $loop->the_post();
            $informes[] = $post->ID;
        endwhile;
        wp_reset_postdata();

        $posts_already_shown = array_merge($posts_already_shown, $informes);

        # GET THE IMAGES FOR THE FIRST THREE POSTS
        $informe_image_1 = wp_get_attachment_image_src(get_post_thumbnail_id($informes[0]), array('1024', '576'));
        $informe_image_2 = wp_get_attachment_image_src(get_post_thumbnail_id($informes[1]), array('1024', '576'));
        $informe_image_3 = wp_get_attachment_image_src(get_post_thumbnail_id($informes[2]), array('1024', '576'));
    ?>
    <SCRIPT type="text/javascript">
        window.addEventListener("resize", () => {
            resizeText2();
        })
        document.addEventListener("DOMContentLoaded", () => {
            resizeText2();
        });

        function resizeText2() {
            let titleInformes = document.getElementsByClassName('title_informes');
            let informes = document.getElementsByClassName('informes');
            let lineBetween = document.getElementsByClassName('line-between-informes');
            for (let i = 0; i < titleInformes.length; i++) {
                const size = titleInformes[i].clientHeight;
                console.log(300 - size);
                informes[i].style.height = `${ 300 - size }px`;
                const sizeTextBody = 300 - size;

                console.log('Informes ' + size);
                console.log(i);

                if ((sizeTextBody == 228) || (sizeTextBody == 264)) {
                    lineBetween[i].style.lineHeight = `${ 25.8 }px`;
                } else if (sizeTextBody == 192) {
                    lineBetween[i].style.lineHeight = `${ 24.5 }px`;
                } else if (sizeTextBody == 264) {
                    lineBetween[i].style.lineHeight = `${ 24.5 }px`;
                } else if (sizeTextBody == 156) {
                    lineBetween[i].style.lineHeight = `${ 25.8 }px`;
                } else {
                    lineBetween[i].style.lineHeight = `${ 25.5 }px`;
                }

            }
        }
    </SCRIPT>

    <style>
        .informes {
            position: relative;
            overflow: hidden;
        }
    </style>

    <section>

        <hr class="generic-hr hr-up">
        <div class="grid-container">
            <div class="grid">
                <div class="section-title px40 ibm-serif weight600 col-1-1">
                    <span>Informes</span>
                </div>
            </div>
        </div>

        <div class="grid-container">
            <div class="grid">

                <div class="legislacion-first-featured">

                    <div class="article-image">
                        <a href="<?php echo esc_url(get_permalink($informes[0])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $informe_image_1[0] ?>">
                            </div>
                        </a>
                    </div>

                    <?php fide_list_cats_links($informes[0]); ?>
                    <h3 class="title_informes"><?php fide_title_link($informes[0]); ?></h3>
                    <div class="informes">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $informes[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line-between-informes">
                            <?php fide_excerpt($informes[0], 600) ?>
                        </span>
                    </div>
                    <div class="difuminacion-informes" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($informes[0]); ?>
                </div>

                <div class="legislacion-second-featured">

                    <div class="article-image">
                        <a href="<?php echo esc_url(get_permalink($informes[1])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $informe_image_2[0] ?>">
                            </div>
                        </a>
                    </div>

                    <?php fide_list_cats_links($informes[1]); ?>
                    <h3 class="title_informes"><?php fide_title_link($informes[1]); ?></h3>
                    <div class="informes">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $informes[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line-between-informes">
                            <?php fide_excerpt($informes[1], 600) ?>
                        </span>
                    </div>
                    <div class="difuminacion-informes" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($informes[1]); ?>

                </div>

                <div class="legislacion-third-featured">

                    <div class="article-image">
                        <a href="<?php echo esc_url(get_permalink($informes[2])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $informe_image_3[0] ?>">
                            </div>
                        </a>
                    </div>

                    <?php fide_list_cats_links($informes[2]); ?>
                    <h3 class="title_informes"><?php fide_title_link($informes[2]); ?></h3>
                    <div class="informes">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $informes[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line-between-informes">
                            <?php fide_excerpt($informes[2], 600) ?>
                        </span>
                    </div>
                    <div class="difuminacion-informes" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($informes[2]); ?>
                </div>

            </div>
        </div>

        <div class="jurisprudencia-bottom-margin"></div>

    </section>
    <!-- FIN CATEGORIA NUEVA INFORMES  -->


    <!-- CATEGORIA NORMATIVA -->
    <?php
        # GET THE LAST NORMATIVA POST
        $args_normativa = array(
        "post_type" => "post",
        "category__in" => array(1016),
        "category__not_in" => array(11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019),
        "post__not_in" => $posts_already_shown,
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 1,
        );

        $loop = new WP_Query($args_normativa);
        while ($loop->have_posts()) : $loop->the_post();
            $normativa[] = $post->ID;
        endwhile;
        wp_reset_postdata();

        $posts_already_shown = array_merge($posts_already_shown, $normativa);
        $normativa_img = wp_get_attachment_image_src(get_post_thumbnail_id($normativa[0]), array('1024', '576'));
    ?>

    <script type="text/javascript">
        window.addEventListener("resize", () => {
            resizeText3();
        })
        document.addEventListener("DOMContentLoaded", () => {
            resizeText3();
        });

        function resizeText3() {
            let titleNormativa = document.getElementsByClassName('title_normativa');
            let normativa = document.getElementsByClassName('normativa');
            for (let i = 0; i < titleNormativa.length; i++) {
                const size = titleNormativa[i].clientHeight;
                console.log(390 - size);
                normativa[i].style.height = `${ 390 - size }px`;
                const sizeTextBody = 390 - size;
                console.log('normativa ' + size);
                console.log(i);
            }
        };
    </script>

    <style>
        .normativa {
            position: relative;
            overflow: hidden;
        }
    </style>

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
            <div class="grid">

                <div class="internacional-featured-text">
                    <?php fide_list_cats_links($normativa[0]); ?>
                    <h1 class="title_normativa"><?php fide_title_link($normativa[0]); ?></h1>
                    <div class="normativa">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $normativa[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($normativa[0], 1000) ?>
                        </span>
                    </div>
                    <div class="difuminacion-normativa" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($normativa[0]); ?>
                </div>

                <div class="internacional-featured-image">
                    <a href="<?php echo esc_url(get_permalink($normativa[0])); ?>">
                        <div class="crop">
                            <img class="cropped" src="<?php echo $normativa_img[0] ?>">
                        </div>
                    </a>
                </div>

            </div>

        </div>


        <!-- FIN CATEGORIA NORMATIVA -->

        <?php
            # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$noticias_destacadas[]"
            $args_noticias_destacadas = array(
            "post_type" => "post",
            "category__and" => array(1003, 363),
            "post_status" => "publish",
            "orderby" => array(
                "post_date"     =>  "DESC",
            ),
            "posts_per_page" => 3,
            );

            $loop = new WP_Query($args_noticias_destacadas);

            while ($loop->have_posts()) : $loop->the_post();
                $noticias_destacadas[] = $post->ID;
            endwhile;
            // ELSE and END IF at the end of the highlighted posts div

        ?>
    </section>

    <!-- FIN CATEGORIA NORMATIVA -->

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

        $loop = new WP_Query($args_last_normativa);
        while ($loop->have_posts()) : $loop->the_post();
            $last_normativa[] = $post->ID;
        endwhile;
        wp_reset_postdata();

    ?>

    <section class="margin-top">
        <hr class="generic-hr hr-up">
        <div class="grid-container">
            <div class="table-title">Normativa reciente</div>

            <?php

            $i = 0;

            foreach ($last_normativa as $post => $post_id) {

                $cats_only_within_normativa = wp_get_post_categories($last_normativa[$i], array("include" => array(1017, 1018, 1019)));

                if (get_the_category_by_ID($cats_only_within_normativa[0]) == 'Normativa estatal') {
                    $normativa_area_short_name = 'Estatal';
                } elseif (get_the_category_by_ID($cats_only_within_normativa[0]) == 'Normativa autonómica') {
                    $normativa_area_short_name = 'Autonómica';
                } elseif (get_the_category_by_ID($cats_only_within_normativa[0]) == 'Normativa internacional') {
                    $normativa_area_short_name = 'Internacional';
                }

                print '
                                <div class="grid table-row-padding">
                                    <a class="table-category-link weight600" href="' . site_url() . '/actualidad/normativa">' . $normativa_area_short_name . '</a>

                                    <div class="table-article-date gray-9">' . get_the_date("d M. 'y", $last_normativa[$i]) . '</div>

                                    <div class="table-article-container table-article-container-home">
                                        <a class="table-article-title weight600 red-hover" href="' . esc_url(get_permalink($last_normativa[$i])) . '">' . get_the_title($last_normativa[$i]) . '</a>
                                        <span class="table-article-excerpt gray-9 weight400">&nbsp;&nbsp;' . substr(get_the_excerpt($last_normativa[$i]), 0, 100) . '</span>
                                    </div>
                                </div>
                            ';

                if ($i == 9) {
                    print '<div class="table-bottom-margin"></div>';
                } else {
                    print '<hr class="table-hr-line">';
                }

                ++$i;
            }

            ?>

        </div>
        </div>
    </section>

    <script type="text/javascript">
        window.addEventListener("resize", () => {
            resizeText3();
        })
        document.addEventListener("DOMContentLoaded", () => {
            resizeText3();
        });

        function resizeText3() {
            let titleJurisprudencia = document.getElementsByClassName('title_jurisprudencia');
            let jurisprudencia = document.getElementsByClassName('jurisprudencia');
            for (let i = 0; i < titleJurisprudencia.length; i++) {
                const size = titleJurisprudencia[i].clientHeight;
                console.log(390 - size);
                jurisprudencia[i].style.height = `${ 224 - size }px`;
                const sizeTextBody = 300 - size;
                console.log('jurisprudencia ' + size);
                console.log(i);
            }
        };
    </script>

    <style>
        .jurisprudencia {
            position: relative;
            overflow: hidden;
        }
    </style>

    <?php
        # GET THE LAST 6 JURISPRUDENCIA POSTS

        $args_jurisprudencia = array(
        "post_type" => "post",
        "category__in" => array(1015),
        "category__not_in" => array(11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019),
        "post__not_in" => $posts_already_shown,
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 5,
        );

        $loop = new WP_Query($args_jurisprudencia);
        while ($loop->have_posts()) : $loop->the_post();
            $jurisprudencia[] = $post->ID;
        endwhile;
        wp_reset_postdata();

        $posts_already_shown = array_merge($posts_already_shown, $jurisprudencia);
        $jurisprudencia_img = wp_get_attachment_image_src(get_post_thumbnail_id($jurisprudencia[0]), array('1024', '576'));

    ?>

    <!-- SECCION JURISPRUDENCIA -->    
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
                    <h1 class="title_jurisprudencia"><?php fide_title_link($jurisprudencia[0]); ?></h1>

                    <div class="one-columns-text">
                        <div class="jurisprudencia">
                            <span class="gray-9"><?php echo get_the_date("d M 'y", $jurisprudencia[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="line24">
                                <?php fide_excerpt($jurisprudencia[0], 850) ?>
                            </span>
                            <div class="difuminacion-legislacion" style="width: 100%;height: 62px;margin-top: -132px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                        </div>
                        <?php fide_read_more_link($jurisprudencia[0]); ?>
                    </div>
                </div>

                <div class="jurisprudencia-breves">
                    <!-- BREVE 1 --> 
                    <hr class="generic-hr mobile-only">
                    <div class="breves" style="height: 120px; overflow: hidden;">                       
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[1]) ?></p>                                                                     
                    </div>
                    <div class="difuminacion-legislacion" style=""></div>
                    <!-- BREVE 2 --> 
                    <hr class="generic-hr">
                    <div style="height: 120px; overflow: hidden;">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[2]) ?></p>                                                                     
                    </div>
                    <div class="difuminacion-legislacion" style=""></div>
                    <!-- BREVE 3 --> 
                    <hr class="generic-hr">
                    <div style="height: 120px; overflow: hidden;">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[3]) ?></p>                      
                    </div>      
                    <div class="difuminacion-legislacion" style=""></div>            
                    
                    
                    <!-- BREVE 4 --> 
                    <hr class="generic-hr">
                    <div style="height: 120px; overflow: hidden;">
                        <p><?php fide_jurisprudencia_shorts($jurisprudencia[4]) ?>  </p>                                                  
                    </div>
                    <div class="difuminacion-legislacion" style=""></div>
                    
                </div>

            </div>
        </div>

        <div class="jurisprudencia-bottom-margin"></div>

    </section>


    <?php
        # GET THE LAST 6 LEGISLACIÓN POSTS

        $args_legislacion = array(
        "post_type" => "post",
        "category__in" => array(1014),
        "category__not_in" => array(11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019),
        "post__not_in" => $posts_already_shown,
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 5,
        );

        $loop = new WP_Query($args_legislacion);
        while ($loop->have_posts()) : $loop->the_post();
            $legislacion[] = $post->ID;
        endwhile;
        wp_reset_postdata();

        $posts_already_shown = array_merge($posts_already_shown, $legislacion);

        # GET THE IMAGES FOR THE FIRST THREE POSTS
        $legislacion_image_1 = wp_get_attachment_image_src(get_post_thumbnail_id($legislacion[0]), array('1024', '576'));
        $legislacion_image_2 = wp_get_attachment_image_src(get_post_thumbnail_id($legislacion[1]), array('1024', '576'));
        $legislacion_image_3 = wp_get_attachment_image_src(get_post_thumbnail_id($legislacion[2]), array('1024', '576'));

    ?>

<style>
        .legislacion {
            position: relative;
            overflow: hidden;
        }
       
    </style>

    <script type="text/javascript">
        window.addEventListener("resize", () => {
            resizeText4();
        })
        document.addEventListener("DOMContentLoaded", () => {
            resizeText4();
        });

        function resizeText4() {
            let titleLegislacion = document.getElementsByClassName('title_legislacion');
            let legislacion = document.getElementsByClassName('legislacion');
            let line24 = document.getElementsByClassName('difuminacion-legislacion');
            for (let i = 0; i < titleLegislacion.length; i++) {
                const size = titleLegislacion[i].clientHeight;

                legislacion[i].style.height = `${ 300 - size }px`;
                const sizeTextBody = 300 - size;
                console.log('imagen legislacion ', size);
                if(size == 36 ){
                    console.log('entra por el if ')
                    // line24[i].style.marginTop = `${ -40 }px`;
                }

            }
           
        }
    </script>

    

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
                    <h3 class="title_legislacion"><?php fide_title_link($legislacion[0]); ?></h3>
                    <div class="legislacion">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $legislacion[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($legislacion[0], 600) ?>
                        </span>
                    </div>
                    <div class="difuminacion-legislacion" style=""></div>
                    <?php fide_read_more_link($legislacion[0]); ?>
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
                    <h3 class="title_legislacion"><?php fide_title_link($legislacion[1]); ?></h3>
                    <div class="legislacion">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $legislacion[1]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($legislacion[1], 600) ?>
                        </span>
                    </div>
                    <div class="difuminacion-legislacion" style=""></div>
                    <?php fide_read_more_link($legislacion[1]); ?>
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
                    <h3 class="title_legislacion"><?php fide_title_link($legislacion[2]); ?></h3>
                    <div class="legislacion">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $legislacion[2]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($legislacion[2], 600) ?>
                        </span>
                    </div>
                    <div class="difuminacion-legislacion" ></div>
                    <?php fide_read_more_link($legislacion[2]); ?>

                </div>

            </div>
        </div>

        <div class="legislacion-bottom-margin"></div>

    </section>



    <?php
        # GET THE LAST INTERNACIONAL POST
        $args_internacional = array(
        "post_type" => "post",
        "category__in" => array(1013),
        "category__not_in" => array(11, 1002, 1003, 1004, 1041, 1012, 1004, 1017, 1018, 1019),
        "post__not_in" => $posts_already_shown,
        "post_status" => "publish",
        "orderby" => array(
            "menu_order"    => "ASC",
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 1,
        );

        $loop = new WP_Query($args_internacional);
        while ($loop->have_posts()) : $loop->the_post();
            $internacional[] = $post->ID;
        endwhile;
        wp_reset_postdata();

        $posts_already_shown = array_merge($posts_already_shown, $internacional);
        $internacional_img = wp_get_attachment_image_src(get_post_thumbnail_id($internacional[0]), array('1024', '576'));
    ?>

    <!--JAVA SCRIPT Y CSS PARA LA SECCION INTERNATION-->
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            let titleInternational = document.getElementsByClassName('title_international');
            let international = document.getElementsByClassName('international');
            let imgsize = document.getElementsByClassName('cropped');

            for (let i = 0; i < titleInternational.length; i++) {
                const size = titleInternational[i].clientHeight;
                const sizeImg = imgsize[i].clientHeight;
                international[i].style.height = `${ 415 - size }px`;
                const sizeTextBody = 450 - size;
            }
        });
    </script>

    <style>
        .international {
            position: relative;
            overflow: hidden;
        }
    </style>
    
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
                    <h1 class="title_international"><?php fide_title_link($internacional[0]); ?></h1>
                    <div class="international">
                        <span class="gray-9"><?php echo get_the_date("d M 'y", $internacional[0]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="line24">
                            <?php fide_excerpt($internacional[0], 800) ?>
                        </span>
                    </div>
                    <div class="difuminacion-international" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                    <?php fide_read_more_link($internacional[0]); ?>
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

        $loop = new WP_Query($args_last_news);
        while ($loop->have_posts()) : $loop->the_post();
            $last_news[] = $post->ID;
        endwhile;
        wp_reset_postdata();
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

                $cats_minus_featured = wp_get_post_categories($last_news[$i], array("exclude" => array(363)));
                $news_channel = get_post_meta($last_news[$i], 'medio', false);
                $news_link = get_post_meta($last_news[$i], 'link', false);

                print '
                            <div class="grid table-row-padding-news">
                                <span class="table-category-link weight600">' . end($news_channel) . '</span>

                                <div class="table-article-date gray-9">' . get_the_date("d M. 'y", $last_news[$i]) . '</div>

                                <div class="table-article-container">
                                    <a class="table-article-title weight600 red-hover" target="_blank" href="' . esc_url(end($news_link)) . '">' . get_the_title($last_news[$i]) . '</a>
                                    <span class="table-article-excerpt gray-9 weight400">&nbsp;&nbsp;' . substr(get_the_excerpt($last_news[$i]), 0, 100) . '</span>
                                </div>
                            </div>
                        ';

                if ($i == 9) {
                    print '<div class="table-bottom-margin"></div>';
                } else {
                    print '<hr class="table-hr-line">';
                }

                ++$i;
            }

            ?>

        </div>
    </section>



    <?php get_footer(); ?>