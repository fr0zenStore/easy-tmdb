// CSS and JS

function easy_tmdb_enqueue_scripts() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('main-style', get_stylesheet_uri());

    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('dark-mode', get_template_directory_uri() . '/assets/js/dark-mode.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'easy_tmdb_enqueue_scripts');

// Sidebar

function easy_tmdb_register_sidebar() {
    register_sidebar([
        'name' => 'Sidebar Principale',
        'id' => 'main_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ]);
}
add_action('widgets_init', 'easy_tmdb_register_sidebar');
