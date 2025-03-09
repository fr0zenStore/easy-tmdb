<?php
function easy_tmdb_register_cpt() {
    register_post_type('movie', [
        'label' => 'Movies',
        'public' => true,
        'menu_icon' => 'dashicons-video-alt2',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'movies'],
    ]);

    register_post_type('series', [
        'label' => 'Series',
        'public' => true,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'series'],
    ]);
}
add_action('init', 'easy_tmdb_register_cpt');
?>
