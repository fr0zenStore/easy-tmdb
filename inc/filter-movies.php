<?php
// Genera l'elenco dei generi (categorie) per i film
function easy_tmdb_get_genres() {
    $genres = get_categories(['taxonomy' => 'category', 'hide_empty' => true]);
    return $genres;
}

// Recupera i valori unici degli anni
function easy_tmdb_get_years() {
    global $wpdb;
    $results = $wpdb->get_col("SELECT DISTINCT meta_value FROM {$wpdb->postmeta} WHERE meta_key = 'release_year' ORDER BY meta_value DESC");
    return $results;
}

// Funzione per visualizzare il filtro in Home
function easy_tmdb_filter_form() {
    $genres = easy_tmdb_get_genres();
    $years = easy_tmdb_get_years();
    ?>
    <form id="movie-filter" class="d-flex justify-content-center align-items-center gap-2 mb-4">
        <select name="genre" class="form-select w-auto">
            <option value="">Tutti i generi</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo esc_attr($genre->term_id); ?>"><?php echo esc_html($genre->name); ?></option>
            <?php endforeach; ?>
        </select>
        
        <select name="year" class="form-select w-auto">
            <option value="">Tutti gli anni</option>
            <?php foreach ($years as $year): ?>
                <option value="<?php echo esc_attr($year); ?>"><?php echo esc_html($year); ?></option>
            <?php endforeach; ?>
        </select>
        
        <select name="vote" class="form-select w-auto">
            <option value="">Tutti i voti</option>
            <?php for ($i = 10; $i >= 1; $i--): ?>
                <option value="<?php echo esc_attr($i); ?>"><?php echo esc_html($i); ?>+</option>
            <?php endfor; ?>
        </select>
        
        <button type="submit" class="btn btn-primary">Filtra</button>
    </form>

    <div id="movies-result" class="row row-cols-1 row-cols-md-5 g-4"></div>

    <script>
    jQuery(document).ready(function($) {
        $('#movie-filter').on('submit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                data: data + '&action=easy_tmdb_filter',
                method: 'GET',
                success: function(response) {
                    $('#movies-result').html(response);
                }
            });
        });
    });
    </script>
    <?php
}
add_shortcode('easy_tmdb_filter', 'easy_tmdb_filter_form');

// Gestione della richiesta AJAX
function easy_tmdb_filter_movies() {
    $genre = isset($_GET['genre']) ? intval($_GET['genre']) : '';
    $year = isset($_GET['year']) ? sanitize_text_field($_GET['year']) : '';
    $vote = isset($_GET['vote']) ? intval($_GET['vote']) : '';

    $args = [
        'post_type' => 'movie',
        'posts_per_page' => 20,
        'meta_query' => [],
        'tax_query' => [],
    ];

    if ($genre) {
        $args['tax_query'][] = [
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $genre,
        ];
    }

    if ($year) {
        $args['meta_query'][] = [
            'key' => 'release_year',
            'value' => $year,
            'compare' => '=',
        ];
    }

    if ($vote) {
        $args['meta_query'][] = [
            'key' => 'vote_average',
            'value' => $vote,
            'compare' => '>=',
            'type' => 'NUMERIC',
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
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
                        <p class="text-muted"><?php echo esc_html(get_post_meta(get_the_ID(), 'release_year', true)); ?> - 
                        Voto: <?php echo esc_html(get_post_meta(get_the_ID(), 'vote_average', true)); ?></p>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    else :
        echo '<p class="text-center">Nessun film trovato.</p>';
    endif;

    wp_reset_postdata();
    die();
}
add_action('wp_ajax_easy_tmdb_filter', 'easy_tmdb_filter_movies');
add_action('wp_ajax_nopriv_easy_tmdb_filter', 'easy_tmdb_filter_movies');
?>
