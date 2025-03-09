<?php
function easy_tmdb_customizer_settings($wp_customize) {
    $wp_customize->add_section('easy_tmdb_general', [
        'title' => 'Impostazioni Generali',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('easy_tmdb_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'easy_tmdb_logo', [
        'label' => 'Logo',
        'section' => 'easy_tmdb_general',
        'settings' => 'easy_tmdb_logo',
    ]));
}
add_action('customize_register', 'easy_tmdb_customizer_settings');
