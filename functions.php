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
    // CSS Bootstrap
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css',
        [],
        '5.3.0-alpha1' // Version Bootstrap
    );

    // Style personnalisé
    wp_enqueue_style(
        'style-css',
        get_template_directory_uri() . '/css/styles.css'
    );

    // JS Bootstrap
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.0-alpha1', // Version Bootstrap
        true // Charger dans le footer
    );

    // Script personnalisé principal
    wp_enqueue_script(
        'app-js',
        get_template_directory_uri() . '/assets/js/app.js',
        ['bootstrap-bundle'], // Dépendance avec Bootstrap
        '1.0', // Version du script
        true // Charger dans le footer
    );

    // Script additionnel si nécessaire
    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/assets/js/script.js',
        [],
        null, // Version inconnue
        true // Charger dans le footer
    );
}

add_action('wp_enqueue_scripts', 'styles_scripts');

// Ajouter un favicon
function add_favicon() {
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/icons/favicon.ico" type="image/x-icon" />';
}
add_action('wp_head', 'add_favicon');

// Filtrer l'éditeur d'images
add_filter('wp_image_editors', function() {
    return array('WP_Image_Editor_Imagick'); // Utiliser Imagick
    // return array('WP_Image_Editor_GD'); // Utiliser GD
});
?>

