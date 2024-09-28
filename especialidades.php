<?php /* Template Name: Especialidades */ ?>



<?php get_header(); ?>



    <main>



        <div class="sections-hero-image">
            <div class="crop">
                <div class="sections-gradient-multiply-div"></div>
                <img class="cropped sections-hero-image-up" src="<?php print IMAGES; ?>/hero-fide-especialidades.jpg">
            </div>
        </div>



        <div class="grid-container mobile-hide">
            <div class="highlighted-tags-container">

                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">HIDROCARBUROS Y ENERGÍA</span></div>
                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">ALCOHOL Y BEBIDAS ALCOHÓLICAS</span></div>
                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">DERECHO ADUANERO TRIBUTARIO</span></div>
                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">FISCALIDAD MEDIOAMBIENTAL</span></div>

            </div>
        </div> <!-- End of grid container -->

       




        <?php
// Supongamos que tienes un array de servicios
$servicios = [
    [
        'titulo' => 'Der. aduanero tributario',
        'descripcion' => 'Calificación de la mercancía, arancel aduanero común, IVA a la importación, regímenes aduaneros y otros ...',
        'url' => site_url() . '/asesoria-derecho-aduanero-tributario'
    ],
    [
        'titulo' => 'Alcohol y bebidas alcoh.',
        'descripcion' => 'Implementación de procesos y análisis de mermas y rendimientos, declaraciones tributarias ...',
        'url' => site_url() . '/asesoria-alcohol-y-bebidas-alcoholicas'
    ],
    [
        'titulo' => 'Hidrocarburos y energía',
        'descripcion' => 'Biocarburantes (FAME, ETBE, alcohol, biogás, plásticos, etcétera), combustibles y carburantes ...',
        'url' => site_url() . '/asesoria-hidrocarburos-y-energia'
    ],
    [
        'titulo' => 'Envases de plástico',
        'descripcion' => 'Envases de plástico no reutilizables, semielaborados, reciclado mecánico y químico, elementos de cierre, ...',
        'url' => site_url() . '/fides/asesoria-envases-de-plastico'
    ]
   
];

// Definir la cantidad de servicios a mostrar por fila (en este caso 3)
$servicios_por_fila = 3; 

echo '<div class="grid-container">';

for ($i = 0; $i < count($servicios); $i += $servicios_por_fila) {
    echo '<div class="grid">';

    // Mostramos los servicios en bloques de $servicios_por_fila
    for ($j = 0; $j < $servicios_por_fila && ($i + $j) < count($servicios); $j++) {
        $servicio = $servicios[$i + $j];
        $class_suffix = $j + 1; // Para generar la clase service-01, service-02, etc.
        echo '<div class="service-0' . $class_suffix . '">';
        echo '<h2 class="px28 line36">' . $servicio['titulo'] . '</h2>';
        echo '<p>' . $servicio['descripcion'] . '</p>';
        echo '<a class="service-cta px14 weight600" href="' . $servicio['url'] . '">VER MÁS</a>';
        echo '</div>';
    }

    echo '</div>'; // Cierre de la fila
}

echo '</div>'; // Cierre del contenedor
?>



        <div class="grid-container">

            <div class="img-fide-office">
                <img src="<?php print IMAGES; ?>/fide-office.jpg">
            </div>
            <p class="after-img-copy">FIDE es una firma profesional formada por economistas y juristas especializados en el asesoramiento del derecho de empresa. Desde el año 1990, y con sede en Madrid y Barcelona, asistimos a nuestros clientes aportando un valor añadido a su actividad y competitividad. Nuestro equipo está compuesto por abogados y economistas con una amplia experiencia tanto en el sector público como en el privado, formando un plantilla de prestigio en el que la capacidad técnica y la especialización consituyen su valor profesional.<br><br>En FIDE somos, además, líderes en el ámbito nacional en la gestión integral de la asesoría y administración de la <b>tributación indirecta y aduanera.</b> Debido a esta especialización, nuestra labor de asesoramiento alcanza sectores muy diversos, desde el sector de los hidrocarburos hasta el de elaboración de cerveza o alcohol, en los cuales la fiscalidad es un componente determinante de la competitividad.<br><br>FIDE ha sido galardonado por el Colegio de Economistas de Cataluña como “mejor despacho profesional del año”.</p>

        </div>



        <!-- <div class="proof-band mobile-hide">
            <div class="grid-container">
                <div class="grid">

                    <div class="proof-01">
                        <span class="px60 ibm-serif">+150</span><br>
                        <span class="px16 line24">Organizaciones de referencia asesoradas</span>
                    </div>
                    <div class="proof-02">
                        <span class="px60 ibm-serif">+30</span><br>
                        <span class="px16 line24">Años de experiencia en impuestos especiales</span>
                    </div>
                    <div class="proof-03">
                        <span class="px60 ibm-serif">+500</span><br>
                        <span class="px16 line24">Informes de análisis forense realizados</span>
                    </div>
                    <div class="proof-04">
                        <span class="px60 ibm-serif">+200</span><br>
                        <span class="px16 line24">Formaciones <i>in company</i> impartidas</span>
                    </div>

                </div>
            </div>
        </div> -->



        <section>
            <div class="services-cta">
                <div class="grid-container">

                    <div class="services-cta-content">
                        <span class="services-cta-text ibm-serif weight600">¿Cómo podemos ayudarte?</span>
                        <br>
                        <a href="<?php echo site_url(); ?>/contacto" class="newsletter-cta-button ibm-sans">CONTACTAR CON FIDE</a>
                    </div>

                    <p class="services-copy mobile-hide">Como líderes en tributación indirecta y aduanera, <b>la excelencia en el servicio es nuestro principal objetivo,</b> y nuestra mayor recompensa, la satisfacción de nuestros clientes: administraciones, entidades públicas y privadas, grandes empresas, pymes y personas físicas.<br>Gracias a la proximidad con el cliente, el dinamismo de respuesta, la anticipación y el máximo respeto a las normas éticas más exigentes, FIDE fue galardonado como <b>Mejor Despacho Profesional de Economistas por el Colegio de Economistas de Cataluña.</b></p>

                </div>
            </div>
        </section>



    </main>



<?php get_footer(); ?>


