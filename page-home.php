<?php 
/* Template Name: Home Page */
get_header(); 
?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php 
        $args = ['post_type' => ['movie', 'series'], 'posts_per_page' => 20];
        $query = new WP_Query($args);
        while ($query->have_posts()): $query->the_post();
            $year = get_post_meta(get_the_ID(), 'release_year', true);
            $vote = get_post_meta(get_the_ID(), 'vote_average', true);
        ?>
        <div class="col">
            <div class="card h-100">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                    </a>
                <?php endif; ?>
                <div class="card-body text-center">
                    <h6 class="card-title"><?php the_title(); ?></h6>
                    <p class="text-muted mb-0"><?= esc_html($year); ?> <span class="float-end"><?= esc_html($vote); ?></span></p>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>
