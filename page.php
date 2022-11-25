<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>



<?php get_header(); ?>



    <section>



        <main>

        <p>PAGE.PHP</p>



        <!-- What is that variable $destacats for? -->
        
        <?php # $destacats = get_field( 'destacats', 10 );?>



        <!-- Search function form -->

        <!-- <form role="search" method="get" class="search-form" action="<?php # echo home_url( '/' ); ?>">
            <label>
                <input type="search" class="search-field" placeholder="Cercar…" value="" name="s" />
            </label>
            <input type="submit" class="search-submit" value="Cercar" />
        </form> -->



        <!-- Start of common WP Theme code -->
        <!-- Start of common WP Theme code -->
        <!-- Start of common WP Theme code -->
        <!-- Start of common WP Theme code -->
        <!-- Start of common WP Theme code -->



        <?php if ( have_posts() ) : ?>

            <header>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header>

            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();

                // Include the Post-Format-specific template for the content.
                get_template_part( 'content', get_post_format() );

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                'next_text'          => __( 'Next page', 'twentyfifteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

        </main>



    </section>



<?php get_sidebar(); ?>



<?php get_footer(); ?>


