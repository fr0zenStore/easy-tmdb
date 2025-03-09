function easy_tmdb_import($tmdb_id, $type = 'movie') {
    $api_key = 'TUO_API_KEY';
    $url = "https://api.themoviedb.org/3/$type/$tmdb_id?api_key=$api_key&language=it-IT";

    $response = wp_remote_get($url);
    if (is_wp_error($response)) return false;

    $data = json_decode(wp_remote_retrieve_body($response), true);
    if (!$data) return false;

    $post_id = wp_insert_post([
        'post_title'  => $data['title'] ?? $data['name'],
        'post_content' => $data['overview'],
        'post_status' => 'publish',
        'post_type' => ($type === 'movie' ? 'movie' : 'series'),
    ]);

    if ($post_id) {
        update_post_meta($post_id, 'release_year', substr($data['release_date'] ?? $data['first_air_date'], 0, 4));
        update_post_meta($post_id, 'vote_average', $data['vote_average']);
        update_post_meta($post_id, 'tmdb_id', $tmdb_id);

        if (!empty($data['poster_path'])) {
            $poster_url = "https://image.tmdb.org/t/p/w500" . $data['poster_path'];
            $image_id = media_sideload_image($poster_url, $post_id, null, 'id');
            if ($image_id) set_post_thumbnail($post_id, $image_id);
        }
    }

    return $post_id;
}
