<?php /* Template Name: 404 */ ?>



<?php get_header(); ?>



    <main>

        <section>

            <div class="grid-container">
                <div class="grid">
                    <hr class="generic-hr short-hr-after-breadcrumb">
                </div>
            </div>

            <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="grid-container">
                    <div class="grid">
                        <input type="search" id="<?php echo $unique_id; ?>" class="search-input" placeholder="Buscar en fide.es..." value="" name="s" spellcheck="false" autocomplete="off"/>
                        <input type="submit" id="searchsubmit" value="BUSCAR"/>
                    </div>
                </div>
            </form>

        </section>

        <div class="grid-container">
            <div class="page-404">
                <h2>¿Cómo podemos ayudarte?</h2>
                <p class="px16 line24 gray-9">Por favor, ponte en contacto con nosotros si no encuentras el contenido que buscas.</p>
            </div>
        </div>

    </main>



<?php get_footer(); ?>


