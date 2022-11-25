


<?php get_header(); ?>



	<section>
		<main class="search-main">



            <?php

                // Reset the posts_cat array from the previous WP_Query
                unset($posts_search);

				// Count pagination
				$paged = ( get_query_var( "paged" ) ) ? get_query_var( "paged" ) : 1;

                $args = array(
                    "post_type" => "post",
                    "post_status" => "publish",
                    "orderby" => array(
                        "post_date"     =>  "DESC",
                        ),
                    "s" => get_search_query(),
                    "posts_per_page" => 20,
                    "paged" => $paged,
                    );                       

                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) :
                    while ( $loop->have_posts() ) : $loop->the_post();
						$posts_search[] = $post->ID;
                    endwhile;

                // ELSE and END IF at the end of the page, after the pagination

            ?>





            <div style="height: 200px;">
            </div>



            <div class="grid-container archive-file-margin first-file">

                <div class="grid">
                    <div class="category-title">
                        <h1 class="poppins px44 weight500"><?php single_cat_title(); ?></h1>
                    </div>
                </div>

                <div class="grid">

                    <?php if ($posts_search[0]) : ?>
                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[0])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[0]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[0] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[0] ); ?> · <?php eptv_list_cats($posts_search[0]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[0]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[1]) : ?>
                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[1])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[1]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[1] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[1] ); ?> · <?php eptv_list_cats($posts_search[1]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[1]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[2]) : ?>
                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[2])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[2]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[2] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[2] ); ?> · <?php eptv_list_cats($posts_search[2]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[2]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[3]) : ?>
                    <article class="sec-vid-04 archive-4th-video sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[3])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[3]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[3] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[3] ); ?> · <?php eptv_list_cats($posts_search[3]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[3]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container archive-file-margin">
                <div class="grid">

                    <?php if ($posts_search[4]) : ?>
                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[4])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[4]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[4] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[4] ); ?> · <?php eptv_list_cats($posts_search[4]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[4]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[5]) : ?>
                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[5])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[5]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[5] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[5] ); ?> · <?php eptv_list_cats($posts_search[5]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[5]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[6]) : ?>
                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[6])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[6]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[6] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[6] ); ?> · <?php eptv_list_cats($posts_search[6]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[6]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[7]) : ?>
                    <article class="sec-vid-04 archive-4th-video sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[7])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[7]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[7] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[7] ); ?> · <?php eptv_list_cats($posts_search[7]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[7]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container archive-file-margin">
                <div class="grid">

                    <?php if ($posts_search[8]) : ?>
                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[8])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[8]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[8] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[8] ); ?> · <?php eptv_list_cats($posts_search[8]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[8]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                    <?php if ($posts_search[9]) : ?>
                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[9])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[9]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[9] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[9] ); ?> · <?php eptv_list_cats($posts_search[9]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[9]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[10]) : ?>
                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[10])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[10]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[10] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[10] ); ?> · <?php eptv_list_cats($posts_search[10]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[10]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[11]) : ?>
                    <article class="sec-vid-04 archive-4th-video sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[11])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[11]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[11] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[11] ); ?> · <?php eptv_list_cats($posts_search[11]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[11]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container archive-file-margin">
                <div class="grid">

                    <?php if ($posts_search[12]) : ?>
                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[12])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[12]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[12] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[12] ); ?> · <?php eptv_list_cats($posts_search[12]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[12]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[13]) : ?>
                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[13])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[13]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[13] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[13] ); ?> · <?php eptv_list_cats($posts_search[13]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[13]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[14]) : ?>
                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[14])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[14]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[14] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[14] ); ?> · <?php eptv_list_cats($posts_search[14]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[14]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[15]) : ?>
                    <article class="sec-vid-04 archive-4th-video sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[15])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[15]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[15] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[15] ); ?> · <?php eptv_list_cats($posts_search[15]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[3]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container archive-file-margin">
                <div class="grid">
                    
                    <?php if ($posts_search[16]) : ?>
                    <article class="sec-vid-01 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[16])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[16]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[16] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[16] ); ?> · <?php eptv_list_cats($posts_search[16]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[16]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[17]) : ?>
                    <article class="sec-vid-02 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[17])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[17]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[17] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[17] ); ?> · <?php eptv_list_cats($posts_search[17]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[17]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[18]) : ?>
                    <article class="sec-vid-03 sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[18])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[18]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[18] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[18] ); ?> · <?php eptv_list_cats($posts_search[18]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[18]); ?>

                        </div>

                    </article>
                    <?php endif; ?>
                    
                    <?php if ($posts_search[19]) : ?>
                    <article class="sec-vid-04 archive-4th-video sec-vid-basic">
                        
                        <a class="title-link" href="<?php echo esc_url(get_permalink($posts_search[19])); ?>">
                            <div class="sec-vid-crop">
                                <img class="sec-vid-cropped" src="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id($posts_search[19]), array('768','432')); echo $src[0]; ?>">
                            </div>
                            <div class="sec-vid-title-container">
                                <h3 class="poppins"><?php echo eptv_title_featured(get_the_title( $posts_search[19] )); ?></h3>
                            </div>
                        </a>    

                        <div class="sec-vid-details px14">
                            <div class="sec-vid-date-and-cats gray-1">
                                <div class="clip-cats"><?php echo get_the_time( 'd/m/y', $posts_search[19] ); ?> · <?php eptv_list_cats($posts_search[19]); ?></div>
                            </div>
                            
                            <!-- Load the date, categories and share options for the given post ID -->
                            <?php eptv_date_cats_share_small($posts_search[19]); ?>

                        </div>

                    </article>
                    <?php endif; ?>

                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



            <div class="grid-container archive-file-margin">
                <div class="grid">



                    <?php
                        


                        // PROVISIONAL NAVIGATION

                        if ($loop->max_num_pages == 1) {

                            // DO NOTHING
                        
                        } else {

                            if ($paged == 1) {
                                ?><span class="pagination pag-disabled-previous poppins 18px">Anterior</span><?php
                            } else {
                                ?>
                                    <span class="pag-link-previous poppins 18px">
                                        <?php previous_posts_link( 'Anterior' ); ?> 
                                    </span>
                                <?php
                            }

                            ?>
                            <div class="pagination pag-info poppins 18px">
                                Pàgina <?php print  $paged . ' de ' . $loop->max_num_pages; ?>
                            </div>
                            <?php


                            if ($paged == $loop->max_num_pages) {
                                ?><span class="pagination pag-disabled-next poppins 18px">Següent</span><?php
                            } else {
                                ?>
                                    <span class="pag-link-next poppins 18px">
                                        <?php next_posts_link( 'Següent' ); ?>  
                                    </span>
                                <?php
                            }
                        
                        }                   
                        
                        // End of provisional navigation







                        // PROPER NAVIGATION FOR WP_QUERY --->

                        // ABOUT PAGINATION FOR CUSTOM WP_QUERY IN https://codex.wordpress.org/Function_Reference/paginate_links

                        // $big = 999999999; // need an unlikely integer

                        // print_r( paginate_links( array(
                        //  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        //  'format' => '?paged=%#%',
                        //  'current' => max( 1, get_query_var('paged') ),
                        //  'total' => $loop->max_num_pages,


                        //  'show_all'           => false,
                        //  'end_size'           => 0,
                        //  'mid_size'           => 0,
                        //  'prev_next'          => true,
                        //  'prev_text'          => __('Anterior'),
                        //  'next_text'          => __('Següent'),
                        //  'type'               => 'array',
                        //  'add_args'           => false,
                        //  'add_fragment'       => '',
                        //  'before_page_number' => '',
                        //  'after_page_number'  => ''
                        // ) ) );



                        // ALTERNATIVE --->

                        // posts_nav_link();



                        // OTHER ALTERNATIVE --->

                        // function getPrevNext() {
                        //  $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
                        //  $pages = array();
                        //  foreach ($pagelist as $page) {
                        //     $pages[] += $page->ID;
                        //  }

                        //  $current = array_search(get_the_ID(), $pages);
                        //  $prevID = $pages[$current-1];
                        //  $nextID = $pages[$current+1];
                            
                        //  echo '<div class="navigation">';
                            
                        //  if (!empty($prevID)) {
                        //      echo '<div class="alignleft">';
                        //      echo '<a href="';
                        //      echo get_permalink($prevID);
                        //      echo '"';
                        //      echo 'title="';
                        //      echo get_the_title($prevID); 
                        //      echo'">Previous</a>';
                        //      echo "</div>";
                        //  }
                        //  if (!empty($nextID)) {
                        //      echo '<div class="alignright">';
                        //      echo '<a href="';
                        //      echo get_permalink($nextID);
                        //      echo '"';
                        //      echo 'title="';
                        //      echo get_the_title($nextID); 
                        //      echo'">Next</a>';
                        //      echo "</div>";      
                        //  }
                        // }    
                        // getPrevNext();



                        // CLOSE THE IF FROM THE TOP OF THE PAGE
                        else:
                            _e( "" );
                        endif;

                        wp_reset_postdata(); 

                    ?>



                </div> <!-- End of grid -->
            </div> <!-- End of grid container -->



        </main>



    </section>



<?php get_footer(); ?>


