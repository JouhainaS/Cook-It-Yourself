<?php
// Activer les miniatures, le titre dynamique et les menus
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

// Enregistrer les menus personnalisés
function register_custom_menus() {
    register_nav_menus(
        array(
            'primary_menu' => 'Menu Principal',
            'footer_menu'  => 'Menu Footer'
        )
    );
}
add_action('after_setup_theme', 'register_custom_menus');

// Ajouter les styles et scripts
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

    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/assets/js/script.js',
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

// Ajouter un favicon
function add_favicon() {
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/icons/favicon.ico" type="image/x-icon" />';
}
add_action('wp_head', 'add_favicon');

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

// Filtrer l'éditeur d'images
add_filter('wp_image_editors', function() {
    return array('WP_Image_Editor_Imagick'); 
});

// Custom Post Type "Recettes"
function create_post_type() {
    register_post_type('recipe', [
        'labels' => [
            'name'          => __('Recettes', 'textdomain'),
            'singular_name' => __('Recette', 'textdomain'),
        ],
        'supports'     => ['title', 'editor', 'thumbnail', 'comments'],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'recettes'],
        'menu_icon'    => 'dashicons-carrot',
    ]);
}
add_action('init', 'create_post_type');

// Réinitialiser les permaliens après l'ajout d'un Custom Post Type
function rewrite_flush() {
    create_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'rewrite_flush');

// Ajout de taxonomies pour les recettes
function add_recipe_taxonomies() {
    register_taxonomy_for_object_type('category', 'recipe');

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
        'hierarchical' => true,
        'public' => true,
    ]);
}
add_action('init', 'add_recipe_taxonomies');

// Ajouter des métaboxes pour les recettes
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

// Contenu des métaboxes
function recipe_meta_box_callback($post) {
    $prep_time = get_post_meta($post->ID, 'prep_time', true);
    $portions = get_post_meta($post->ID, 'portions', true);
    $difficulty = get_post_meta($post->ID, 'difficulty', true);

    echo '<label for="prep_time">' . __('Temps de préparation (minutes)', 'textdomain') . '</label>';
    echo '<input type="number" id="prep_time" name="prep_time" value="' . esc_attr($prep_time) . '" class="widefat" />';

    echo '<label for="portions">' . __('Nombre de portions', 'textdomain') . '</label>';
    echo '<input type="number" id="portions" name="portions" value="' . esc_attr($portions) . '" class="widefat" />';

    echo '<label for="difficulty">' . __('Difficulté', 'textdomain') . '</label>';
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

// Gestion de l'inscription
function custom_registration_form_handler() {
    if (isset($_POST['register'])) {
        $username = sanitize_text_field($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $errors = [];

        if (username_exists($username)) {
            $errors[] = "Ce nom d'utilisateur existe déjà.";
        }
        if (email_exists($email)) {
            $errors[] = "Cet email est déjà utilisé.";
        }
        if (strlen($password) < 6) {
            $errors[] = "Le mot de passe doit comporter au moins 6 caractères.";
        }

        if (empty($errors)) {
            $user_id = wp_create_user($username, $password, $email);
            if (!is_wp_error($user_id)) {
                wp_signon([
                    'user_login' => $username,
                    'user_password' => $password,
                    'remember' => true,
                ]);
                $redirect_url = !empty($_POST['redirect_to']) ? esc_url_raw($_POST['redirect_to']) : home_url();
                wp_safe_redirect($redirect_url);
                exit;
            } else {
                $errors[] = $user_id->get_error_message();
            }
        }

        set_transient('registration_errors', $errors, 30);
    }
}
add_action('init', 'custom_registration_form_handler');

// Redirection après connexion
function custom_login_handler() {
    if (isset($_POST['login'])) {
        $creds = [
            'user_login'    => sanitize_text_field($_POST['username']),
            'user_password' => $_POST['password'],
            'remember'      => isset($_POST['remember']),
        ];

        $user = wp_signon($creds, false);

        if (!is_wp_error($user)) {
            $redirect_to = !empty($_POST['redirect_to']) ? esc_url_raw($_POST['redirect_to']) : home_url();
            wp_safe_redirect($redirect_to);
            exit;
        } else {
            echo '<p class="error-message">Nom d\'utilisateur ou mot de passe incorrect.</p>';
        }
    }
}
add_action('init', 'custom_login_handler');

// Restriction d'accès
add_action('template_redirect', function () {
    $restricted_pages = ['ajouter-une-recette-2', 'mes-publications', 'modifier-le-profil', 'parametre-du-compte'];
    if (!is_user_logged_in() && is_page($restricted_pages)) {
        $login_page_url = site_url('/connexion');
        $redirect_url = add_query_arg('redirect_to', urlencode(get_permalink()), $login_page_url);
        wp_safe_redirect($redirect_url);
        exit;
    }
});
wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', false);

function save_comment_rating($comment_id) {
    if (isset($_POST['rating']) && !empty($_POST['rating'])) {
        $rating = intval($_POST['rating']);
        if ($rating >= 1 && $rating <= 5) { // Vérifie que la note est entre 1 et 5
            add_comment_meta($comment_id, 'rating', $rating, true);
        }
    }
}
add_action('comment_post', 'save_comment_rating');

function allow_empty_comment_with_rating($commentdata) {
    if (empty($commentdata['comment_content']) && isset($_POST['rating'])) {
        // Génère un contenu par défaut pour éviter l'erreur
        $commentdata['comment_content'] = 'Évaluation : ' . intval($_POST['rating']) . ' étoile(s).';
    }
    return $commentdata;
}
add_filter('preprocess_comment', 'allow_empty_comment_with_rating');
