function easy_tmdb_register_cpt() {
    // Movies
    register_post_type('movie', array(
        'label' => 'Movies',
        'public' => true,
        'menu_icon' => 'dashicons-video-alt2',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'movies'],
        'taxonomies' => ['category', 'post_tag'],
    ));

    // Series
    register_post_type('series', array(
        'label' => 'Series',
        'public' => true,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'series'],
        'taxonomies' => ['category', 'post_tag'],
    ));
}
add_action('init', 'easy_tmdb_register_cpt');
