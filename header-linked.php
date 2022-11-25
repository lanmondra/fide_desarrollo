<!DOCTYPE html>
<html <?php language_attributes(); ?>>



<!-- 



__/\\\\\\\\\\\\\\\__/\\\\\\\\\\\__/\\\\\\\\\\\\_____/\\\\\\\\\\\\\\\_        
 _\/\\\///////////__\/////\\\///__\/\\\////////\\\__\/\\\///////////__       
  _\/\\\_________________\/\\\_____\/\\\______\//\\\_\/\\\_____________      
   _\/\\\\\\\\\\\_________\/\\\_____\/\\\_______\/\\\_\/\\\\\\\\\\\_____     
    _\/\\\///////__________\/\\\_____\/\\\_______\/\\\_\/\\\///////______    
     _\/\\\_________________\/\\\_____\/\\\_______\/\\\_\/\\\_____________   
      _\/\\\_________________\/\\\_____\/\\\_______/\\\__\/\\\_____________  
       _\/\\\______________/\\\\\\\\\\\_\/\\\\\\\\\\\\/___\/\\\\\\\\\\\\\\\_ 
        _\///______________\///////////__\////////////_____\///////////////__




-->



<head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# video: https://ogp.me/ns/video#">

    <!-- Google Analytics -->
    <!-- DISABLED -->
    <!-- DISABLED -->
    <!-- DISABLED -->
    <?php # include_once("analyticstracking.php") ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FIDE Tax & Legal · Asesores legales y tributarios">
    <meta name="keywords" content="FIDE, Asesoria, Legal, Tributaria, Juridica, Forense, Impuestos, Especiales, Hidrocarburos, Energia, Alcohol, Bebidas, Aduanero, Prevención, Delitos">

    <!-- OG Meta -->
    <?php if (is_single()) { ?> <!-- Check if is a single page and store info to fill meta tags -->

        <?php
            $post_id = get_the_ID();
            $post_object = get_post($post_id);
            $post_content = $post_object->post_content;
        ?>

        <meta property="fb:app_id" content="368453380752161"/>
        <meta property="og:site_name" content="fide.es">
        <meta property="og:url" content="<?php echo esc_url(get_permalink(get_the_ID())); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo the_title(); ?>" />
        <meta property="og:description" content="<?php echo wp_strip_all_tags($post_content); ?>" />
        <meta property="og:image" content="<?php $src = wp_get_attachment_image_src ( get_post_thumbnail_id(get_the_ID()), array('1024','576')); echo $src[0]; ?>">

    <!-- TWITTER -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php the_title(); ?>">
        <meta name="twitter:site" content="@fideasesores">
        <meta name="twitter:creator" content="@fideasesores" />

    <?php } ?>

    <title>

        <?php // WordPress custom title

        // Is the current page a tag archive page?
        if (function_exists('is_tag') && is_tag()) { 

            // If so, display this custom title
            echo 'Archivo para &quot;'.$tag.'&quot; · '; 

        // Or, is the page an archive page?
        } elseif (is_archive()) { 

            // If so, display this custom title
            wp_title(''); echo ' · '; 

        // Or, is the page a search page?
        } elseif (is_search()) { 

            // If so, display this custom title
            echo 'Resultados de la búsqueda &quot;'.wp_specialchars($s).'&quot; · '; 

        // Or, is the front-page?
        } elseif (is_front_page()) { 

            // If so, display this custom title
            echo ''; 

        // Or, is the page a single post or a literal page?
        } elseif (!(is_404()) && (is_single()) || (is_page())) { 

            // If so, display this custom title
            wp_title(''); echo ' · '; 

        // Or, is the page an error page?
        } elseif (is_404()) {

            // Yep, so...
            echo 'Error · '; 

        }
        // Finally, display the blog name for all page types
        bloginfo('name'); 

        ?>

    </title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>?v=001">

    <!-- JQuery -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">    
    </script>

    <!-- Custom JS file loaded on footer to work after loading all content -->

    <!-- Hotjar -->
    <!-- Hotjar Tracking Code for https://www.fide.es -->
    <!-- DISABLED -->
    <!-- DISABLED -->
    <!-- DISABLED -->     
    <!-- <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1464900,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script> -->

    <!-- Favicon Gate -->
    <!-- Generic --> 
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-16.png" sizes="16x16">  
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-32.png" sizes="32x32"> 
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-48.png" sizes="48x48">  
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-144.png" sizes="144x144">
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-256.png" sizes="256x256">
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-384.png" sizes="384x384">
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-512.png" sizes="512x512">
        <link rel="icon" type="image/png" href="<?php print IMAGES; ?>/favicons/android-chrome-192.png" sizes="192x192">

    <!-- Android --> 
        <link rel="shortcut icon" type="image/png" href="<?php print IMAGES; ?>/favicons/icon-196.png" sizes="196x196">
    
    <!-- Android manifest.json - https://developers.google.com/web/fundamentals/web-app-manifest/ -->
        <link rel="manifest" href="<?php print TEMPPATH; ?>/manifest.json">

    <!-- Apple -->
        <link rel="apple-touch-icon" sizes="120x120" href="<?php print IMAGES; ?>/favicons/older-iPhone.png"> <!-- // 120px --> 
        <link rel="apple-touch-icon" sizes="57x57" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php print IMAGES; ?>/favicons/apple-touch-icon-144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php print IMAGES; ?>/favicons/iPad-Retina.png">  
        <link rel="apple-touch-icon" sizes="167x167" href="<?php print IMAGES; ?>/favicons/iPad-Pro.png">  
        <link rel="apple-touch-icon" sizes="180x180" href="<?php print IMAGES; ?>/favicons/iPhone-6-Plus.png">  
        <link rel="mask-icon" href="<?php print IMAGES; ?>/favicons/safari-pinned-tab.svg" color="#d55b5b">
        <!-- Also, place an icon file in PNG format in the root document folder called apple-touch-icon.png -->

    <!-- Windows 8 IE 10 -->
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="<?php print IMAGES; ?>/favicons/favicon-144.png">

    <!-- Windows 8.1 + IE11 and above -->
        <meta name="msapplication-config" content="<?php print IMAGES; ?>/browserconfig.xml" />

    <?php wp_head(); ?>

</head>



<body>



    <!-- Design guide background -->
    <!-- <div class="mockup-guide"></div> -->



    <header>
        
        <nav id="navigation" class="unselectable">

            <div class="hamburger js-showmenu"> <!-- js-showmenu class targeted from JS -->
                <img src="<?php print IMAGES; ?>/icons-menu.svg">
            </div>

            <div class="top-nav-container">

                <div class="left fide-logo">
                    <a href="<?php echo site_url(); ?>" title="fide.es - Inicio">
                        <img src="<?php print IMAGES; ?>/fide-logo.svg" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>

                <ul class="rootmenu row">

                    <li class="responsive-menu-inicio">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>">Inicio</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-actualidad" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/actualidad">Actualidad</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-servicios" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/servicios">Servicios</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-especialidades" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/especialidades">Especialidades</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-contacto" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/contacto">Contacto</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-newsletter" class="js-top-section menu-newsletter">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/temas/newsletter">
                            <img class="menu-newsletter-img" src="<?php print IMAGES; ?>/icons-menu-newsletter.svg" alt="Newsletter">
                            Newsletter
                        </a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-search" class="js-top-section menu-search">
                        <span class="nav-bullet"></span>

                        <!-- SEARCH LINK HERE? -->
                        <!-- SEARCH LINK HERE? -->
                        <!-- SEARCH LINK HERE? -->
                        <a class="menu-search" href="#">
                            <img src="<?php print IMAGES; ?>/icons-menu-search.svg" alt="Buscar">
                        </a>
                        <span class="hover-border"></span>
                    </li>

                </ul>

            </div> <!-- End of top nav container -->



            <div class="bottom-nav-container"> <!-- Full page width and background color -->

                <div class="submenu-actualidad">
                    <div class="grid-container">
                        <div class="grid">

                            <ul class="col-1-6">
                                <li><a href="<?php echo site_url(); ?>/temas/aduanas">Aduanas</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/aeat">AEAT</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/alcohol">Alcohol</a></li>
                            </ul>
                            <ul class="col-2-6">
                                <li><a href="<?php echo site_url(); ?>/temas/cerveza">Cerveza</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/depositos">Depósitos</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/energia">Energía</a></li>
                            </ul>
                            <ul class="col-3-6">
                                <li><a href="<?php echo site_url(); ?>/temas/eventos">Eventos</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/fiscalidad">Fiscalidad</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/formacion">Formación</a></li>
                            </ul>
                            <ul class="col-4-6">
                                <li><a href="<?php echo site_url(); ?>/temas/hidrocarburos">Hidrocarburos</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/impuestos-especiales">Impuestos E.</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/iva-irpf">IVA / IRPF</a></li>
                            </ul>
                            <ul class="col-5-6">
                                <li><a href="<?php echo site_url(); ?>/temas/ivmdh">IVMDH</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/medioambiente">Medioambiente</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/renovables">Renovables</a></li>
                            </ul>
                            <ul class="col-6-6">
                                <li><a href="<?php echo site_url(); ?>/temas/renta">Renta</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/tabaco">Tabaco</a></li>
                                <li><a href="<?php echo site_url(); ?>/temas/vino">Vino</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                        
                <div class="submenu-servicios">
                    <div class="grid-container">
                        <div class="grid">

                            <ul class="col-1-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/asesoria-tributaria">
                                        Asesoría tributaria
                                        <br><span>Asesoría fiscal de sociedades, entidades y personas físicas</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-2-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/asesoria-juridica">
                                        Asesoría jurídica
                                        <br><span>En consejos de administración y como letrados asesores</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-3-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/economia-forense">
                                        Economía forense
                                        <br><span>Peritaje de procesos judiciales, civiles, penales y contenciosos</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-4-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/formacion-in-company">
                                        Formación <i>in company</i>
                                        <br><span>Cursos a medida de las necesidades de cada compañía</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="submenu-especialidades">
                    <div class="grid-container">
                        <div class="grid">

                            <ul class="col-1-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/derecho-aduanero-tributario">
                                        Derecho aduanero tributario
                                        <br><span>Derecho, aranceles, regímenes y gestión de depósitos</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-2-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/alcohol-y-bebidas-alcoholicas">
                                        Alcohol y bebidas alc.
                                        <br><span>Inspecciones, recursos, auditorias y evaluación riesgos</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-3-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/hidrocarburos-y-energia">
                                        Hidrocarburos y energía
                                        <br><span>Declaraciones tributarias, contabilidad y circulación</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-4-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/fiscalidad-medioambiental">
                                        Fiscalidad medioambiental
                                        <br><span>Impuestos sobre gases, producción, combustible...</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="submenu-contacto">
                    <div class="grid-container">
                        <div class="grid">

                            <ul class="col-1-4">
                                <li>
                                    Oficinas Barcelona
                                    <br><span>Rambla Catalunya 38, 7ª P<br>08007 Barcelona</span>
                                </li>
                            </ul>
                            <ul class="col-2-4">
                                <li>
                                    Oficinas Madrid
                                    <br><span>Calle Alcalá 87, 5ª Planta<br>28009 Madrid</span>
                                </li>
                            </ul>
                            <ul class="col-3-4">
                                <li>
                                    Teléfono / Fax
                                    <br><span><img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-phone.svg">902 350 340
                                        <br><img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-fax.svg">934 883 633</span>
                                </li>
                            </ul>
                            <ul class="col-4-4">
                                <li>
                                    <a class="sub-menu-button-48px-red" href="<?php echo site_url(); ?>/contacto">CONTACTAR CON FIDE</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="submenu-newsletter">
                    <div class="grid-container">
                        <div class="grid">

                            <ul class="col-1-4">
                                <li>
                                    Suscríbete a nuestro boletín
                                    <br><span><a href="<?php echo site_url(); ?>/temas/newsletter">También puedes consultar el<br>archivo de newsletters</a></span>
                                </li>
                            </ul>
                            <ul class="sub-menu-newsletter-fide">
                                <li>
                                    <img src="<?php print IMAGES; ?>/newsletter-fide.png">
                                </li>
                            </ul>
                            <ul class="col-4-4">
                                <li>
                                    <a class="sub-menu-button-48px-red" href="https://eepurl.com/gBL4ir">SUSCRIBIRME</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                
                <div class="submenu-search">
                    <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="grid-container">
                            <div class="grid nav-search-container">
                                <input type="search" id="<?php echo $unique_id; ?>" class="search-input" placeholder="Buscar en fide.es..." value="" name="s" spellcheck="false" autocomplete="off"/>
                                <input type="submit" id="searchsubmit" value="BUSCAR"/>
                            </div>
                        </div>
                    </form>
                </div>

            </div> <!-- End of bottom nav container -->



        </nav>



        <?php

        $current_tag = single_tag_title("", false);
        $current_category = single_cat_title("", false);
        $current_cat_id = get_cat_id($current_category);
        $search_title = "Resultados de la búsqueda";
        $single_page_title = get_the_title();
        $error_page_title = "Error";

        $actualidad_sub_sections = array("");

        // DEFINE PARENT SECTION DEPENDING ON $current_category

        if (in_array($current_cat_id, $actualidad_sub_sections)) { $parent_section = "Actualidad"; }
        elseif (in_array($current_cat_id, $actualidad_sub_sections)) { $parent_section = "Servicios"; }

        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE
        // TO BE DONE

        // END THIS CODE... RIGHT NOW ONLY SHOWING TITLE INSTEAD OF BUILT BREADCRUMB
        // WE NEED TO TAKE THE ID OF THE PAGE (PAGE OR CATS_ARCHIVE OR WHATEVER IT IS)
        // WITH THE ID, SEE IF IT'S AN ARCHIVE PAGE, SINGLE PAGE OR WHATEVER
        // THEN, IF IT IS AN ARCHIVE PAGE, BUILT A SUPERIOR SECTION BREADCRUMB WITH LINK TO IT
        // FOLLOWED BY THE ACTUAL TITLE OF THE ARCHIVE/CAT...
        // ELSE, IF IT'S A SINGLE PAGE, CHECK IF IT'S INSIDE A SECTION (F.EX. IT IS A SERVICE INSIDE OF SERVICES)
        // BUILT THAT FOR SERVICES AND ESPECIALIDADES
        // ELSE, IF IT'S CONTACT, NEWSLETTER, SEARCH... JUST SHOW TITLE


        // Is the "Actualidad" page?
        if (is_page('actualidad')) {
            fide_breadcrumb_code("Actualidad", null, "black");

        // Is the newsletter archive page?
        } elseif (is_page('newsletter')) {
            fide_breadcrumb_code("Newsletter", null, "black");

        // Is a single article page?
        } elseif (is_single()) {
            fide_breadcrumb_code("Actualidad", null, "white");

        // Is the current page a tag archive page?
        } elseif (function_exists('is_tag') && is_tag()) {
            fide_breadcrumb_code($current_tag, null, "black");

        // Or, is the page an archive page?
        } elseif (is_archive()) {
            fide_breadcrumb_code($current_category, null, "black");

        // Or, is the page a search page?
        } elseif (is_search()) { 
            fide_breadcrumb_code($search_title, null, "black");

        // Or, is the front-page?
        } elseif (is_front_page()) { 
            print '<!-- // That is home -->'; 

        // Or, is the page a single post or a literal page?
        } elseif (!(is_404()) && (is_single()) || (is_page())) { 
            fide_breadcrumb_code($single_page_title, "Test-sub-cat", "white");

        // Or, is the page an error page?
        } elseif (is_404()) {
            fide_breadcrumb_code($error_page_title, null, "black");

        }

        ?>



    </header>


