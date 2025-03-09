<?php
class Easy_TMDB_Filter_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'easy_tmdb_filter_widget',
            'Filtro Film Easy TMDB',
            ['description' => 'Filtro film per voto, anno e genere']
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo '<h3>Filtra Film</h3>';
        echo do_shortcode('[easy_tmdb_filter]');
        echo $args['after_widget'];
    }
}

function register_easy_tmdb_filter_widget() {
    register_widget('Easy_TMDB_Filter_Widget');
}
add_action('widgets_init', 'register_easy_tmdb_filter_widget');
?>
