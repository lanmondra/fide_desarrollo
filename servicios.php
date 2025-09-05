<?php /* Template Name: Servicios */ ?>



<?php get_header(); ?>



    <main>
        <div class="sections-hero-image">
            <div class="crop">
                <div class="sections-gradient-multiply-div"></div>
                <img class="cropped sections-hero-image-up" src="<?php print IMAGES; ?>/hero-fide-servicios.jpg">
            </div>
        </div>

        <div class="grid-container mobile-hide">
            <div class="highlighted-tags-container">

                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">ASESORÍA TRIBUTARIA</span></div>
                <!-- <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">ASESORÍA JURÍDICA</span></div> -->
                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">ECONOMÍA FORENSE</span></div>
                <div class="highlighted-tag px20 line24 weight600">
                    <span class="tag-text">FORMACIÓN <i>IN COMPANY</i></span></div>

            </div>
        </div> <!-- End of grid container -->



        <div class="grid-container">
            <div class="grid">
            <?php
                $servicios = [
                    [
                    'clase' => 'new-service-01',
                    'titulo' => 'Asesoría tributaria',
                    'texto'  => 'En FIDE actuamos con plena dedicación al cliente en el ámbito de los tributos que conforman la imposición directa en España y también la imposición indirecta.',
                    'url'    => site_url() . '/asesoria-tributaria'
                    ],
                    [
                    'clase' => 'new-service-02',
                    'titulo' => 'Economía forense',
                    'texto'  => 'Actuamos como peritos expertos en procesos judiciales, civiles, penales y contenciosos administrativos. La importancia de las cuestiones económicas hace que la labor del perito sea fundamental en la resolución de conflictos, especialmente en los asuntos tributarios.',
                    'url'    => site_url() . '/economia-forense'
                    ],
                    [
                    'clase' => 'new-service-03',
                    'titulo' => 'Formación <i>in company</i>',
                    'texto'  => 'Participamos en programas didácticos en el ámbito universitario y empresarial. Ofrecemos formación personalizada en función de los objetivos y necesidades de cada compañía, adaptando los contenidos a la realidad empresarial.',
                    'url'    => site_url() . '/formacion-in-company'
                    ]
                ];

                foreach ($servicios as $servicio): ?>
                    <div class="<?php echo $servicio['clase']; ?>">
                        <h2 class="px28 line36"><?php echo $servicio['titulo']; ?></h2>
                        <p><?php echo $servicio['texto']; ?></p>
                        <a class="service-cta px14 weight600" href="<?php echo $servicio['url']; ?>">VER MÁS</a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>



        <div class="grid-container">

            <div class="img-fide-office">
                <img src="<?php print IMAGES; ?>/fide-office.jpg">
            </div>
            <p class="after-img-copy">FIDE es una firma profesional formada por economistas y juristas especializados en el asesoramiento del derecho de empresa. 
                Desde el año 1990, y con sede en Madrid, Barcelona y Vigo, asistimos a nuestros clientes aportando un valor añadido a su actividad y competitividad. 
                Nuestro equipo está compuesto por abogados y economistas con una amplia experiencia tanto en el sector público como en el privado, formando una plantilla de prestigio en el que la capacidad técnica y la especialización consituyen su valor profesional.<br><br>En FIDE somos, además, líderes en el ámbito nacional en la gestión integral de la asesoría y administración de la <b>tributación indirecta y aduanera.</b> Debido a esta especialización, nuestra labor de asesoramiento alcanza sectores muy diversos, desde el sector de los hidrocarburos hasta el de elaboración de cerveza o alcohol, en los cuales la fiscalidad es un componente determinante de la competitividad.<br><br>FIDE ha sido galardonado por el Colegio de Economistas de Cataluña como “mejor despacho profesional del año”.</p>

        </div>
        <section>
            <div class="services-cta">
                <div class="grid-container">

                    <div class="services-cta-content">
                        <span class="services-cta-text ibm-serif weight600">¿Cómo podemos ayudarte?</span>
                        <br>
                        <a href="<?php echo site_url(); ?>/contacto" class="newsletter-cta-button ibm-sans">CONTACTAR CON FIDE</a>
                    </div>

                    <p class="services-copy">Como líderes en tributación indirecta y aduanera, <b>la excelencia en el servicio es nuestro principal objetivo,</b> y nuestra mayor recompensa, la satisfacción de nuestros clientes: administraciones, entidades públicas y privadas, grandes empresas, pymes y personas físicas.<br>Gracias a la proximidad con el cliente, el dinamismo de respuesta, la anticipación y el máximo respeto a las normas éticas más exigentes, FIDE fue galardonado como <b>Mejor Despacho Profesional de Economistas por el Colegio de Economistas de Cataluña.</b></p>

                </div>
            </div>
        </section>



    </main>



<?php get_footer(); ?>


