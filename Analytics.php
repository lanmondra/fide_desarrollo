<?php /* Template Name: AnalyticsPage */ ?>

<?php get_header('analytics'); ?>

<section class="grid-container">
    <h1>Analytics</h1>
    <p>Contenido personalizado para la categoría Analytics.</p>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article style="margin-bottom: 40px;">
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <div>
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <!-- Paginación -->
        <div class="pagination">
            <div class="prev">
                <?php previous_posts_link('← Anterior'); ?>
            </div>
            <div class="next">
                <?php next_posts_link('Siguiente →'); ?>
            </div>
        </div>

    <?php else : ?>
        <p>No hay publicaciones en esta categoría todavía.</p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
