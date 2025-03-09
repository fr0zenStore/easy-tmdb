<?php get_header(); ?>

<div class="container mt-4">
    <h1 class="mb-4 text-center">Articoli Recenti</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col">
                <div class="card h-100">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                        </a>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                        </h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Pubblicato il <?php the_time('d M Y'); ?> da <?php the_author(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; else : ?>
            <p class="text-center">Nessun contenuto trovato.</p>
        <?php endif; ?>
    </div>

    <!-- Paginazione -->
    <div class="mt-4">
        <?php
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('&laquo; Precedente', 'easy-tmdb'),
            'next_text' => __('Successivo &raquo;', 'easy-tmdb'),
        ));
        ?>
    </div>
</div>

<?php get_footer(); ?>
