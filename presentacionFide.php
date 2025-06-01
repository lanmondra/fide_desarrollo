<?php /* Template Name: PresentaciónFide */ ?>

<?php get_header(); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/presentacion.css">
    <main>
        <section class="presentation-slider swiper">
            <div class="swiper-wrapper">
                <?php 
                $slides = [
                    ['img' => 'imgPresentation1.jpg', 'title' => 'Sobre nosotros', 'text' => ''],
                    ['img' => 'imgPresentation2.jpg', 'title' => 'Misión', 'text' => ''], 
                    ['img' => 'imgPresentation3.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation4.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation5.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation6.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation7.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation8.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation9.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation10.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation11.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation12.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation13.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation14.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation15.jpg', 'title' => 'Visión', 'text' => ''],
                    ['img' => 'imgPresentation16.jpg', 'title' => 'Visión', 'text' => ''],
                ];

                foreach ($slides as $slide) :
                    $hasText = !empty($slide['text']);
                ?>
                    <div class="swiper-slide">
                        <div class="presentation-slide-content <?php echo $hasText ? '' : 'full-image-slide'; ?>">
                            <div class="slide-image <?php echo $hasText ? '' : 'full-width'; ?>">
                                <img src="<?php echo IMAGES . '/' . $slide['img']; ?>" alt="">
                            </div>

                            <?php if ($hasText): ?>
                                <div class="slide-text">
                                    <h2><?php echo $slide['title']; ?></h2>
                                    <p><?php echo $slide['text']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
        </section>


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

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <script>
            const swiper = new Swiper('.presentation-slider', {
                loop: true,
                //autoplay: {
                //    delay: 5000, // 5 segundos entre slides
                //    disableOnInteraction: false,
                //},
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'slide',
                speed: 600,
            });
        </script>


    </main>



<?php get_footer(); ?>


