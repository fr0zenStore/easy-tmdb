<?php
// Imposta il tema e abilita il supporto per immagini in evidenza
function easy_tmdb_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'easy_tmdb_setup');

// Carica gli asset CSS e JS
function easy_tmdb_enqueue_scripts() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    // Stile principale del tema
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');
    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);
    // Dark mode script
    wp_enqueue_script('dark-mode', get_template_directory_uri() . '/assets/js/dark-mode.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'easy_tmdb_enqueue_scripts');

// Registra la sidebar
function easy_tmdb_register_sidebar() {
    register_sidebar([
        'name'          => 'Sidebar Principale',
        'id'            => 'main_sidebar',
        'before_widget' => '<div class="widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'easy_tmdb_register_sidebar');

// Ottimizzazione del tema (rimuove elementi inutili dall'head)
function easy_tmdb_optimize_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'easy_tmdb_optimize_head');

// Crea il menu di navigazione
function easy_tmdb_register_nav_menus() {
    register_nav_menus([
        'primary' => __('Menu Principale', 'easy-tmdb'),
    ]);
}
add_action('after_setup_theme', 'easy_tmdb_register_nav_menus');

// Includi i file necessari
require_once get_template_directory() . '/inc/custom-post-types.php';  // Custom Post Types (Movies e Series)
require_once get_template_directory() . '/inc/theme-options.php';     // Opzioni del Tema
require_once get_template_directory() . '/inc/tmdb-import.php';       // Importazione TMDb
require_once get_template_directory() . '/inc/filter-movies.php';     // Filtri Avanzati
require_once get_template_directory() . '/inc/filter-widget.php';     // Widget del Filtro

// Abilita i widget del filtro
function register_easy_tmdb_filter_widget() {
    register_widget('Easy_TMDB_Filter_Widget');
}
add_action('widgets_init', 'register_easy_tmdb_filter_widget');

// Shortcode per visualizzare il filtro sulla home
function easy_tmdb_filter_shortcode() {
    ob_start();
    easy_tmdb_filter_form();
    return ob_get_clean();
}
add_shortcode('easy_tmdb_filter', 'easy_tmdb_filter_shortcode');
?>
