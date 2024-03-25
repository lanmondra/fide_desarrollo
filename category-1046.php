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
        "posts_per_page" => 2,
        "paged" => $paged,
    );

    $loop = new WP_Query($args_inf_fide_archive);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            $info_fide_archive[] = $post->ID;
        endwhile;


        // ELSE and END IF at the end of the page, after the pagination

    ?>
        <style>
            .new-style {}

            .cropped-new {
                width: 260px;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            .container-informes {
                display: flex;
                grid-template-columns: 1fr;
                grid-gap: 20px;
            }

            .second-row-info-fide {
                margin-left: 15px;
                margin-top: -10px;
            }

            .title_category {
                margin: 32px 0 10px;
            }

            @media all and (max-width: 980px) {


                .category {
                    display: none;
                }

            }

            @media all and (max-width: 575px) {
                .category {
                    display: none;
                }

                .title_category {
                    font-size: 21px;

                }

                .first-row-info-fide {}

                .container-informes {
                    display: block;
                    grid-template-columns: 1fr;
                    grid-gap: 10px;
                }

                .second-row-info-fide {
                    margin-left: 0px;
                    margin-top: 0px;
                }

                .cropped-new {
                    width: 320px;
                    height: 100%;
                    object-fit: cover;
                    display: block;

                }
            }
        </style>

        <div class="grid-container">
            <div style="display: flow;">

                <?php
                for ($i = 0; $i <= 2; $i++) {
                    if ($info_fide_archive[$i]) : ?>
                        <div class="container-informes">

                            <div class="first-row-info-fide">
                                <a href="<?php echo esc_url(get_permalink($info_fide_archive[$i])); ?>">
                                    <div class="cro new-style">
                                        <img class="cropped-new" src="<?php fide_feat_img_url($info_fide_archive[$i]) ?>">
                                    </div>
                                </a>
                                <?php fide_list_cats_links($info_fide_archive[$i]); ?>
                            </div>
                            <div class="second-row-info-fide">
                                <h3 class="title_category"><?php fide_title_link_shortened($info_fide_archive[$i], 160); ?></h3>
                                <div class="category">
                                    <span class="gray-9"><?php echo get_the_date("d M 'y", $info_fide_archive[$i]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    <span class="line24">
                                        <?php fide_excerpt($info_fide_archive[$i], 80) ?>
                                        <?php fide_read_more_link($info_fide_archive[$i]); ?>
                                    </span>
                                </div>

                            </div>

                        </div><br /><br />
                <?php endif;
                } ?>
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