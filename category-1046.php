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
        "posts_per_page" => 9,
        "paged" => $paged,
    );

    $loop = new WP_Query($args_inf_fide_archive);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            $info_fide_archive[] = $post->ID;
        endwhile;


        // ELSE and END IF at the end of the page, after the pagination

    ?>
        <!-- <style>
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
        </style> -->

        <SCRIPT type="text/javascript">
            document.addEventListener("DOMContentLoaded", () => {
                let titleCategory = document.getElementsByClassName('title_category');
                let image = document.getElementsByClassName('cropped-informes');
                let category = document.getElementsByClassName('category');
                let notices = document.getElementsByClassName('notices');
                for (let i = 0; i < image.length; i++) {
                    const size = image[i].clientHeight;
                    console.log(300 - size);
                    // category[i].style.height = `${ 120 - size }px`;
                    // notices[i].style.height = `${ size }px`;
                    const sizeTextBody = 300 - size;

                    console.log('main ' + size);
                    console.log(i);



                }
            });
        </SCRIPT>

        <style>
            .category {
                position: relative;
                overflow: hidden;
               

            }

            .g-container {
                display: block;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 100px 30px;
            }

            .article-image-informes {
                flex: 0 0 auto;
                margin-right: 20px;
            }

            .container-informes {
                display: flex;
                align-items: flex-start;          
                

            }

            .crop-informes {
                height: 100%;
                width: 100%;
            }

            .cropped-informes {
                height: 192px;
                width: 414px;
                object-fit: cover;


            }

            .notices {
                width: 100%;
                height: 192px;
                flex: 1;         
                display: flex;    
                flex-direction: column;
                justify-content: center;


            }

            .title_category {
                font-size: 28px;
                line-height: 36px;
                margin: 32px 0 14px;
                margin: 0;
            }


            @media all and (max-width: 980px) {
                .g-container {
                    grid-template-columns: 1fr 1fr;
                }
            }

            @media all and (max-width: 575px) {
                .g-container {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <div class="grid-container">
            <div class="g-container">

                <?php
                for ($i = 0; $i <= 5; $i++) {
                    if ($info_fide_archive[$i]) : ?>
                        <div class="element container-informes">
                            <div class="article-image-informes">
                                <a href="<?php echo esc_url(get_permalink($info_fide_archive[$i])); ?>">
                                    <div class="crop-informes">
                                        <img class="cropped-informes" src="<?php fide_feat_img_url($info_fide_archive[$i]) ?>">
                                    </div>
                                </a>
                                <?php fide_list_cats_links($info_fide_archive[$i]); ?>
                            </div>

                            <div class="notices">
                                <h3 class="title_category"><?php fide_title_link_shortened($info_fide_archive[$i], 200); ?></h3>
                                <div class="category">
                                    <span class="gray-9"><?php echo get_the_date("d M 'y", $info_fide_archive[$i]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    <span class="line24">
                                        <?php fide_excerpt($info_fide_archive[$i], 80) ?>
                                    </span>
                                    <?php fide_read_more_link($info_fide_archive[$i]); ?>
                                </div>

                            </div>


                        </div><br/>
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