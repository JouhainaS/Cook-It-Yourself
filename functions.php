<?php
// Activer les fonctionnalités du thème
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

// Enregistrer les menus personnalisés
function register_custom_menus() {
    register_nav_menus([
        'primary_menu' => 'Menu Principal',
        'footer_menu'  => 'Menu Footer',
    ]);
}
add_action('after_setup_theme', 'register_custom_menus');

// Charger les styles et scripts
function styles_scripts() {
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css',
        [],
        '5.3.0-alpha1'
    );

    wp_enqueue_style(
        'style-css',
        get_template_directory_uri() . '/css/styles.css'
    );

    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.0-alpha1',
        true
    );

    wp_enqueue_script(
        'app-js',
        get_template_directory_uri() . '/assets/js/app.js',
        ['bootstrap-bundle'],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

// Ajouter un favicon
function add_favicon() {
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/icons/favicon.ico" type="image/x-icon">';
}
add_action('wp_head', 'add_favicon');

// Autoriser les uploads SVG
function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

// Créer le Custom Post Type "Recettes"
function create_post_type() {
    register_post_type('recipe', [
        'labels' => [
            'name' => __('Recettes', 'textdomain'),
            'singular_name' => __('Recette', 'textdomain'),
        ],
        'supports' => ['title', 'editor', 'thumbnail', 'comments'],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'recettes'],
        'menu_icon' => 'dashicons-carrot',
    ]);
}
add_action('init', 'create_post_type');

// Ajouter les taxonomies pour les recettes
function register_recipe_taxonomies() {
    $taxonomies = [
        'difficulte' => 'Difficulté',
        'type_de_repas' => 'Type de repas',
        'cuisine' => 'Cuisine',
        'budget' => 'Budget',
        'regime' => 'Régime alimentaire',
    ];

    foreach ($taxonomies as $slug => $label) {
        register_taxonomy($slug, 'recipe', [
            'labels' => [
                'name' => __($label, 'textdomain'),
                'singular_name' => __($label, 'textdomain'),
                'menu_name' => $label,
                'all_items' => __('Tous les ' . strtolower($label), 'textdomain'),
                'edit_item' => __('Modifier un ' . strtolower($label), 'textdomain'),
                'add_new_item' => __('Ajouter un nouveau ' . strtolower($label), 'textdomain'),
                'new_item_name' => __('Nouveau ' . strtolower($label), 'textdomain'),
                'search_items' => __('Rechercher un ' . strtolower($label), 'textdomain'),
            ],
            'hierarchical' => true,
            'public' => true,
            'rewrite' => ['slug' => $slug],
        ]);
    }
}
add_action('init', 'register_recipe_taxonomies');

// Ajouter des métadonnées aux recettes
function add_recipe_meta_box() {
    add_meta_box(
        'recipe_details',
        __('Détails de la recette', 'textdomain'),
        'recipe_meta_box_callback',
        'recipe',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_recipe_meta_box');

// Contenu des métadonnées
function recipe_meta_box_callback($post) {
    $prep_time = get_post_meta($post->ID, 'prep_time', true);
    $portions = get_post_meta($post->ID, 'portions', true);
    $difficulty = get_post_meta($post->ID, 'difficulty', true);

    echo '<label for="prep_time">' . __('Temps de préparation (minutes)', 'textdomain') . '</label>';
    echo '<input type="number" id="prep_time" name="prep_time" value="' . esc_attr($prep_time) . '" class="widefat">';

    echo '<label for="portions">' . __('Nombre de portions', 'textdomain') . '</label>';
    echo '<input type="number" id="portions" name="portions" value="' . esc_attr($portions) . '" class="widefat">';

    echo '<label for="difficulty">' . __('Difficulté', 'textdomain') . '</label>';
    echo '<select id="difficulty" name="difficulty" class="widefat">
            <option value="facile"' . selected($difficulty, 'facile', false) . '>Facile</option>
            <option value="moyen"' . selected($difficulty, 'moyen', false) . '>Moyen</option>
            <option value="difficile"' . selected($difficulty, 'difficile', false) . '>Difficile</option>
          </select>';
}

// Sauvegarde des métadonnées
function save_recipe_meta($post_id) {
    if (isset($_POST['prep_time'])) {
        update_post_meta($post_id, 'prep_time', sanitize_text_field($_POST['prep_time']));
    }
    if (isset($_POST['portions'])) {
        update_post_meta($post_id, 'portions', sanitize_text_field($_POST['portions']));
    }
    if (isset($_POST['difficulty'])) {
        update_post_meta($post_id, 'difficulty', sanitize_text_field($_POST['difficulty']));
    }
}
add_action('save_post', 'save_recipe_meta');
