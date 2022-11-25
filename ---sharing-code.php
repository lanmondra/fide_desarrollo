
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <!-- Set the post category -->
                    <?php $first_cat_minus_portada = wp_get_post_categories( get_the_ID(), array("exclude" => array(363)) ); ?>    

                    <div class="post-video">

                        <?php
                            $url = get_post_meta(get_the_ID(), "eptv-post-video-url", true);
                            $filename = basename($url); // to get file
                        ?>

                    <div class="post-video-details-grid">

                        <!-- TITLE -->

                        <div class="post-title-and-content-container">
                            <!-- H1 not detecting the third class .line48, so adding line-height to .px36 -->
                            <h1 class="poppins px36 line48"><?php echo the_title(); ?></h1>
                            <hr>
                        </div> 

                        <!-- SHARING -->

                        <div class="post-sharing">
                            <div class="f1d-date-and-cats gray-1 move-down-a-bit">
                                <div class="clip-cats post-single-share-title">Compartir</div>
                            </div>
                            <div class="share unselectable post-share-height">
                                <a class="share-disabled" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink(get_the_ID())); ?>" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-facebook.svg" alt="Facebook"></a>
                                


        <!-- ACTUAL (NEEDS TO IMPROVE AND REVIEW ALL SHARING CODE INSTANCES) CODE FOR TWITTER CARDS -->
                                <a class="share-disabled" title="Twitter" href="https://twitter.com/share?url=<?php echo esc_url(get_permalink(get_the_ID())); ?>&text='<?php echo get_the_title(get_the_ID()); ?>' via @elprat_tv &#x1F4FA &#x1F449" target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-twitter.svg" alt="Twitter"></a>

        <!-- PREVIOUS TWITTER SHARING CODE BEFORE IMPROVING TWITTER CARDS -->
<!--                                 <a class="share-disabled" title="Twitter" href="https://twitter.com/share?url=https://elprat.tv/?p=<?php # print get_the_ID(); ?>&text='<?php # echo get_the_title(get_the_ID()); ?>' via @elprat_tv &#x1F4FA &#x1F449" target="_blank">
                                    <img src="<?php # print IMAGES; ?>/icons-share-twitter.svg" alt="Twitter"></a>
 -->


                                <a class="share-disabled" title="Email" href="mailto:?subject=<?php urlencode_deep(print get_the_title(get_the_ID())); ?>&body=<?php urlencode_deep(print esc_url(get_permalink(get_the_ID()))); ?>">
                                    <img src="<?php print IMAGES; ?>/icons-share-email.svg" alt="Email"></a>

                                <!-- DISABLE GET VIDEO URL (FROM ALACARTA) AND BYPASS TO S3 ON OLDER VIDEOS -->
                                <a class="share-disabled" title="Descarregar" href="
                                    <?php # echo get_post_meta( get_the_ID(), "eptv-post-video-url", true); ?>
                                    <?php 
                                        if (get_the_time('U')>1552399504) {
                                            print $url;
                                        } else {
                                            print 'https://s3.eu-west-3.amazonaws.com/eptvmp4/' . $filename;
                                        }
                                    ?>
                                    " target="_blank">
                                    <img src="<?php print IMAGES; ?>/icons-share-download.svg" alt="Descarregar"></a>
                                
                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-link.svg" alt="Link"> -->
                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-embed.svg" alt="Embedar"> -->

                                <!-- Url for embed function -->
                                <input type="text" value="<iframe width=&#34;560&#34; height=&#34;315&#34; src=&#34;https://www.elprat.tv/embed-video-s3/?video=<?php print get_the_ID(); ?>&#34; frameborder=&#34;0&#34; allow=&#34;accelerometer; encrypted-media; gyroscope; picture-in-picture&#34; allowfullscreen></iframe>" id="embed-hidden">

                                <!-- Embed function -->
                                <span class="share-disabled" id="copy" title="Inserir" href="#">
                                    <img src="<?php print IMAGES; ?>/icons-share-embed.svg" alt="Inserir">
                                </span>

                                <!-- <img class="share-disabled" src="<?php # print IMAGES; ?>/icons-share-whatsapp.svg" alt="WhatsApp"> -->
                                <img class="share-open" src="<?php print IMAGES; ?>/icons-share.svg" alt="Compartir">
                                <img class="share-close share-disabled" src="<?php print IMAGES; ?>/icons-share-close.svg" alt="Compartir">

                            </div>
                            
                        </div>

                        <!-- DATE, AUTHOR AND CATS -->

                        <div class="post-date-and-cats">

                            <hr>

                            <div class="date-and-cats-padding roboto line24 gray-1">
                                <?php the_time( 'j \d\e F \d\e Y' ); ?>
                                <br>
                                <?php the_author(); ?>
                                <br><br>
                                <?php eptv_list_cats(get_the_ID()); ?>
                                
                            </div>

                            <hr>

                        </div>

                        <!-- POST CONTENT -->

                        <div class="post-content roboto line24 eptv-black">

                            <?php echo wp_strip_all_tags(get_the_content()); ?>    
                        </div>

                    </div> <!-- End of post-video-details-grid -->

                    <?php endwhile; wp_reset_postdata(); else : ?>
                        <p><?php esc_html_e( 'Lo sentimos, no hemos encontrado entradas bajo estos criterios.' ); ?></p>
                    <?php endif; ?>