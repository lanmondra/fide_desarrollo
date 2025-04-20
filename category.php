
<?php get_header('analytics'); ?>


<section>

    <div class="grid-container">
        <div class="grid">
            <hr class="generic-hr short-hr-after-breadcrumb">
        </div>
    </div>

    <?php $unique_id = esc_attr(uniqid('search-form-')); ?>

    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="grid-container">
            <div class="grid">
                <input type="search" id="<?php echo $unique_id; ?>" class="search-input" placeholder="Buscar en fide.es..." value="" name="s" spellcheck="false" autocomplete="off" />
                <input type="submit" id="searchsubmit" value="BUSCAR" />
            </div>
        </div>
    </form>

</section>

<section>
    <main>



        <?php

        // Reset the posts_cat array from the previous WP_Query
        unset($posts_cat_archive);

        // Count pagination
        $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;

        # GET THE CATEGORY POSTS, SAVE THEIR IDs ON "$posts_cat_archive[]"
        // 1004, "NOTAS INFORMATIVAS" included on the query


        $args_cat_archive = array(
            "post_type" => "post",
            "category__in" => get_query_var("cat"),
            "category__not_in" => array(11, 1002, 1003, 1012, 1017, 1018, 1019),
            "post_status" => "publish",
            "orderby" => array(
                "post_date"     =>  "DESC",
            ),
            "posts_per_page" => 6,
            "paged" => $paged,
        );

        $loop = new WP_Query($args_cat_archive);

        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
                $posts_cat_archive[] = $post->ID;
            endwhile;

            // ELSE and END IF at the end of the page, after the pagination

        ?>

            <SCRIPT type="text/javascript">
                document.addEventListener("DOMContentLoaded", () => {
                    let titleCategory = document.getElementsByClassName('title_category');
                    let category = document.getElementsByClassName('category');
                    for (let i = 0; i < titleCategory.length; i++) {
                        const size = titleCategory[i].clientHeight;
                        console.log(300 - size);
                        category[i].style.height = `${ 300 - size }px`;
                        const sizeTextBody = 300 - size;
                        console.log('main ' + size);
                        console.log(i);
                    }
                });
            </SCRIPT>

            <div class="grid-container">
                <div class="g-container">
                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                        if ($posts_cat_archive[$i]) :
                    ?>
                            <div class="element">
                                <div class="article-image">
                                    <a href="<?php echo esc_url(get_permalink($posts_cat_archive[$i])); ?>">
                                        <div class="crop">
                                            <img class="cropped" src="<?php fide_feat_img_url($posts_cat_archive[$i]) ?>">
                                        </div>
                                    </a>
                                </div>

                                <?php fide_list_cats_links($posts_cat_archive[$i]); ?>
                                <h3 class="title_category"><?php fide_title_link_shortened($posts_cat_archive[$i], 250); ?></h3>
                                <div class="category">
                                    <span class="gray-9"><?php echo get_the_date("d M 'y", $posts_cat_archive[$i]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    <span class="line24">
                                        <?php fide_excerpt($posts_cat_archive[$i], 700) ?>
                                    </span>
                                </div>
                                <div class="prueba" style="width: 100%;height: 62px;margin-top: -50px;background: linear-gradient(0deg, rgb(255 255 255) 0%, rgb(253 253 253 / 61%) 100%);filter: blur(1px);"></div>
                                <?php fide_read_more_link($posts_cat_archive[$i]); ?>
                            </div>
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

                    // GET THE CATEGORY ID
                    $fide_category_ID = get_query_var("cat");

                    // IF IS A PARTICULAR CATEGORY, SHOW PAGINATION
                    // if ($fide_category_ID == 6) {

                    if ($paged == 1) {
                ?><span class="pagination pag-disabled-previous 16px">ANTERIOR</span><?php
                                                                                                        } else {
                                                                                                            ?>
                        <span class="pag-link-previous 16px">
                            <?php previous_posts_link('ANTERIOR'); ?>
                        </span>
                    <?php
                                                                                                        }

                    ?>
                    <div class="pagination pag-info 16px">
                        PÁGINA <?php print    $paged . ' DE ' . $loop->max_num_pages; ?>
                    </div>
                    <?php


                    if ($paged == $loop->max_num_pages) {
                    ?><span class="pagination pag-disabled-next 16px">Siguiente</span><?php
                                                                                                    } else {
                                                                                                        ?>
                        <span class="pag-link-next 16px">
                            <?php next_posts_link('SIGUIENTE'); ?>
                        </span>
            <?php
                                                                                                    }

                                                                                                    // } else {}

                                                                                                }

                                                                                            // End of provisional navigation

                                                                                            // CLOSE THE IF FROM THE TOP OF THE PAGE
                                                                                            else :
                                                                                                _e("");
                                                                                            endif;

                                                                                            wp_reset_postdata();

            ?>

            </div> <!-- End of grid -->
        </div> <!-- End of container-margin -->
    </div> <!-- End of grid container -->



</section>



<?php get_footer(); ?>