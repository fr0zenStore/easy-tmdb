<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <h1><?php the_title(); ?></h1>
            <p><strong>Anno:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'release_year', true)); ?></p>
            <p><strong>Voto:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'vote_average', true)); ?>/10</p>
            <p><?php the_content(); ?></p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
