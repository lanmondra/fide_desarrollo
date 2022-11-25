<?php /* Template Name: Home */ ?>



<?php get_header(); ?>



    <main>

        <section>



            <?php

                # CHECK IF THERE'S ANY "DIRECTE" AND GET THE IFRAME LINK ($en_directe_url) AND THE TITLE ($en_directe_title), SAVE THEIR IDs ON "$en_portada[]" AND THE FIRST URL ON "$eptvmp4_url"

                $args = array(
                    "post_type" => "post",
                    "category_name" => "en-directe",
                    "post_status" => "publish",
                    "orderby" => array(
                        "post_date"     =>  "DESC",
                        ),
                    "posts_per_page" => 1,
                    );

                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $en_directe[] = $post->ID; 
                $en_directe_url = get_post_meta( get_the_ID(), "eptv-post-video-url", true );
                $en_directe_title = get_the_title( get_the_ID() );
                endwhile; wp_reset_postdata();

            ?>

            <?php if ($en_directe) : ?>

            <div class="grid-container directe-home">
                <div class="grid">

                    <div class="post-video">

                        <div class="iframe-container">
                            <iframe src="<?php echo $en_directe_url; ?>" allowfullscreen></iframe>
                        </div>

                        <!-- 
                        Actual one?
                        allow="fullscreen"

                        allowfullscreen=true
                        webkitallowfullscreen=true
                        mozallowfullscreen=true
                         -->
                        
                    </div>

                    <div class="post-video-details-grid">

                        <!-- TITLE -->

                        <div class="post-title-and-content-container-directe">
                            <!-- H1 not detecting the third class .line48, so adding line-height to .px36 -->
                            <h1 class="poppins px36 line48"><?php echo $en_directe_title; ?></h1>
                        </div>

                    </div> <!-- End of post-video-details-grid -->

                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->

            <?php else : ?>
            <?php endif; ?>



            <div class="grid-container">
                <div class="grid">

                    <?php

                        # GET THE FIRST THREE FEATURED POSTS, SAVE THEIR IDs ON "$en_portada[]" AND THE FIRST URL ON "$eptvmp4_url"

                        $args = array(
                            "post_type" => "post",
                            "category_name" => "en-portada",
                            "post_status" => "publish",
                            "orderby" => array(
                                "menu_order"    => "ASC",
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 3,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $en_portada[] = $post->ID; 
                        $eptvmp4_url = get_post_meta( get_the_ID(), "eptv-post-video-url", true );
                        endwhile; wp_reset_postdata();

                        # GET THE POSTER IMAGES FOR THE FIRST THREE FEATURED POSTS IN DIFFERENT SIZES

                        $featured_image_1 = wp_get_attachment_image_src ( get_post_thumbnail_id($en_portada[0]), array('1024','576') );
                        $featured_image_2 = wp_get_attachment_image_src ( get_post_thumbnail_id($en_portada[1]), array('768','432') );
                        $featured_image_3 = wp_get_attachment_image_src ( get_post_thumbnail_id($en_portada[2]), array('768','432') );

                    ?>



                    <div class="featured-1-video">
                        <video
                            id="my-player"
                            class="video-js vjs-eptv vjs-16-9"
                            poster="<?php echo $featured_image_1[0]; ?>"
                            controls
                            preload="none" 
                            >
                            <!-- data-setup='{"autoplay": true}' deleted from attributes - Initializing VJS from script.js using element ID -->



                            <!-- NEW BYPASS APRIL 2019 -->
                            <!-- NEW BYPASS APRIL 2019 -->
                            <!-- NEW BYPASS APRIL 2019 -->
                            <source src="<?php get_bypassed_s3_link($en_portada[0]); ?>" type="video/mp4">
                            
                            <?php

                                # $post_id = $en_portada[0];
                                # $url = get_post_meta( $post_id, "eptv-post-video-url", true );
                                # $filename = basename( $url ); // to get file

                                # $last_backup_time = 1554112294;
                                # if (get_the_time('U', $post_id)<$last_backup_time) {
                                #     print '<source src="https://s3.eu-west-3.amazonaws.com/eptvmp4/' . $filename . '" type="video/mp4">';
                                # } else {
                                #     print '<source src="https://s3.eu-west-3.amazonaws.com/eptvmp4temp/' . $filename . '" type="video/mp4">';
                                # }

                            ?>


                            <!-- <source src="<?php #echo get_post_meta( $en_portada[0], "eptv-post-video-url", true); ?>" type='video/mp4'> -->



                            <p class="vjs-no-js">
                                Per visualitzar aquest vídeo, activeu JavaScript i considereu l'actualització a un navegador web
                                <a href="https://en.wikipedia.org/wiki/HTML5_video#Browser_support" target="_blank">compatible amb vídeo HTML5</a>
                            </p>
                        </video>
                    </div>

                    <div class="featured-1-data">

                        <a class="title-link" href="<?php echo esc_url(get_permalink($en_portada[0])); ?>">
                            <div class="title-container">
                                <h1 class="poppins"><?php echo eptv_title_featured(get_the_title( $en_portada[0] )); ?></h1>
                            </div>
                        </a>    

                        <div class="featured-details">
                            <div class="f1d-date-and-cats gray-1">
                                <?php echo get_the_time( 'l, j \d\e F \d\e Y', $en_portada[0] ); ?>
                                <br>
                                <div class="clip-cats"><?php eptv_list_cats($en_portada[0]); ?></div>
                            </div>
                            <div class="share unselectable">
                                <a class="share-disabled" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink($en_portada[0])); ?>" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-facebook.svg" alt="Facebook"></a>
                                <a class="share-disabled" title="Twitter" href="https://twitter.com/share?url=https://elprat.tv/?p=<?php print $en_portada[0]; ?>&text='<?php echo get_the_title($en_portada[0]); ?>' via @elprat_tv &#x1F4FA &#x1F449" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-twitter.svg" alt="Twitter"></a>
                                <a class="share-disabled" title="Email" href="mailto:?subject=<?php urlencode_deep(print get_the_title($en_portada[0])); ?>&body=<?php urlencode_deep(print esc_url(get_permalink($en_portada[0]))); ?>">
                                    <img src="<?php print IMAGES; ?>/icons-share-email.svg" alt="Email"></a>
                                <a class="share-disabled" title="Descarregar" href="<?php echo get_post_meta( $en_portada[0], "eptv-post-video-url", true); ?>" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-download.svg" alt="Descarregar"></a>
                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-link.svg" alt="Link"> -->

                                <!-- Url for embed function -->
                                <input type="text" value="<iframe width=&#34;560&#34; height=&#34;315&#34; src=&#34;https://www.elprat.tv/embed-video-s3/?video=<?php print $en_portada[0]; ?>&#34; frameborder=&#34;0&#34; allow=&#34;accelerometer; encrypted-media; gyroscope; picture-in-picture&#34; allowfullscreen></iframe>" id="embed-hidden">

                                <!-- Embed function -->
                                <span class="share-disabled" id="copy" title="Inserir" href="#">
                                    <img src="<?php print IMAGES; ?>/icons-share-embed.svg" alt="Inserir">
                                </span>

                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-whatsapp.svg" alt="WhatsApp"> -->
                                <img class="share-open" src="<?php print IMAGES; ?>/icons-share.svg" alt="Compartir">
                                <img class="share-close share-disabled" src="<?php print IMAGES; ?>/icons-share-close.svg" alt="Compartir">
                            </div>
                        </div>

                    </div>



                    <article class="featured-2">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($en_portada[1])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $featured_image_2[0]; ?>">
                            </div>
                            <div class="f-2-3-title-container">
                                <h2 class="poppins"><?php echo eptv_title_featured(get_the_title( $en_portada[1] )); ?></h2>
                            </div>
                        </a>    

                        <div class="featured-details">
                            <div class="f1d-date-and-cats gray-1">
                                <?php echo get_the_time( 'l, j \d\e F \d\e Y', $en_portada[1] ); ?>
                                <br>
                                <div class="clip-cats"><?php eptv_list_cats($en_portada[1]); ?></div>
                            </div>
                            <div class="share unselectable">
                                <a class="share-disabled" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink($en_portada[1])); ?>" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-facebook.svg" alt="Facebook"></a>
                                <a class="share-disabled" title="Twitter" href="https://twitter.com/share?url=https://elprat.tv/?p=<?php print $en_portada[1]; ?>&text='<?php echo get_the_title($en_portada[1]); ?>' via @elprat_tv &#x1F4FA &#x1F449" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-twitter.svg" alt="Twitter"></a>
                                <a class="share-disabled" title="Email" href="mailto:?subject=<?php urlencode_deep(print get_the_title($en_portada[1])); ?>&body=<?php urlencode_deep(print esc_url(get_permalink($en_portada[1]))); ?>">
                                    <img src="<?php print IMAGES; ?>/icons-share-email.svg" alt="Email"></a>
                                <a class="share-disabled" title="Descarregar" href="<?php echo get_post_meta( $en_portada[1], "eptv-post-video-url", true); ?>" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-download.svg" alt="Descarregar"></a>
                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-link.svg" alt="Link"> -->
                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-embed.svg" alt="Embedar"> -->
                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-whatsapp.svg" alt="WhatsApp"> -->
                                <img class="share-open" src="<?php print IMAGES; ?>/icons-share.svg" alt="Compartir">
                                <img class="share-close share-disabled" src="<?php print IMAGES; ?>/icons-share-close.svg" alt="Compartir">
                            </div>
                        </div>

                    </article>



                    <article class="featured-3">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($en_portada[2])); ?>">
                            <div class="crop">
                                <img class="cropped" src="<?php echo $featured_image_3[0]; ?>">
                            </div>
                            <div class="f-2-3-title-container">
                                <h2 class="poppins"><?php echo eptv_title_featured(get_the_title( $en_portada[2] )); ?></h2>
                            </div>
                        </a>    

                        <div class="featured-details">
                            <div class="f1d-date-and-cats gray-1">
                                <?php echo get_the_time( 'l, j \d\e F \d\e Y', $en_portada[2] ); ?>
                                <br>
                                <div class="clip-cats"><?php eptv_list_cats($en_portada[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share($en_portada[2]); ?>

                        </div>

                    </article>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container">
                <div class="grid">



                    <div class="section-title poppins px28 weight500">
                        <div class="section-title-bullet b-societat"></div>
                        Societat
                    </div>

                    <?php

                        // Reset the posts_cat array from the previous WP_Query
                        unset($posts_cat);

                        # GET THE FIRST FOUR POSTS FROM A PARTICULAR CATEGORY, SAVE THEIR IDs ON "$posts_cat[]" AND AVOID POSTS THAT HAS BEEN ALREADY SHOWN IN "$en_portada"

                        $args = array(
                            "post_type" => "post",
                            "cat" => "14,15,16,17,18,19,20,21,22,23,65",
                            "post_status" => "publish",
                            "orderby" => array(
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 4,
                            "post__not_in" => $en_portada,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $posts_cat[] = $post->ID;
                        endwhile; wp_reset_postdata();

                    ?>

                    <article class="sec-vid-01 sec-vid-basic weather-row-1">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[0] ); ?> · <?php eptv_list_cats($posts_cat[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[0]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-02 sec-vid-basic relocation-for-weather-on-tablet weather-row-1">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[1] ); ?> · <?php eptv_list_cats($posts_cat[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[1]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-03 sec-vid-basic weather-row-1">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[2] ); ?> · <?php eptv_list_cats($posts_cat[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[2]); ?>

                        </div>

                    </article>

                    <article class="hide-for-weather sec-vid-04 sec-vid-basic weather-row-1">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[3])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[3]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[3] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[3] ); ?> · <?php eptv_list_cats($posts_cat[3]); ?></div>
                            </div>

                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[3]); ?>

                        </div>

                    </article> 


<!-- PLACE FOR EXTRA BANNERS -->
<!-- PLACE FOR EXTRA BANNERS -->
<!-- PLACE FOR EXTRA BANNERS -->


<!--                     <article class="banner banner-trivial">
                        
                        <a href="https://www.elprat.tv/trivial" title="elprat.tv trivial" target="_blank">
                            
                            <div class="banner-height">
                                <img class="banner-img" src="<?php #print IMAGES; ?>/banner-trivial.gif">
                            </div>
                            
                            <div class="banner-text px14">elprat.tv/trivial</div>
                        </a>    

                    </article> -->



<!-- WEATHER WIDGET -->
<!-- WEATHER WIDGET -->
<!-- WEATHER WIDGET -->



<!--                     <div class="section-title-weather poppins px28 weight500">
                        <div class="section-title-bullet b-esports"></div>
                        El temps
                    </div> -->



                    <div class="weather-container px14 eptv-black unselectable">
                    <div style="background-color: white; height: 100%;">

                        <div class="weather-image-container">

                            <img class="weather-hero-image" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-imgs/<?php echo weather('img_num', 0); ?>.jpg">
                            <div class="weather-hero-bottom-shadow"></div>

                            <div class="weather-image-container-top">
                                .
                                <div class="weather-image-content-top">
                                    <span class="right"><img src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-w/<?php echo weather('icon', 0); ?>.svg"></span>
                                    <span class="poppins px28"><?php echo weather('temp_air', 0) . "ºC"; ?></span><br>
                                    <span>Humitat: <?php echo weather('humedad_rel', 0) . "%"; ?></span><br>
                                </div>
                            </div>

                            <div class="weather-image-content-down">

                                <!-- GENCAT DOESN'T GIVE AIR QUALITY REAL TIME DATA, SO WE NEED TO AVERAGE ALL THE READINGS FOR THE PREVIOUS DAY, AND THIS LACKS SOME RIGOR -->
<!--                                 <div class="text-down">
                                    Benzè: <?php # echo weather('air_benze', 0) . " µg/m<sup>3</sup>"; ?><br>
                                    Ozó: <?php # echo weather('air_ozo', 0) . " µg/m<sup>3</sup>"; ?><br>
                                    CO: <?php # echo weather('air_co', 0) . " mg/m<sup>3</sup>"; ?><br>
                                </div> -->

                                <div class="text-down">
                                    Vent: <?php echo weather('viento_vel', 0) . " km/h "; echo weather('viento_dir_cardinal', 0); ?><br>
                                    Índex UV: <?php echo weather('index_uv_text', 0) . ", "; echo weather('index_uv_num', 0); ?><br>
                                    <a href="<?php echo weather('img_link', 0); ?>" target="_blank">Fotografia: <?php echo weather('img_author', 0); ?></a><br>
                                </div>

                            </div>

                        </div>



                        <div class="weather-air-quality">
                            Qualitat de l'aire:
                            <?php $output = weather('air_quality',0); ?>
                            <span class="right"><div style="background-color: <?php echo $output[1]; ?>" class="air-quality-bullet"></div><?php echo $output[0]; ?></span>
<!--                             <span class="right"><div style="background-color: green;" class="air-quality-bullet">35</div>SO<sub>2</sub></span>
                            <span class="right"><div style="background-color: green;" class="air-quality-bullet">8</div>NO<sub>2</sub></span>
                            <span class="right"><div style="background-color: green;" class="air-quality-bullet">22</div>O<sub>3</sub></span> -->
                        </div>

                        <div class="weather-forecast">

                            <span class="gray-2"><?php echo weather('fecha', 0); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 0) . " / " . weather('temp_min', 0) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 0); ?>.svg">
                            <br>

                            <span class="gray-2"><?php echo weather('fecha', 1); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 1) . " / " . weather('temp_min', 1) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 1); ?>.svg">
                            <br>

                            <span class="gray-2"><?php echo weather('fecha', 2); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 2) . " / " . weather('temp_min', 2) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 2); ?>.svg">
                            <br>

                            <span class="gray-2"><?php echo weather('fecha', 3); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 3) . " / " . weather('temp_min', 3) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 3); ?>.svg">
                            <br>

                            <span class="gray-2"><?php echo weather('fecha', 4); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 4) . " / " . weather('temp_min', 4) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 4); ?>.svg">
                            <br>

                            <span class="gray-2"><?php echo weather('fecha', 5); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 5) . " / " . weather('temp_min', 5) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 5); ?>.svg">
                            <br>

                            <span class="gray-2"><?php echo weather('fecha', 6); ?></span>
                            <span class="right">
                                <?php echo weather('temp_max', 6) . " / " . weather('temp_min', 6) . "ºC"; ?></span>
                            <img class="forecast-icon right" src="https://www.elprat.tv/wp-content/themes/elprattv/images/weather-icons-b/<?php echo weather('icon', 6); ?>.svg">
                            <br>

                        </div>

                        <div class="weather-image-credits">
                            <hr><br>
                            Fonts: AEMET / gencat.cat
                        </div>

                    </div>
                    </div>



<!-- END OF WEATHER WIDGET -->
<!-- END OF WEATHER WIDGET -->
<!-- END OF WEATHER WIDGET -->



                    <div class="section-title poppins px28 weight500 weather-row-2">
                        <div class="section-title-bullet b-economia"></div>
                        Economia
                    </div>

                    <?php

                        // Reset the posts_cat array from the previous WP_Query
                        unset($posts_cat);

                        # GET THE FIRST FOUR POSTS FROM A PARTICULAR CATEGORY, SAVE THEIR IDs ON "$posts_cat[]" AND AVOID POSTS THAT HAS BEEN ALREADY SHOWN IN "$en_portada"

                        $args = array(
                            "post_type" => "post",
                            "cat" => "24,25,26,27,28,29,30,31,32,33",
                            "post_status" => "publish",
                            "orderby" => array(
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 4,
                            "post__not_in" => $en_portada,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $posts_cat[] = $post->ID;
                        endwhile; wp_reset_postdata();

                    ?>

                    <article class="sec-vid-01 sec-vid-basic weather-row-3">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[0] ); ?> · <?php eptv_list_cats($posts_cat[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[0]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-02 sec-vid-basic relocation-for-weather-on-tablet relocation-2nd-video weather-row-3">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[1] ); ?> · <?php eptv_list_cats($posts_cat[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[1]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-03 sec-vid-basic relocation-3rd-video weather-row-3">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[2] ); ?> · <?php eptv_list_cats($posts_cat[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[2]); ?>

                        </div>

                    </article>

                    <article class="hide-for-weather sec-vid-04 sec-vid-basic weather-row-3">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[3])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[3]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[3] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[3] ); ?> · <?php eptv_list_cats($posts_cat[3]); ?></div>
                            </div>

                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[3]); ?>

                        </div>

                    </article>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container">
                <div class="grid">



                    <div class="section-title poppins px28 weight500">
                        <div class="section-title-bullet b-cultura"></div>
                        Cultura
                    </div>

                    <?php

                        // Reset the posts_cat array from the previous WP_Query
                        unset($posts_cat);

                        # GET THE FIRST FOUR POSTS FROM A PARTICULAR CATEGORY, SAVE THEIR IDs ON "$posts_cat[]" AND AVOID POSTS THAT HAS BEEN ALREADY SHOWN IN "$en_portada"

                        $args = array(
                            "post_type" => "post",
                            "cat" => "4,34,35,36,37,38,39,40,41",
                            "post_status" => "publish",
                            "orderby" => array(
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 4,
                            "post__not_in" => $en_portada,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $posts_cat[] = $post->ID;
                        endwhile; wp_reset_postdata();

                    ?>

                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[0] ); ?> · <?php eptv_list_cats($posts_cat[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[0]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[1] ); ?> · <?php eptv_list_cats($posts_cat[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[1]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[2] ); ?> · <?php eptv_list_cats($posts_cat[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[2]); ?>

                        </div>

                    </article>

                    <article class="banner banner-revista">
                        
                        <a href="https://www.elprat.cat/administracio-govern-i-ciutat/actualitat/revista-el-prat" title="Revista El Prat" target="_blank">
                            
                            <div class="banner-height">
                                <img class="banner-img" src="<?php print IMAGES; ?>/banner-revista.png">
                            </div>
                            
                            <div class="banner-text px14">Consulta la revista online</div>
                        </a>    

                    </article>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container">
                <div class="grid">



                    <div class="section-title poppins px28 weight500">
                        <div class="section-title-bullet b-esports"></div>
                        Esports
                    </div>

                    <?php

                        // Reset the posts_cat array from the previous WP_Query
                        unset($posts_cat);

                        # GET THE FIRST FOUR POSTS FROM A PARTICULAR CATEGORY, SAVE THEIR IDs ON "$posts_cat[]" AND AVOID POSTS THAT HAS BEEN ALREADY SHOWN IN "$en_portada"

                        $args = array(
                            "post_type" => "post",
                            "cat" => "5,42,43,44,66",
                            "post_status" => "publish",
                            "orderby" => array(
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 4,
                            "post__not_in" => $en_portada,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $posts_cat[] = $post->ID;
                        endwhile; wp_reset_postdata();

                    ?>

                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[0] ); ?> · <?php eptv_list_cats($posts_cat[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[0]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[1] ); ?> · <?php eptv_list_cats($posts_cat[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[1]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[2] ); ?> · <?php eptv_list_cats($posts_cat[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[2]); ?>

                        </div>

                    </article>

                    <article class="banner banner-radio">
                        
                        <a href="https://www.elpratradio.com" title="El Prat Ràdio" target="_blank">
                            
                            <div class="banner-height">
                                <img class="banner-img" src="<?php print IMAGES; ?>/banner-radio.png">
                            </div>
                            
                            <div class="banner-text px14">elpratradio.com · 91.6 FM</div>
                        </a>    

                    </article>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container">
                <div class="grid">



                    <div class="section-title poppins px28 weight500">
                        <div class="section-title-bullet b-politica"></div>
                        Política
                    </div>

                    <?php

                        // Reset the posts_cat array from the previous WP_Query
                        unset($posts_cat);

                        # GET THE FIRST FOUR POSTS FROM A PARTICULAR CATEGORY, SAVE THEIR IDs ON "$posts_cat[]" AND AVOID POSTS THAT HAS BEEN ALREADY SHOWN IN "$en_portada"

                        $args = array(
                            "post_type" => "post",
                            "cat" => "45,13,46,12",
                            "post_status" => "publish",
                            "orderby" => array(
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 4,
                            "post__not_in" => $en_portada,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $posts_cat[] = $post->ID;
                        endwhile; wp_reset_postdata();

                    ?>

                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[0] ); ?> · <?php eptv_list_cats($posts_cat[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[0]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[1] ); ?> · <?php eptv_list_cats($posts_cat[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[1]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[2] ); ?> · <?php eptv_list_cats($posts_cat[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[2]); ?>

                        </div>

                    </article>

                    <article class="banner banner-agenda">
                        
                        <a href="https://www.elprat.cat/la-ciutat/guia-agenda" title="Agenda d'activitats" target="_blank">
                            
                            <div class="banner-height">
                                <img class="banner-img" src="<?php print IMAGES; ?>/banner-agenda.png">
                            </div>
                            
                            <div class="banner-text px14">Totes les activitats de la ciutat</div>
                        </a>    

                    </article>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container">
                <div class="grid">



                    <div class="section-title poppins px28 weight500">
                        <div class="section-title-bullet b-afons"></div>
                        El Prat a fons
                    </div>

                    <?php

                        // Reset the posts_cat array from the previous WP_Query
                        unset($posts_cat);

                        # GET THE FIRST FOUR POSTS FROM A PARTICULAR CATEGORY, SAVE THEIR IDs ON "$posts_cat[]" AND AVOID POSTS THAT HAS BEEN ALREADY SHOWN IN "$en_portada"

                        $args = array(
                            "post_type" => "post",
                            "cat" => "8,68,47,48",
                            "post_status" => "publish",
                            "orderby" => array(
                                "post_date"     =>  "DESC",
                                ),
                            "posts_per_page" => 4,
                            "post__not_in" => $en_portada,
                            );

                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $posts_cat[] = $post->ID;
                        endwhile; wp_reset_postdata();

                    ?>

                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[0] ); ?> · <?php eptv_list_cats($posts_cat[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[0]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[1] ); ?> · <?php eptv_list_cats($posts_cat[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[1]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[2] ); ?> · <?php eptv_list_cats($posts_cat[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[2]); ?>

                        </div>

                    </article>

                    <article class="sec-vid-04 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_cat[3])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_cat[3]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_cat[3] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_cat[3] ); ?> · <?php eptv_list_cats($posts_cat[3]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_cat[3]); ?>

                        </div>

                    </article>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="afons-background"></div>



        </section> <!-- End of first section (Featured) -->

    </main>



<?php get_footer(); ?>


