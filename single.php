


<?php get_header(); ?>

    

    <main>



        <div class="single-hero-image non-printable">
            <div class="crop">
                <?php $img_url = wp_get_attachment_image_src ( get_post_thumbnail_id(get_the_id()), array('1024','576') ); ?>
                <div class="gradient-multiply-div"></div>
                <img class="cropped hero-image-up" src="<?php print $img_url[0]; ?>">
            </div>
        </div>

        <div class="grid-container">
            <?php fide_list_cats_links(get_the_id()); ?>
        </div> <!-- End of grid container -->



        <!-- BYPASS THE SINGLE PAGE BODY CODE DEPENDING ON THE CATEGORY -->
        <!-- BYPASS THE SINGLE PAGE BODY CODE DEPENDING ON THE CATEGORY -->
        <!-- BYPASS THE SINGLE PAGE BODY CODE DEPENDING ON THE CATEGORY -->

        <?php

            // GET THE CATEGORIES AND THEIR IDS FOR THE GIVEN POST
            // $post_cats = wp_get_post_categories(get_the_id());
            // $non_article_cats = array(1002, 1003, 1004, 1012, 1017, 1018, 1019);

            // CHECK IF THE POST DOESN'T BELONGS TO ANY SPECIAL CATEGORIES, LIKE "NOTA INFORMATIVA"
            // if (!in_array(1002, $post_cats) and
            //     !in_array(1003, $post_cats) and
            //     !in_array(1004, $post_cats) and
            //     !in_array(1012, $post_cats) and
            //     !in_array(1017, $post_cats) and
            //     !in_array(1018, $post_cats) and
            //     !in_array(1019, $post_cats) ): include 'single-article.php';

            // BUT, IF IT BELONGS TO "NOTA INFORMATIVA"...
            // elseif (in_array("1004", $post_cats)): include 'single-nota-informativa.php';

            // else: 

            // endif

        ?>


        <section class="only-printable">
            <hr class="footer-hr-line">
            <div class="grid-container">

                <div class="grid">
                
                    <div class="footer-fide-logo">
                        <a href="<?php echo site_url(); ?>" title="fide.es - Inicio">
                            <img src="<?php print IMAGES; ?>/fide-logo-tax.svg" alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div>

                </div>
            </div>
        </section>



        <section class="printable">
            <div class="grid-container">
                <div class="grid">

                    <div class="post-container">

                        <h1 class="single-h1-title ibm-serif px60 line72"><?php echo get_the_title(); ?></h1>

                        <div class="single-post-details">
                            <span class="post-date weight600"><?php echo get_the_date(); ?></span>

                            <span class="post-read-time">

                                <?php

                                // "get_the_content();" should work with no need to call it inside the loop, but it seems to be a bug in the wordpress code (https://core.trac.wordpress.org/ticket/42814) and calling it inside the loop is the suggested fix by now. So...

                                while ( have_posts() ): the_post();
                                    $post_content_to_be_counted = get_the_content();
                                endwhile;

                                $post_content_without_html_tags = strip_tags($post_content_to_be_counted);
                                $post_words_counter = str_word_count($post_content_without_html_tags);
                                $post_reading_time = $post_words_counter / 250;

                                if ($post_reading_time > 1):

                                ?>

                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <img src="<?php print IMAGES ?>/icons-chrono.svg">
                                    Lectura: <?php echo number_format($post_reading_time, 0); ?> min.
                                
                                <?php endif ?>

                            </span>
                        </div>



                        <?php if (has_excerpt(get_the_id())): ?>

                            <div class="single-post-excerpt px16 line24"><?php echo wpautop(get_the_excerpt()); ?></div>

                            <div class="single-post-hr-separators">
                                <hr class="generic-hr">
                                <hr class="generic-hr">
                                <hr class="generic-hr">                            
                            </div>

                        <?php else: ?>

                            <div class="single-post-hr-separators-without-excerpt">
                                <hr class="generic-hr">
                                <hr class="generic-hr">
                                <hr class="generic-hr">                            
                            </div>

                        <?php endif ?>



                        <?php
                        // CHECK FOR POST CUSTOM FIELDS
                        $post_medio = get_post_meta(get_the_id(), 'medio', true);
                        $post_link = get_post_meta(get_the_id(), 'link', false);
                        $post_pdf = get_post_meta(get_the_id(), 'pdf', false);
                        ?>


                        <?php if ($post_medio != NULL): ?>
                            <a class="pmc-anchor" href="<?php print $post_link[0]; ?>" target="_blank">
                                <div class="post-meta-content-medium">
                                    
                                    <!-- <div class="pmc-img">
                                        <img src="<?php # print IMAGES; ?>/pmc-link.png">
                                    </div> -->
                                    <div class="pmc-medium-logo">
                                    	<img src="<?php print fide_news_media_img_alpha_url(get_the_id()); ?>">
                                    </div>
                                    <div class="pmc-text-medium">
                                        <span>Ver publicación en <?php print_r($post_medio); ?></span>
                                        <br>
                                        <span class="pmc-text-small">El enlace se abrirá en una nueva ventana</span>
                                    </div>

                                </div>
                            </a>
                        <?php endif ?>



                        <?php if ($post_medio == NULL and isset($post_link[0])):
                            print '
                                <a class="pmc-anchor" href="' . $post_link[0] . '" target="_blank">
                                    <div class="post-meta-content-link-pdf">
                                        
                                        <div class="pmc-img">
                                            <img src="' . IMAGES . '/pmc-new-link.png">
                                        </div>
                                        <div class="pmc-text-link-pdf">
                                            <span>Enlace externo al contenido</span>
                                            <br>
                                            <span class="pmc-text-small">El vínculo se abrirá en una nueva ventana</span>
                                        </div>

                                    </div>
                                </a>
                            ';
                            endif
                        ?>



                        <?php if (isset($post_pdf)):
                            foreach ($post_pdf as $pdf_url) {
                                print '
                                    <a class="pmc-anchor" href="' . $pdf_url . '" target="_blank">
                                        <div class="post-meta-content-link-pdf">
                                            
                                            <div class="pmc-img">
                                                <img src="' . IMAGES . '/pmc-new-link.png">
                                            </div>
                                            <div class="pmc-text-link-pdf">
                                                <span>' . basename($pdf_url) . '</span>
                                                <br>
                                                <span class="pmc-text-small">Descargar documento</span>
                                            </div>

                                        </div>
                                    </a>
                                ';
                            }
                            endif
                        ?>



                        <div class="single-post-content px16 line24">
                        
                            <?php

                            // "get_the_content();" should work with no need to call it inside the loop, but it seems to be a bug in the wordpress code (https://core.trac.wordpress.org/ticket/42814) and calling it inside the loop is the suggested fix by now. So...

                            while ( have_posts() ): the_post();
                                // wpautop adds <p> when finds two consecutive line breaks
                                // https://codex.wordpress.org/Function_Reference/wpautop
                            print wpautop(get_the_content());
                            endwhile;

                            ?>

                        </div>

                        <hr class="generic-hr mobile-hide">

                        <!-- PRINT BUTTON DELETED -->
                        <!-- <div class="print-article-cta-button ibm-sans" onclick={window.print()}>IMPRIMIR ARTÍCULO</div> -->

                    </div>






                    <div class="post-sidebar-container non-printable">

                        <?php // GET THE AUTHOR OF THE POST

                            // FIRST VERSION...
                            // $author_cat_check = wp_get_post_categories(get_the_id());
                            // if (in_array(1024, $author_cat_check)): print '<span class="post-author">Eduardo Espejo</span>';
                            // elseif (in_array(1025, $author_cat_check)): print '<span class="post-author">Jordi Porcel</span>';
                            // elseif (in_array(1026, $author_cat_check)): print '<span class="post-author">Jose Dacosta</span>';
                            // else: print '<span class="post-author">Redacción</span>';
                            // endif

                            $author_cat_checklist = wp_get_post_categories(get_the_id());

                            if (in_array(1025, $author_cat_checklist)): 
                                $author = array('Jordi Porcel', 'Departamento jurídico', 'fide-team-jordi-porcel.png', '');

                            elseif (in_array(1026, $author_cat_checklist)):
                                $author = array('Jose Dacosta', 'Departamento jurídico', 'fide-team-jose-dacosta.png', '');

                            elseif (in_array(1032, $author_cat_checklist)):
                                $author = array('Marina Toribio', 'Departamento jurídico', 'fide-team-marina-toribio.png', '');

                            elseif (in_array(1037, $author_cat_checklist)):
                                $author = array('Roger Ametlla', 'Departamento jurídico', 'fide-team-roger-ametlla.png', '');

                            elseif (in_array(1024, $author_cat_checklist)):
                                $author = array('Eduardo Espejo', 'Socio de FIDE Tax & Legal', 'fide-team-eduardo-espejo.png', '');

                            elseif (in_array(1038, $author_cat_checklist)):
                                $author = array('Julimer Márquez', 'Departamento jurídico', 'fide-team-julimer-marquez.png', '');

                            elseif (in_array(1039, $author_cat_checklist)):
                                $author = array('Arturo Sánchez', 'Departamento jurídico', 'fide-team-arturo-sanchez-new.png', '');

                            elseif (in_array(1042, $author_cat_checklist)):
                                $author = array('Ignacio Ciutad', 'Departamento jurídico', 'fide-team-blank.png', '');

                            elseif (in_array(1043, $author_cat_checklist)):
                                $author = array('Rafael Navarro Clavijo', 'Abogado', 'fide-team-rafael-navarro-2.png', '');

                            elseif (in_array(1044, $author_cat_checklist)):
                                $author = array('Sílvia Monje González', 'Abogada', 'fide-team-silvia-monje-2.png', '');

                            elseif (in_array(1045, $author_cat_checklist)):
                                $author = array('Gerard Miralles Quintana', 'Abogado', 'fide-team-gerard-miralles.png', '');    

                            # <!-- ADD THE NEW AUTHORS CATS TO THE FUNCTIONS.PHP FUNCTION "fide_list_cats_links()" -->
                            # <!-- ADD THE NEW AUTHORS CATS TO THE FUNCTIONS.PHP FUNCTION "fide_list_cats_links()" -->
                            # <!-- ADD THE NEW AUTHORS CATS TO THE FUNCTIONS.PHP FUNCTION "fide_list_cats_links()" -->

                            else: 
                                $author = array('Newsletter FIDE', 'Actualidad legal y tributaria', 'fide-newsletter.png', 'Este contenido fue publicado en nuestra newsletter. Suscríbete a la lista de correo de FIDE y recibe en tu email toda la actualidad legal y tributaria.', 'https://eepurl.com/gBL4ir');

                            endif

                        ?>

                        <img class="team-member" src="<?php print IMAGES; ?>/<?php print $author[2]; ?>">
                        <hr class="generic-hr">

                        <div class="team-member-name px20 weight600"><?php print $author[0]; ?></div>

                        <div class="team-member-position gray-9 px16 line24">

                            <?php print $author[1]; ?>
                            <?php if ($author[0] == "Newsletter FIDE") { print ('<br><br>' . $author[3]); } ?>

                        </div>

                        <div class="team-member-contact">
                            <?php if ($author[0] == "Newsletter FIDE") {
                                print ('<a class="team-member-contact px14" href="' . $author[4] . '" target="_blank">SUSCRIBIRME</a>');
                            } else {
                                print ('<a class="team-member-contact px14" href="' . site_url() . '/contacto">CONTACTAR</a>');
                            } ?>
                            
                        </div>

                        <hr class="generic-hr short-hr">

                        <!-- PRINT BUTTON DELETED -->
                        <!-- <div class="print-article-cta-button ibm-sans mobile-hide" style="width: 100%" onclick={window.print()}>IMPRIMIR ARTÍCULO</div> -->

                    </div>






                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->
        </section> <!-- End of section -->


        



        <?php

            # GET THREE POSTS FROM THE SAME CATEGORY, SAVE THEIR IDs ON "$posts_cat_archive[]"

            $single_post_cat = wp_get_post_categories( get_the_id(), 
            array("exclude" => array( 1, 11, 363, 1002, 1003, 1004, 1041, 1012, 1013, 1014, 1015, 1016, 1017, 1018, 1019 )));
            $exclude_actual_post = array(get_the_id());

            $args = array(
                "post_type" => "post",
                "post_status" => "publish",
                "post__not_in" => $exclude_actual_post,
                "orderby" => array("post_date" => "DESC"),
                "posts_per_page" => 10,
            );

            if (!empty($single_post_cat)) {
                $args["category__in"] = [$single_post_cat[0]];
            }

            $loop = new WP_Query($args);

            $related_posts = [];

            while ($loop->have_posts() && count($related_posts) < 3):
                $loop->the_post();
                if (has_post_thumbnail(get_the_ID())) {
                    $related_posts[] = get_the_ID();
                }
            endwhile;
            
            wp_reset_postdata();
            
            // Limitar a solo 3
            $related_posts = array_slice($related_posts, 0, 3);
            

            // ELSE and END IF at the end of the page, after the pagination

        ?>
             <!-- JavaScript para degrade de contenido relacionado -->
            <SCRIPT type="text/javascript">
                document.addEventListener("DOMContentLoaded", () => {
                    let titleContent = document.getElementsByClassName('title_content');
                    let content = document.getElementsByClassName('content');                             
                    for(let i = 0; i < titleContent.length; i++) {                      
                        const size = titleContent[i].clientHeight;
                        console.log(300 - size);                        
                        content[i].style.height = `${ 300 - size }px`;  
                        const sizeTextBody = 300 - size;
                       
                        console.log('main '+size);
                        console.log(i);

                        
                                                  
                    }
                });

            </SCRIPT>

            <style>
                .content {
                    position: relative;
                    overflow: hidden;
                                      
                }
               
            </style>

           
        <div class="grid-container non-printable">

            <div class="related-posts-title px28 weight600">Contenido relacionado</div>

            <div class="grid">

            <?php
    $featured_classes = [
    'category-first-featured',
    'category-second-featured',
    'category-third-featured'
    ];

    foreach ($related_posts as $index => $post_id):
    // Seguridad extra: asegúrate de que tenga imagen
        if (!has_post_thumbnail($post_id)) continue;
        ?>
            <div class="<?php echo $featured_classes[$index]; ?>">

                <div class="article-image">
                    <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                        <div class="crop">
                            <img class="cropped" src="<?php echo fide_feat_img_url($post_id); ?>">
                        </div>
                    </a>
                </div>

                <?php fide_list_cats_links($post_id); ?>
                <h3 class="title_content"><?php echo fide_title_link_shortened($post_id, 450); ?></h3>

                <div class="content">
                    <span class="gray-9"><?php echo get_the_date("d M 'y", $post_id); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                    <span class="line24">
                        <?php echo fide_excerpt($post_id, 660 + $index * 120); ?>
                        <br>
                    </span>
                </div>

                <div class="difuminacion-informative"
                    style="width: 100%; height: 62px; margin-top: -50px; background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%); filter: blur(1px);">
                </div>

                <?php fide_read_more_link($post_id); ?>
            </div>
    <?php endforeach; ?>


            </div>
        </div>



    </main>



<?php get_footer(); ?>


