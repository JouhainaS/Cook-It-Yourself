<?php
// Support des fonctionnalités du thème
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

// Enregistrement des menus
register_nav_menu('header', 'En tête du menu');

// Enregistrer les styles et scripts
function styles_scripts() {
    // Charger Bootstrap uniquement sur les pages liées aux recettes
    if (is_singular('recipe') || is_post_type_archive('recipe')) {
        wp_enqueue_style(
            'bootstrap',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
        );
        wp_enqueue_script(
            'bootstrap-bundle',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
            [],
            '5.3.3',
            true
        );
    }

    // Charger le style principal pour toutes les pages
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/assets/css/app.css'
    );

    // Charger le script JS principal
    wp_enqueue_script(
        'app-js',
        get_template_directory_uri() . '/assets/js/app.js',
        [],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

// Enregistrer le Custom Post Type "recipe"
function create_post_type_recipe() {
    register_post_type('recipe', [
        'labels' => [
            'name' => __('Recettes', 'textdomain'),
            'singular_name' => __('Recette', 'textdomain'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'recettes'],
        'supports' => ['title', 'editor', 'thumbnail', 'author', 'custom-fields'],
        'menu_icon' => 'dashicons-carrot', // Icône personnalisée
    ]);
}
add_action('init', 'create_post_type_recipe');

// Réinitialiser les permaliens après ajout du Custom Post Type
function flush_rewrite_rules_recipe() {
    create_post_type_recipe();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_recipe');

// Ajout de taxonomies pour les recettes
function add_recipe_taxonomies() {
    // Ajouter une taxonomy "Types de Cuisine"
    register_taxonomy('cuisine_type', 'recipe', [
        'labels' => [
            'name' => __('Types de Cuisine', 'textdomain'),
            'singular_name' => __('Type de Cuisine', 'textdomain'),
            'search_items' => __('Rechercher un type de cuisine', 'textdomain'),
            'all_items' => __('Tous les types de cuisine', 'textdomain'),
            'edit_item' => __('Modifier un type de cuisine', 'textdomain'),
            'update_item' => __('Mettre à jour un type de cuisine', 'textdomain'),
            'add_new_item' => __('Ajouter un nouveau type de cuisine', 'textdomain'),
            'new_item_name' => __('Nouveau type de cuisine', 'textdomain'),
            'menu_name' => __('Types de Cuisine', 'textdomain'),
        ],
        'hierarchical' => true, // Définit une hiérarchie comme les catégories
        'public' => true,
    ]);
}
add_action('init', 'add_recipe_taxonomies');

// Ajouter des métaboxes pour les recettes
function add_recipe_meta_box() {
    add_meta_box(
        'recipe_meta_box',
        __('Détails de la recette', 'textdomain'),
        'recipe_meta_box_callback',
        'recipe',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_recipe_meta_box');

// Contenu des métaboxes
function recipe_meta_box_callback($post) {
    // Champs personnalisés (récupération des valeurs existantes)
    $prep_time = get_post_meta($post->ID, 'prep_time', true);
    $portions = get_post_meta($post->ID, 'portions', true);
    $difficulty = get_post_meta($post->ID, 'difficulty', true);

    echo '<label for="prep_time">Temps de préparation (minutes)</label>';
    echo '<input type="number" id="prep_time" name="prep_time" value="' . esc_attr($prep_time) . '" class="widefat" />';

    echo '<label for="portions">Nombre de portions</label>';
    echo '<input type="number" id="portions" name="portions" value="' . esc_attr($portions) . '" class="widefat" />';

    echo '<label for="difficulty">Difficulté</label>';
    echo '<select id="difficulty" name="difficulty" class="widefat">
            <option value="facile"' . selected($difficulty, 'facile', false) . '>Facile</option>
            <option value="moyen"' . selected($difficulty, 'moyen', false) . '>Moyen</option>
            <option value="difficile"' . selected($difficulty, 'difficile', false) . '>Difficile</option>
          </select>';
}

// Sauvegarder les métadonnées des recettes
function save_recipe_meta($post_id) {
    if (array_key_exists('prep_time', $_POST)) {
        update_post_meta($post_id, 'prep_time', sanitize_text_field($_POST['prep_time']));
    }
    if (array_key_exists('portions', $_POST)) {
        update_post_meta($post_id, 'portions', sanitize_text_field($_POST['portions']));
    }
    if (array_key_exists('difficulty', $_POST)) {
        update_post_meta($post_id, 'difficulty', sanitize_text_field($_POST['difficulty']));
    }
}
add_action('save_post', 'save_recipe_meta');

// Assurez-vous que seules les recettes apparaissent dans l'archive
function filter_recipe_archive($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('recipe')) {
        $query->set('post_type', 'recipe');
    }
}
add_action('pre_get_posts', 'filter_recipe_archive');
