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
    <?php include_once("analyticstracking.php") ?>

    <meta charset="<?php bloginfo('charset'); ?>">
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

        <meta property="fb:app_id" content="368453380752161" />
        <meta property="og:site_name" content="fide.es">
        <meta property="og:url" content="<?php echo esc_url(get_permalink(get_the_ID())); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo the_title(); ?>" />
        <meta property="og:description" content="<?php echo wp_strip_all_tags($post_content); ?>" />
        <meta property="og:image" content="<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array('1024', '576'));
                                            echo $src[0]; ?>">

        <!-- TWITTER -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?php echo the_title(); ?>">
        <meta name="twitter:description" content="<?php echo wp_strip_all_tags($post_content); ?>">
        <meta name="twitter:image" content="<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array('1024', '576'));
                                            echo $src[0]; ?>">
        <meta name="twitter:site" content="@fidetax_legal">
        <meta name="twitter:creator" content="@fidetax_legal">

    <?php } ?>

    <title>

        <?php // WordPress custom title

        // Is the current page a tag archive page?
        if (function_exists('is_tag') && is_tag()) {

            // If so, display this custom title
            echo 'Archivo para &quot;' . $tag . '&quot; · ';

            // Or, is the page an archive page?
        } elseif (is_archive()) {

            // If so, display this custom title
            wp_title('');
            echo ' · ';

            // Or, is the page a search page?
        } elseif (is_search()) {

            // If so, display this custom title
            echo 'Resultados de la búsqueda &quot;' . esc_html($s) . '&quot; · ';

            // Or, is the front-page?
        } elseif (is_front_page()) {

            // If so, display this custom title
            echo '';

            // Or, is the page a single post or a literal page?
        } elseif (!(is_404()) && (is_single()) || (is_page())) {

            // If so, display this custom title
            wp_title('');
            echo ' · ';

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
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>?v=012">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
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
    <style>
        .description {
            position: absolute;
            display: block;
            text-align: center;
            width: 100%;
            margin-top: 88px;
            padding-right: 230px;
            font-size: 22px;
            color: #ac0500;
        }

        .top-nav-container {
            position: relative;
        }
    </style>

    <header class="non-printable">
        <nav id="navigation" class="unselectable">
            <div class="hamburger-menu-container">               
                <div class="hamburger js-showmenu"> <!-- js-showmenu class targeted from JS -->
                    <img src="<?php print IMAGES; ?>/icons-menu.svg" alt="Menu">
                </div>
                <!-- <div class="hamburger"> 
                <a href="<?php echo site_url(); ?>" title="fide.es - Inicio">
                    <img class="img-log-movils" src="<?php print IMAGES; ?>/fide-logo.svg" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>  -->

                <div class="hamburger-menu-search-icon">
                    <a class="mobile-link-no-highligth" href="<?php echo site_url(); ?>/buscar">
                        <img class="mobile-menu-search" src="<?php print IMAGES; ?>/icons-search-white.svg">
                    </a>
                </div>
            </div>

            <div class="top-nav-container">
                <div class="left fide-logo">
                    <a href="<?php echo site_url(); ?>" title="fide.es - Inicio">
                        <img src="<?php print IMAGES; ?>/fide-logo-tax.svg" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>

                <ul class="rootmenu row">       
                    <li class="responsive-menu-inicio">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>">Inicio</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="js-actualidad" class="js-top-section mobile-nav-hide">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/actualidad/fide-medios">Actualidad</a>
                        <span class="hover-border"></span>

                    </li>
                    <!-- START OF MOBILE NAV SECTIONS -->
                    <!-- START OF MOBILE NAV SECTIONS -->

                    <li id="mobile-nav-sections">
                    <span class="nav-bullet-act">+</span>
                    <a href="javascript:void(0);" onclick="toggleDropdown('actualidad-dropdown')">Actualidad</a>
                    <span class="hover-border"></span>
                        <ul id="actualidad-dropdown" class="dropdown-content">
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/aduanas">Aduanas</a>
                            </li> 
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/hidrocarburos-y-energia">Hidrocarburos y energía</a>
                            </li>
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/alcohol-y-bebidas-alcoholicas">Alcohol y bebidas alcohólicas</a>
                            </li>
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/tributacion-indirecta">Tributación indirecta</a>
                            </li>
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/fiscalidad-general">Fiscalidad general</a>
                            </li>
                            <li id="actualidad-dropdown">
                            <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/labores-del-tabaco">Labores del tabaco</a>
                            </li>
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/impuestos-medioambientales">Impuestos medioambientales</a>
                            </li>
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/envases-de-plastico">Envases de plástico</a>
                            </li>
                            <li id="actualidad-dropdown">
                                <span class="nav-bullet"></span>
                                <a href="<?php echo site_url(); ?>/actualidad/derechos-de-emision">Derechos de emisión</a>
                            </li>                           
                        </ul>
                    </li>

                    <!-- END OF MOBILE NAV SECTIONS -->
                    <!-- END OF MOBILE NAV SECTIONS -->

                    <li id="mobile-nav-sections">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/actualidad/newsletter">Newsletter</a>
                        <span class="hover-border"></span>
                    </li>

                    <li id="mobile-nav-sections">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/actualidad/formacion-y-eventos">Formación y eventos</a>
                        <span class="hover-border"></span>
                    </li>
                    <li id="js-especialidades" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/especialidades">Especialidades</a>
                        <span class="hover-border"></span>
                    </li>
                                  
                    <li id="js-servicios" class="js-top-section only-mobile">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/servicios">Servicios</a>
                        <span class="hover-border"></span>
                    </li>

                    
                    <li>
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/actualidad/informes-fide">Informes</a>
                    </li>
                    <li id="js-presentacion" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/fide-presentacion">Quiénes somos</a>
                        <span class="hover-border"></span>
                    </li> 
                  
                    <li id="js-contacto" class="js-top-section">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/contacto">Contacto</a>
                        <span class="hover-border"></span>
                    </li>
                    
                    <li class="description display-dispositivos">
                        Asesores legales y tributarios
                    </li>

                    <li id="js-newsletter" class="js-top-section menu-newsletter">
                        <span class="nav-bullet"></span>
                        <a href="<?php echo site_url(); ?>/actualidad/newsletter">
                            <!-- <img class="menu-newsletter-img" src="<?php print IMAGES; ?>/icons-menu-newsletter.svg" alt="Newsletter"> -->
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


                            <!-- 3 - 3 - 2 - 2 -->
                            <ul class="col-1-4">
                                <li><a href="<?php echo site_url(); ?>/actualidad/aduanas">Aduanas</a></li>
                                <li><a href="<?php echo site_url(); ?>/actualidad/hidrocarburos-y-energia">Hidrocarburos y energía</a></li>
                                <li><a href="<?php echo site_url(); ?>/actualidad/alcohol-y-bebidas-alcoholicas">Alcohol y bebidas alcoh.</a></li>
                            </ul>
                            <ul class="col-2-4">
                                <li><a href="<?php echo site_url(); ?>/actualidad/tributacion-indirecta">Tributación indirecta</a></li>
                                <li><a href="<?php echo site_url(); ?>/actualidad/fiscalidad-general">Fiscalidad general</a></li>
                                <li><a href="<?php echo site_url(); ?>/actualidad/labores-del-tabaco">Labores del tabaco</a></li>
                            </ul>
                            <ul class="col-3-4">
                                <li><a href="<?php echo site_url(); ?>/actualidad/formacion-y-eventos">Formación y eventos</a></li>
                                <li><a href="<?php echo site_url(); ?>/actualidad/envases-de-plastico">Envases de plástico</a></li>

                            </ul>
                            <ul class="col-4-4">
                                <li><a href="<?php echo site_url(); ?>/actualidad/impuestos-medioambientales">Impuestos medioamb.</a></li>
                                <li><a href="<?php echo site_url(); ?>/actualidad/derechos-de-emision">Derechos de emisión</a></li>

                            </ul>

                        </div>
                    </div>
                </div>

                <div class="submenu-servicios">
                    <div class="grid-container">
                        <div class="grid-services">

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
                                    <a href="<?php echo site_url(); ?>/economia-forense">
                                        Economía forense
                                        <br><span>Peritaje de procesos judiciales, civiles, penales y contenciosos</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-3-4">
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
                <div class="submenu-presentacion">
                <div class="grid-container">
                        <div class="grid-services">

                            <ul class="col-1-4">
                                <li>
                                    <a  class="presentation-header" href="<?php echo site_url(); ?>/fide-presentacion">
                                        Presentación                                       
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-2-4">
                                <li>
                                    <a class="presentation-header"  href="<?php echo site_url(); ?>/servicios">
                                        Servicios
                                    </a>
                                </li>
                            </ul>                           
                        </div>
                    </div>
                </div>


                <div class="submenu-especialidades">
                    <div class="grid-container">
                        <div class="grid-especialidades">
                            <ul class="column-1-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/asesoria-hidrocarburos-y-energia">
                                        Hidrocarburos y energía
                                        <br><br>
                                    </a>
                                    <a href="<?php echo site_url(); ?>/asesoria-alcohol-y-bebidas-alcoholicas">
                                        Alcohol y bebidas alcohólicas

                                    </a>
                                </li>
                            </ul>
                            <ul class="column-2-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/asesoria-fiscalidad-medioambiental">
                                        Fiscalidad medioambiental
                                        <br> <br>
                                    </a>
                                    <a href="<?php echo site_url(); ?>/asesoria-envases-de-plastico">
                                        Envases de plástico


                                    </a>

                                </li>
                            </ul>
                            <ul class="column-3-4">
                                <li>
                                    <a href="<?php echo site_url(); ?>/asesoria-derecho-aduanero-tributario">
                                        Derecho aduanero tributario
                                        <br> <br>
                                    </a>

                                    <a href="<?php echo site_url(); ?>/asesoria-derechos-emision">
                                        Derechos de emisión

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
                                    <!-- THIS LINK WAS DEACTIVATED -->
                                    <!-- <a href="https://goo.gl/maps/dDzoreY5ihHVc7wi9" target="_blank"> -->
                                    <a href="https://www.fide.es/contacto">
                                        Oficinas Barcelona
                                        <br><span>Rambla Cataluña 38, 7ª<br>08007 Barcelona</span>
                                    </a>
                                    <!-- NUEVA FORMA DE MOSTRAR LA DIRECCION -->
                                    <img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-phone.svg">
                                    934 883 600

                                </li>
                            </ul>
                            <ul class="col-2-4">
                                <li>
                                    <!-- THIS LINK WAS DEACTIVATED -->
                                    <!-- <a href="https://goo.gl/maps/J1CwnKfhpor4urbeA" target="_blank"> -->
                                    <a href="https://www.fide.es/contacto">
                                        Oficinas Madrid
                                        <br><span>C/ Guzmán el Bueno 74, 1º<br>28015 Madrid</span>
                                    </a>
                                    <!-- NUEVA FORMA DE MOSTRAR LA DIRECCION -->
                                    <img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-phone.svg">
                                    910 851 756

                                    <br>
                                </li>
                            </ul>

                            <!-- NUEA DIRECCION VIGO  -->
                            <ul class="col-3-4">
                                <li>

                                    <a href="https://www.fide.es/contacto">
                                        Oficinas Vigo
                                        <br><span>C/ Marqués de Valladares 14, 6ª <br>36201 Vigo</span>
                                    </a>

                                    <img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-phone.svg">
                                    886 035 929
                                    <br>
                                </li>
                            </ul>


                            <!-- SE DEBERIA QUITAR EL UL class="col-3-4" COMPLETO 
                            <ul class="col-3-4">
                                <li>
                                    Teléfono
                                    <br>
                                    <span>
                                    	<img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-phone.svg">
                                    	Barcelona &nbsp; 934 883 600
                                    	<br>
	                                    <img class="sub-menu-icons" src="<?php print IMAGES; ?>/icons-phone.svg">
                                		Madrid &nbsp; 910 851 756
                                	</span>
                                </li>
                            </ul>
							-->
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
                                    <br><a href="<?php echo site_url(); ?>/actualidad/newsletter"><span>También puedes consultar el<br>archivo de newsletters</span></a>
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
                    <?php $unique_id = esc_attr(uniqid('search-form-')); ?>

                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="grid-container">
                            <div class="grid nav-search-container">
                                <input type="search" id="<?php echo $unique_id; ?>" class="search-input" placeholder="Buscar en fide.es..." value="" name="s" spellcheck="false" autocomplete="off" />
                                <input type="submit" id="searchsubmit" value="BUSCAR" />
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
        $category_id = get_queried_object_id();
        $category_description = category_description($category_id);
        $search_title = "Resultados de la búsqueda";
        $single_page_title = get_the_title();
        $error_page_title = "Página no encontrada";
        
        if (!empty($category_description)) {  
            $category_description_short = mb_substr(strip_tags($category_description), 0, 55);
        if (mb_strlen(strip_tags($category_description)) > 55) {
            $category_description_short .= '...'; 
        }
          //$category_description_short = wp_trim_words($category_description, 9, '...'); 
        } else {
          $category_description_short = "";
        }

        $actualidad_sub_sections = array("");

        // DEFINE PARENT SECTION DEPENDING ON $current_category

        if (in_array($current_cat_id, $actualidad_sub_sections)) {
            $parent_section = "Actualidad";
        } elseif (in_array($current_cat_id, $actualidad_sub_sections)) {
            $parent_section = "Servicios";
        }

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
            fide_breadcrumb_code("FIDE en los Medios", null, "black","");
        }
         // Is the servicios page?   
         elseif (is_page('analytics')) {
            fide_breadcrumb_code("Presentación", null, "black","");

            // Is the servicios page?
        } elseif (is_page('fide-presentacion')) {
            fide_breadcrumb_code("Presentación", null, "black","");

            // Is the servicios page?
        }
        elseif (is_page('servicios')) {
            fide_breadcrumb_code("Servicios", null, "white", "");
        } elseif (is_page('asesoria-tributaria')) {
            fide_breadcrumb_code("Asesoría tributaria", null, "white", "");
        } elseif (is_page('asesoria-juridica')) {
            fide_breadcrumb_code("Asesoría jurídica", null, "white", "");
        } elseif (is_page('economia-forense')) {
            fide_breadcrumb_code("Economía forense", null, "white", "");
        } elseif (is_page('formacion-in-company')) {
            fide_breadcrumb_code("Formación <i>in company</i>", null, "white", "");

            // Is the especialidades page?
        } elseif (is_page('especialidades')) {
            fide_breadcrumb_code("Especialidades", null, "white", "");
        } elseif (is_page('asesoria-hidrocarburos-y-energia')) {
            fide_breadcrumb_code("Hidrocarburos y energía", null, "white", "");
        } elseif (is_page('asesoria-alcohol-y-bebidas-alcoholicas')) {
            fide_breadcrumb_code("Alcohol y bebidas alcohólicas", null, "white", "");
        } elseif (is_page('asesoria-derecho-aduanero-tributario')) {
            fide_breadcrumb_code("Derecho aduanero tributario", null, "white", "");
        } elseif (is_page('asesoria-fiscalidad-medioambiental')) {
            fide_breadcrumb_code("Fiscalidad medioambiental", null, "white", "");
        } elseif (is_page('asesoria-envases-de-plastico')) {
            fide_breadcrumb_code("Envases de plástico", null, "white", "");
        } elseif (is_page('asesoria-derechos-emision')) {
            fide_breadcrumb_code("Derechos de Emisión", null, "white", "");
        } elseif (is_page('asesoria-fiscalidad-del-tabaco')) {
            fide_breadcrumb_code("Fiscalidad del tabaco", null, "white", "");
            

            // Is the informes page?
            //asesoria-envases_plasticos
            //asesoria-derechos-emision

        } elseif (is_page('informes-fide')) {
            fide_breadcrumb_code("FIDE en los Medios", null, "black", "");
            // Is the newsletter archive page?
        } elseif (is_page('newsletter')) {
            fide_breadcrumb_code("Newsletter", null, "black", "");

            // Is the contact page?
        } elseif (is_page('contacto')) {
            fide_breadcrumb_code("Contacto", null, "black", "");

            // Is any of the legal pages?
        } elseif (is_page('politica-de-privacidad')) {
            fide_breadcrumb_code("Política de privacidad", null, "black", "");
        } elseif (is_page('politica-de-cookies')) {
            fide_breadcrumb_code("Política de cookies", null, "black", "");
        } elseif (is_page('aviso-legal')) {
            fide_breadcrumb_code("Aviso legal", null, "black", "");

            // Is a single article page?
        } elseif (is_page('Politica de privacidad')) {
            fide_breadcrumb_code("Política de privacidad", null, "black", "");

        } elseif (is_page('Politicas de cookies')) {
            fide_breadcrumb_code("Política de cookies", null, "black", "");

            // Is a single article page?
        }elseif (is_single()) {
            fide_breadcrumb_code("Actualidad", null, "white", "");

            // Is the current page a tag archive page?
        } elseif (function_exists('is_tag') && is_tag()) {
            fide_breadcrumb_code($current_tag, null, "black", "");

            // Or, is the page an archive page?
        } elseif (is_archive()) {
            fide_breadcrumb_code($current_category, null, "black", $category_description_short);

            // Or, is the page a search page?
        } elseif (is_search()) {
            fide_breadcrumb_code($search_title, null, "black", "");

            // Or, is the page the blank search page?
        } elseif (is_page('buscar')) {
            fide_breadcrumb_code("Buscar en fide.es", null, "black", "");

            // Or, is the front-page?
        } elseif (is_front_page()) {
            print '<!-- // That is home --><span style="display: block; height: 0px;"></span>';

            // Or, is the page a single post or a literal page?
        } elseif (!(is_404()) && (is_single()) || (is_page())) {
            fide_breadcrumb_code($single_page_title, "Test-sub-cat", "white", "");

            // Or, is the page an error page?
        } elseif (is_404()) {
            fide_breadcrumb_code($error_page_title, null, "black", "");
        }

        ?>

        <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const parentLi = dropdown.closest('li'); // Encuentra el contenedor <li>
            const bullet = parentLi.querySelector('.nav-bullet-act'); // Selecciona el span .nav-bullet-act

            // Alternar la visibilidad del dropdown
            dropdown.classList.toggle('show');

            // Cambiar el texto del símbolo
            if (dropdown.classList.contains('show')) {
                bullet.textContent = '-'; // Cambiar a guion    
            } else {
                bullet.textContent = '+'; // Cambiar a más
            }
        }

        // Cerrar el menú si se hace clic fuera
        document.addEventListener('click', function (event) {
            const dropdown = document.getElementById('actualidad-dropdown');
            const parentLi = dropdown.closest('li');
            const bullet = parentLi.querySelector('.nav-bullet-act');
            const isClickInside = dropdown.contains(event.target) || event.target.closest('[onclick*="toggleDropdown"]');

            if (!isClickInside) {
                dropdown.classList.remove('show');
                if (bullet) {
                bullet.textContent = '+'; // Cambiar al estado cerrado
                }
            }
        });


        </script>

    </header>