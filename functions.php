<?php

define ( 'TEMPPATH', get_bloginfo( 'stylesheet_directory' ) );
define ( 'IMAGES', TEMPPATH. "/images" );

// para la subida de imagenes de Alta resolucion 
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );



require_once('contact_form.php');

// 1004, "NOTAS INFORMATIVAS" deleted from NON_TOPIC_CATS, and NON_ARTICLE_CATS
// as this content can be at the same time an article and a "Nota informativa"
// The same for 1041 (notas informativas - columna izquierda)
$non_topic_cats = array(1, 363, 1003, 1012, 1013, 1014, 1015, 1016, 1017, 1018, 1019, 1021, 1023, 1024, 1025, 1038, 1039);
$non_article_cats = array(1002, 1003, 1012, 1017, 1018, 1019);


// LINE BREAKS ON POST CONTENT NOT SHOWING ON THE SITE
// See more: https://blog.templatetoaster.com/wordpress-line-break-not-working/
// remove_filter ('the_content', 'wpautop');

// function clear_br($content) { 
// return str_replace("<br/>","<br clear='none'/>", $content);
// } 
// add_filter('the_content','clear_br');





// GET THE PROPER FILENAME FOR MEDIA SOURCE IMAGE (EX: EL PAIS, MUNDO PETROLEO, ETC...)

function fide_news_media_img_url($post_id) {

    $news_sources = array(
        0   => array(
            "medio" => "",
            "img" => "medio-blank.jpg"
            ),
        1   => array(
            "medio" => "El Economista",
            "img" => "medio-el-economista.jpg"
            ),
        2   => array(
            "medio" => "El País",
            "img" => "medio-el-pais.jpg"
            ),
        3   => array(
            "medio" => "El periódico de la energía",
            "img" => "medio-el-periodico-de-la-energia.jpg"
            ),
        4   => array(
            "medio" => "Estaciones de Servicio",
            "img" => "medio-estaciones-de-servicio.jpg"
            ),
        5   => array(
            "medio" => "Factoría de cerveza",
            "img" => "medio-factoria-de-cerveza.jpg"
            ),
        6   => array(
            "medio" => "Interempresas",
            "img" => "medio-interempresas.jpg"
            ),
        7   => array(
            "medio" => "Logística profesional",
            "img" => "medio-logistica-profesional.jpg"
            ),
        8   => array(
            "medio" => "Mundo Petróleo",
            "img" => "medio-mundo-petroleo.jpg"
            ),
        9   => array(
            "medio" => "Revista PQ",
            "img" => "medio-revista-pq.jpg"
            ),
        10   => array(
            "medio" => "Vinetur",
            "img" => "medio-vinetur.jpg"
            ),
        11  => array(
	        "medio" => "ABC",
	        "img" => "medio-abc.jpg"
            ),
        12  => array(
	        "medio" => "La Vanguardia",
	        "img" => "medio-la-vanguardia.jpg"
            ),
        13  => array(
	        "medio" => "La Gaceta",
	        "img" => "medio-la-gaceta.jpg"
            ),
        14  => array(
	        "medio" => "Expansión",
	        "img" => "medio-expansion.jpg"
            ),
        15  => array(
	        "medio" => "Revista REAF",
	        "img" => "medio-reaf.jpg"
            ),
        16  => array(
	        "medio" => "Revista del Colegio de Economistas",
	        "img" => "medio-revista-del-colegio-de-economistas.jpg"
            ),
        17  => array(
	        "medio" => "Carburol",
	        "img" => "medio-carburol.jpg"
            ),
        18  => array(
            "medio" => "Autónomos y emprendedores",
            "img" => "medio-autonomos-emprendedores.jpg"
            ),
        19  => array(
            "medio" => "Transporte y logística",
            "img" => "medio-transporte-y-logistica.jpg"
            ),
        20  => array(
            "medio" => "Diari de Tarragona",
            "img" => "medio-diari-de-tarragona.jpg"
            ),
        21  => array(
            "medio" => "Cinco Días",
            "img" => "medio-cinco-dias.jpg"
            ),
        22  => array(
		    "medio" => "Manutención y almacenaje",
		    "img" => "medio-manutención-y-almacenaje.jpg"
		    ),
        23  => array(
		    "medio" => "El Economista 2",
		    "img" => "medio-el-economista-2.jpg"
		    ),
        24  => array(
		    "medio" => "Lawyer Press",
		    "img" => "medio-lawyer-press.jpg"
		    ),
        25  => array(
		    "medio" => "Catalunya empresarial",
		    "img" => "medio-catalunya-empresarial.jpg"
		    ),
		26  => array(
		    "medio" => "Radio Intereconomia",
		    "img" => "medio-intereconomia-bn.jpg"
		    ),
		
		27  => array(
		    "medio" => "Business Insider",
		    "img" => "medio-bussines.jpeg"
		    ),
		28  => array(
		    "medio" => "Newtral",
		    "img" => "medio-neutral.jpg"
        ),
        29  => array(
		    "medio" => "Forbes",
		    "img" => "medio-forbes.jpg"
		    )
    );

    $news_media = get_post_meta( $post_id, "medio", true );

    $check_media_array_position = array_search( $news_media, array_column($news_sources, "medio"), true );

  
    $news_media_image_filename = "https://www.fide.es/wp-content/themes/fide2019/images/" . $news_sources[$check_media_array_position]["img"];

    return $news_media_image_filename;

}



// GET THE PROPER FILENAME FOR MEDIA SOURCE IMAGE (EX: EL PAIS, MUNDO PETROLEO, ETC...)
// BUT FOR ALPHA IMAGES!!!

function fide_news_media_img_alpha_url($post_id) {

    $news_sources = array(
        0   => array(
            "medio" => "",
            "img" => "medio-a-blank.png"
            ),
        1   => array(
            "medio" => "El Economista",
            "img" => "medio-a-el-economista.png"
            ),
        2   => array(
            "medio" => "El País",
            "img" => "medio-a-el-pais.png"
            ),
        3   => array(
            "medio" => "El periódico de la energía",
            "img" => "medio-a-el-periodico-de-la-energia.png"
            ),
        4   => array(
            "medio" => "Estaciones de Servicio",
            "img" => "medio-a-estaciones-de-servicio.png"
            ),
        5   => array(
            "medio" => "Factoría de cerveza",
            "img" => "medio-a-factoria-de-cerveza.png"
            ),
        6   => array(
            "medio" => "Interempresas",
            "img" => "medio-a-interempresas.png"
	        ),
        7   => array(
            "medio" => "Logística profesional",
            "img" => "medio-a-logistica-profesional.png"
            ),
        8   => array(
            "medio" => "Mundo Petróleo",
            "img" => "medio-a-mundo-petroleo.png"
            ),
        9   => array(
            "medio" => "Revista PQ",
            "img" => "medio-a-revista-pq.png"
            ),
        10  => array(
            "medio" => "Vinetur",
            "img" => "medio-a-vinetur.png"
            ),
        11  => array(
	        "medio" => "ABC",
	        "img" => "medio-a-abc.png"
            ),
        12  => array(
	        "medio" => "La Vanguardia",
	        "img" => "medio-a-la-vanguardia.png"
            ),
        13  => array(
	        "medio" => "La Gaceta",
	        "img" => "medio-a-la-gaceta.png"
            ),
        14  => array(
	        "medio" => "Expansión",
	        "img" => "medio-a-expansion.png"
            ),
        15  => array(
	        "medio" => "Revista REAF",
	        "img" => "medio-a-reaf.png"
            ),
        16  => array(
	        "medio" => "Revista del Colegio de Economistas",
	        "img" => "medio-a-revista-del-colegio-de-economistas.png"
            ),
        17  => array(
	        "medio" => "Carburol",
	        "img" => "medio-a-carburol.png"
            ),
        18  => array(
            "medio" => "Autónomos y emprendedores",
            "img" => "medio-a-autonomos-emprendedores.png"
            ),
        19  => array(
            "medio" => "Transporte y logística",
            "img" => "medio-a-transporte-y-logistica.png"
            ),
        20  => array(
            "medio" => "Diari de Tarragona",
            "img" => "medio-a-diari-de-tarragona.png"
            ),
        21  => array(
            "medio" => "Cinco Días",
            "img" => "medio-a-cinco-dias.png"
            ),
        22  => array(
		    "medio" => "Manutención y almacenaje",
		    "img" => "medio-a-manutención-y-almacenaje.png"
		    ),
        23  => array(
		    "medio" => "El Economista 2",
		    "img" => "medio-a-el-economista-2.png"
		    ),
        24  => array(
		    "medio" => "Lawyer Press",
		    "img" => "medio-a-lawyer-press.png"
		    ),
        25  => array(
		    "medio" => "Catalunya empresarial",
		    "img" => "medio-a-catalunya-empresarial.png"
		    ),
		26  => array(
		    "medio" => "Radio Intereconomia",
		    "img" => "medio-intereconomia-bn.png"
		    ),
		27  => array(
		    "medio" => "Business Insider",
		    "img" => "medio-a-inside.png"
		    ),
		28  => array(
		    "medio" => "Newtral",
		    "img" => "medio-neutral.png"
        ),
        29  => array(
		    "medio" => "Forbes",
		    "img" => "medio-a-forbes.png"
		    )
		
    );

    $news_media = get_post_meta( $post_id, "medio", true );

    $check_media_array_position = array_search( $news_media, array_column($news_sources, "medio"), true );

    $news_media_image_filename = "https://www.fide.es/wp-content/themes/fide2019/images/" . $news_sources[$check_media_array_position]["img"];

    return $news_media_image_filename;

}



// GET THE FIRST THREE CATS WITHIN LINKED AND STYLED BOXES

function fide_list_cats_links($post_id) {
    $just_topics_cats = wp_get_post_categories( $post_id, array("exclude" => array( 1, 11, 363, 1002, 1003, 1004, 1041, 1012, 1013, 1014, 1015, 1016, 1017, 1018, 1019, 1023, 1024, 1025, 1026, 1032, 1038, 1039 )));

    $i = 0;
    foreach ($just_topics_cats as $category => $cat_id) {

        if (($i+1)<=1) {
            print '<a class="article-category" href="' . esc_url(get_category_link($cat_id)) . '">' . get_the_category_by_ID($cat_id) . '</a>';
            ++$i;
        }
    }
}



// GET THE EXCERPT OF A POST LIMITED TO X CHARACTERS

function fide_excerpt($post_id, $length) {

    if (has_excerpt($post_id)) {
        $excerpt_a = get_the_excerpt($post_id);
    } else {
        $excerpt_a = "";
    }
    $excerpt_b = get_the_content(null, false, $post_id);
    $excerpt = strip_tags($excerpt_a . " " . $excerpt_b);
    print mb_substr($excerpt, 0, $length) . '...';
}



// GET THE POST FEATURED IMAGE URL

function fide_feat_img_url($post_id) {
    $img_url = wp_get_attachment_image_src ( get_post_thumbnail_id($post_id), array('1024','576') );
    print $img_url[0];
}



// GET THE POST TITLE INSIDE A LINK

function fide_title_link($post_id) {
    print '<a href="' . esc_url(get_permalink($post_id)) . '">' . get_the_title($post_id) . '</a>';
}



// GET THE POST TITLE INSIDE A LINK

function fide_title_link_shortened($post_id, $length) {
    $title = get_the_title($post_id);
    $title_length = strlen($title);
    if ($title_length > $length) {
        print '<a href="' . esc_url(get_permalink($post_id)) . '">' . mb_substr($title, 0, $length) . '...' . '</a>';
    } else {
        print '<a href="' . esc_url(get_permalink($post_id)) . '">' . $title . '</a>';
    }
}



// GET THE POST TITLE INSIDE A LINK, ... BUT CROPPED BY X NUMBER OR WORDS

function fide_title_link_by_words($post_id, $limit) {
    $words = strip_tags(get_the_title($post_id));
    // Add 1 to the specified limit becuase arrays start at 0
    $limit = $limit+1;
    // Store each individual word as an array element
    $full_title = explode(' ', $words);
    // Count the number of final words after the shortening
    $full_title_length = count($full_title);

    // Explode again, but up to the given limit of words
    $words = explode(' ', $words, $limit);

    // Return the result
    if ($limit < $full_title_length) {
        // Shorten the array by 1 because that final element will be the sum of all the words after the limit
        array_pop($words);
        // Implode the array for output
        $words = implode(' ', $words);
        print '<a href="' . esc_url(get_permalink($post_id)) . '">' . $words . '...' . '</a>';
    } else {
        // Implode the array for output
        $words = implode(' ', $words);
        print '<a href="' . esc_url(get_permalink($post_id)) . '">' . $words . '</a>';
    }
}



// GET THE POST TITLE INSIDE A LINK, ... BUT FULL LENGTH!

function fide_title_link_full_length($post_id, $length_ignored) {
    $title = get_the_title($post_id);
    print '<a href="' . esc_url(get_permalink($post_id)) . '">' . $title . '</a>';
}



// CHANGE THE DEFAULT END OF EXCERPT "[...]" BY JUST DOTS "..."

function new_excerpt_more($more) {
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');



// READ MORE LINK AT THE END OF ARTICLES PREVIEW

function fide_read_more_link($post_id) {
    print '<a class="weight600" href="' . esc_url(get_permalink($post_id)) . '">Leer artículo &#8594;</a>';
}



// EXTEND THE EXCERPT LENGTH TO 200 WORDS

function wpdocs_custom_excerpt_length( $length ) {
    return 200;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



// GET THE TITLE OF A NOTA INFORMATIVA LIMITED TO X CHARACTERS

function fide_notas_title($post_id, $length) {
    $title = get_the_title($post_id);
    print '<a href="' . esc_url(get_permalink($post_id)) . '">' . mb_substr($title, 0, $length) . '...</a>';
}



// GET THE TITLE AND SHORT EXCERPT OF A NOTA INFORMATIVA LIMITED TO X CHARACTERS

function fide_notas_title_and_excerpt($post_id, $length) {

    $title = get_the_title($post_id);
    $excerpt_a = get_the_excerpt($post_id);
    $excerpt_b = get_the_content(null, false, $post_id);

    if ($excerpt_a != null) {
        $title_and_excerpt = strip_tags($title . " · " . $excerpt_a . " · " . $excerpt_b);
    } else {
        $title_and_excerpt = strip_tags($title . " · " . $excerpt_b);
    }

    $text_to_print = mb_substr($title_and_excerpt, 0, $length) . '...';
    print '<a href="' . esc_url(get_permalink($post_id)) . '">' . mb_substr($title_and_excerpt, 0, $length) . '...</a>';
}



// GET THE TITLE AND SHORT INTRO FOR JURISPRUDENCIA SHORT MODULES

function fide_jurisprudencia_shorts($post_id) {
    $title = get_the_title($post_id);
    $content = get_the_excerpt($post_id);
    $length = 310 - strlen($title);
    print '
        <a class="red-hover weight600" href="' . esc_url(get_permalink($post_id)) . '">' . $title . '.</a>
        <span class="gray-9">&nbsp;&nbsp;|&nbsp;&nbsp;' . get_the_date("d M 'y", $post_id) . '&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>' . mb_substr($content, 0, $length) . '...</span>
    ';
}

// GET THE TITLE AND SHORT INTRO FOR JURISPRUDENCIA SHORT MODULES
//width: 100%;height: 62px;margin-top: -125px;background: linear-gradient(0deg, rgb(242 242 243) 0%, rgb(242 242 242 / 61%) 100%);filter: blur(1px);
function fide_de_cerca__shorts($post_id) {
    $title = get_the_title($post_id);
    $content = get_the_excerpt($post_id);
    $length = 350 - strlen($title);
    print '
        <a class=" weight600" href="' . esc_url(get_permalink($post_id)) . '">' . $title . '.</a>                 
        <span class="gray-9">' . get_the_date("d M 'y", $post_id) . '</span> 
        <span>' . mb_substr($content, 0, $length) . '...</span>
        <div class="difuminacion-de-cerca" style=""></div>              
    ';
    
}



// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019
// CHECKED FOR FIDE 2019














// GET THE BREADCRUMB CODE AND FILL IT WITH PROPER TEXT

function fide_breadcrumb_code($parameter1, $parameter2, $bn, $additional_text) {
    if ($bn == "black") {
        print '
            <section> <!-- Just to close the nav submenu on hover 1 -->
                <div class="breadcrumb">
                    <hr class="breadcrumb-nav-line">
                    <div class="grid-container">
                        <div class="grid">
                            <div class="breadcrumb-container col-1-1">
                                <a href="https://www.fide.es"><img src="' . IMAGES . '/icons-home-b.svg" alt="Inicio"></a>
                                <span class="breadcrumb-separator-1">&#62;</span>
                                <span>' . $parameter1 . '</span>
                                <span class="additional-text">' . $additional_text . '</span>';
                                
                                if (isset($parameter2)) {
                                    print'
                                        <span class="breadcrumb-subsection">
                                            <span class="breadcrumb-separator-2">&#62;</span>
                                            <span>' . $parameter2 . '</span>
                                        </span>
                                    '; // End of print for parameter2
                                }

                                print'
                            </div>
                        </div>
                    </div>    
                </div>
            </section>
        '; // End of print
    } elseif ($bn == "white") {
            print '
            <section> <!-- Just to close the nav submenu on hover 2-->
                <div class="breadcrumb">
                    <div class="grid-container">
                        <div class="grid">
                            <div class="breadcrumb-container col-1-1">
                                <a href="https://www.fide.es"><img class="svg-shadow" src="' . IMAGES . '/icons-home-w.svg" alt="Inicio"></a>
                                <span class="breadcrumb-separator-1 white text-shadow">&#62;</span>
                                <span class="white text-shadow">' . $parameter1 . '</span>';

                                if (isset($parameter2)) {
                                    print'
                                        <span class="breadcrumb-subsection">
                                            <span class="breadcrumb-separator-2 white text-shadow">&#62;</span>
                                            <span class="white text-shadow">' . $parameter2 . '</span>
                                        </span>
                                    '; // End of print for parameter2
                                }

                                print'
                            </div>
                        </div>
                    </div>    
                </div>
            </section>
        '; // End of print
    }
}





















// REMOVE NEWSLETTER CATEGORY FROM SEARCH RESULTS...

function exclude_on_search_filter( $query ) {
    if ( $query->is_search && !is_admin() )
        $query->set( 'cat','-1002' );
    return $query;
}
add_filter( 'pre_get_posts', 'exclude_on_search_filter' );



// MEASURE TITLE STRINGS AND TRIM THEM AFTER 110 CHARACTERS, IF THEY ARE LONGER THAN THAT...

function eptv_title_featured($string) {
    if (strlen($string)>110) {
        return mb_substr($string,0,109)."...";
    } else {
        return $string;
    }
}



// MEASURE TITLE STRINGS AND TRIM THEM AFTER 90 CHARACTERS, IF THEY ARE LONGER THAN THAT...

function eptv_title($string) {
    if (strlen($string)>90) {
        return mb_substr($string,0,89)."...";
    } else {
        return $string;
    }
}



// ADD POST-THUMBNAILS SUPPORT
// 

if (function_exists('add_theme_support'))
{
    // Add use of HTML5 markup for the search forms
    add_theme_support('html5', array('search-form'));
    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('eptv-large', 1024, 576, true); // Large Thumbnail
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('petit', 160, 90, true ); // Small Thumbnail
    //add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}



// ADD SIDEBAR
// 
// if ( function_exists( 'register_sidebar' ) ) {
//     register_sidebar( array (
//         'name'          => __( 'Primary Sidebar', 'primary-sidebar' ),
//         'id'            => 'primary-widget-area',
//         'description'   => __( 'The primary widget area', 'dir' ),
//         'before_widget' => '<div class="widget">',
//         'after_widget'  => "</div>",
//         'before_title'  => '<h3 class="widget-title">',
//         'after_title'   => '</h3>',
//     ) );
// }



// ADD WIDGETS
// 
// add_action( 'widgets_init', 'theme_slug_widgets_init' );
// function theme_slug_widgets_init() {
//     register_sidebar( array(
//         'name'          => __( 'Main Sidebar', 'theme-slug' ),
//         'id'            => 'sidebar-1',
//         'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
//         'before_widget' => '<li id="%1$s" class="widget %2$s">',
// 	       'after_widget'  => '</li>',
// 	       'before_title'  => '<h2 class="widgettitle">',
// 	       'after_title'   => '</h2>',
//     ) );
// }



// REMOVE WP-SIDEBAR MENU ITEMS

function remove_menus(){
	   // remove_menu_page( 'index.php' );                                     //Dashboard
	   // remove_menu_page( 'jetpack' );                                       //Jetpack* 
// 	   remove_menu_page( 'edit.php' );                                      //Posts
    // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');     //Categories
    // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');     //Tags
// 	   remove_menu_page( 'upload.php' );                                    //Media
	   // remove_menu_page( 'edit.php?post_type=page' );                       //Pages 
	   // remove_menu_page( 'edit-comments.php' );                             //Comments
	   // remove_menu_page( 'themes.php' );                                    //Appearance
	   // remove_menu_page( 'plugins.php' );                                   //Plugins
	   // remove_menu_page( 'users.php' );                                     //Users
	   // remove_menu_page( 'tools.php' );                                     //Tools
	   // remove_menu_page( 'options-general.php' );                           //Settings 
}
add_action( 'admin_menu', 'remove_menus', 999 );
		


// REMOVE SOME WP BACKOFFICE ADMIN BAR OPTIONS

function update_adminbar($wp_adminbar) {
  // remove unnecessary items
    // $wp_adminbar->remove_node('wp-logo');
    // $wp_adminbar->remove_node('updates');
    // $wp_adminbar->remove_node('comments');
    // $wp_adminbar->remove_node('new-page');
    // $wp_adminbar->remove_node('new-user');
}
add_action( 'admin_bar_menu', 'update_adminbar', 999 );



// REMOVE WP-ADMIN BAR IN THE FRONT-END
// 
add_filter('show_admin_bar', '__return_false');



// REMOVE WP-ADMIN BAR ELEMENTS IN THE ADMIN PANEL
// 
// add_action( 'admin_bar_menu', 'remove_noise', 999 );
// 
// function remove_noise( $wp_admin_bar ) {
// 	   $wp_admin_bar->remove_node( 'wp-logo' );
//     $wp_admin_bar->remove_node( 'comments' );
//     $wp_admin_bar->remove_node( 'new-content' );
// }



// LIMIT EXCERPT LENGTH TO 20 WORDS
// 
// @param int $length Excerpt length.
// @return int (Maybe) modified excerpt length.
// 
// function wpdocs_custom_excerpt_length( $length ) { return 30; }
// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



// EDIT EXCERPT FINAL [...]
// 
// function new_excerpt_more( $more ) {
// 	return '... <a href="' . get_permalink( get_the_ID() ) . '">Ver más</a>';
// }
// 
// add_filter('excerpt_more', 'new_excerpt_more');



?>