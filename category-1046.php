<?php get_header(); ?>



<div class="grid-container">
    <div class="grid">
        <hr class="generic-hr short-hr-after-breadcrumb">
    </div>
</div>

<main>

    <!-- Categoria de informes fide 1046 -->

    <?php

    // Reset the posts_cat array from the previous WP_Query
    unset($info_fide_archive);

    // Count pagination
    $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

    # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$posts_cat_archive[]"

    $args_inf_fide_archive = array(
        "post_type" => "post",
        "category__in" => 1046,
        "post_status" => "publish",
        "orderby" => array(
            "post_date"     =>  "DESC",
        ),
        "posts_per_page" => 6,
        "paged" => $paged,
    );

    $loop = new WP_Query($args_inf_fide_archive);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            $info_fide_archive[] = $post->ID;
        endwhile;


        // ELSE and END IF at the end of the page, after the pagination

    ?>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", () => {
                let titleCategory = document.getElementsByClassName('title_category');
                let category = document.getElementsByClassName('category');

                const adjustHeight = () => {
                    const mediaQuery = window.matchMedia('(min-width: 980px)');
                    for (let i = 0; i < titleCategory.length; i++) {
                        const size = titleCategory[i].clientHeight;
                        if (!mediaQuery.matches) {
                            // category[i].style.height = `${300 - size}px`;
                        } else {
                            // Resetear la altura a su valor original si se cumple la media query
                            // category[i].style.height = '';
                        }
                    }
                };

                // Llama a la función de ajuste de altura al cargar la página
                adjustHeight();

                // Escucha el evento de redimensionamiento de la ventana y vuelve a ajustar la altura
                window.addEventListener("resize", adjustHeight);
            });
        </script>
        <style>
            .category {
                position: relative;
                overflow: hidden;
            }

            .cat-info-difuminade {
                width: 100%;
                height: 62px;
                margin-top: -50px;
                background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);
                filter: blur(1px);
            }

            a {
                font-size: medium;
                color: #AC0600;
            }

            .div-fecha {
                width: 151px;
                flex-direction: column;
                justify-content: center;
                height: auto;
                margin-top: 22px;
                font-weight: bold;
                margin-left: 49px;
            }
            .informes-hr-line{   
                border: 0;
                height: 0;
                border-top: 1px solid #CCCCCC;
               
              
              }

            @media (min-width: 980px) {
                .content-wrap {
                    width: calc(100% - 163px);
                    flex-direction: column;
                    justify-content: center;
                    margin-top: 10px;
                    font-weight: bold;
                }

                .gg-container {
                    display: block;
                    grid-template-columns: 1fr;
                    gap: 100px 30px;
                }

                .category {
                    height: 31px;
                }

                .cat-info-difuminade {
                    display: none;
                }

                .element {
                    display: flex;
                    gap: 22px;
                }

                .title_category {
                    font-size: 28px;
                    line-height: 36px;
                    margin: 0;
                }
            }


            @media all and (max-width: 980px) {
                .content-wrap {
                    width: calc(100% - 163px);
                    flex-direction: column;
                    justify-content: center;
                    font-weight: bold;
                }

                .element {
                    display: flex;
                    gap: 10px;
                }

                .div-fecha {
                    margin-top: 5%;
                }
            }

            @media all and (max-width: 575px) {
                .div-fecha {
                    margin-top: 5%;
                    display: none;
                }

                .content-wrap {
                    width: calc(100% - 137px);
                    flex-direction: column;
                    justify-content: center;
                    margin-top: -7%;
                }

                a {
                font-size: 13px;
                color: #AC0600;
                    }
            }
        </style>

        <div class="grid-container">
            <div class="gg-container">

                <?php
                for ($i = 0; $i <= 5; $i++) {

                    if (isset($info_fide_archive[$i])) : ?>
                       <hr class="informes-hr-line" />
                        <div class="element">
                            <div class="article-images">
                                <a href="<?php echo esc_url(get_permalink($info_fide_archive[$i])); ?>">
                                    <div class="cropt">
                                        <img class="cropped-img-informes" src="<?php fide_feat_img_url($info_fide_archive[$i]) ?>">
                                    </div>
                                </a>                             
                            </div>
                            <div class="div-fecha">
                                <span class="gray-9"><?php echo get_the_date("d M 'y", $info_fide_archive[$i]); ?></span>
                            </div>

                            <div class="content-wrap">
                                <h6 class="title_category"><?php fide_title_link_shortened($info_fide_archive[$i], 250); ?></h6>
                            </div>

                        </div>

                <?php endif;
                } ?>
                <hr class="informes-hr-line"/>
            </div>
        </div>

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
                                                                                    ?> <span class="pag-link-previous 16px">
                        <?php previous_posts_link('ANTERIOR'); ?>
                    </span>
                <?php
                                                                                }

                ?><div class="pagination pag-info 16px">
                    PÁGINA <?php print    $paged . ' DE ' . $loop->max_num_pages; ?>
                </div>
                <?php
                if ($paged == $loop->max_num_pages) {
                ?><span class="pagination pag-disabled-next 16px">Siguiente</span><?php
                                                                                } else {
                                                                                    ?> <span class="pag-link-next 16px">
                        <?php next_posts_link('SIGUIENTE'); ?> </span> <?php
                                                                                }
                                                                            }

                                                                        // End of provisional navigation

                                                                        // CLOSE THE IF FROM THE TOP OF THE PAGE
                                                                        else : _e("");
                                                                        endif;

                                                                        wp_reset_postdata();
                                                                        ?>

        </div> <!-- End of grid -->
    </div> <!-- End of container-margin -->
</div> <!-- End of grid container -->



<?php get_footer(); ?>