<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menu('header', 'En tête du menu');

function styles_scripts()
{
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/assets/css/app.css'
  );

  wp_enqueue_script(
    'bootstrap-bundle',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    false,
    1,
    true
  );
  wp_enqueue_script(
    'app-js',
    get_template_directory_uri() . '/assets/js/app.js',
    ['bootstrap-bundle'],
    1,
    true
  );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

// CUSTOM POSTS TYPES
function create_post_type()
{
  register_post_type('faqs', [
    'labels' => ['name' => 'FAQs'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'faqs']
  ]);
  register_post_type('services', [
    'labels' => ['name' => 'Services'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'services']
  ]);
}
add_action('init', 'create_post_type');

// MENUS
function menuheader_class($classes)
{
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'menuheader_class');

function menuheader_link_class($attributes)
{
  $attributes['class'] = 'nav-link';
  return $attributes;
}
add_filter('nav_menu_link_attributes', 'menuheader_link_class');

// FONCTION POUR AJOUTER DES LIEUX
function ajouter_lieu_wordpress($nom, $adresse, $description, $rating, $items) {
    $contenu = "<strong>Adresse :</strong> $adresse<br>";
    $contenu .= "<strong>Description :</strong> $description<br>";
    $contenu .= "<strong>Note :</strong> $rating/5<br>";
    $contenu .= "<strong>Items :</strong> $items";

    $post_data = array(
        'post_title'   => wp_strip_all_tags($nom),
        'post_content' => $contenu,
        'post_status'  => 'publish',
        'post_type'    => 'post',
    );
    
    $post_id = wp_insert_post($post_data);
    if (!is_wp_error($post_id)) {
        return true;
    } else {
        error_log("Erreur d'insertion : " . $post_id->get_error_message());
        return false;
    }
}

// SHORTCODE POUR AFFICHER LE FORMULAIRE
function afficher_formulaire_lieu() {
    ob_start();
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nom">Nom *</label>
        <input type="text" id="nom" name="nom" placeholder="Entrer le nom du lieu" required><br>

        <label for="adresse">Adresse *</label>
        <input type="text" id="adresse" name="adresse" placeholder="Entrer l'adresse du lieu" required><br>

        <label for="description">Description *</label>
        <textarea id="description" name="description" rows="4" required></textarea><br>

        <label>Items :</label><br>
        <label><input type="checkbox" name="items[]" value="Wifi"> Wifi</label><br>
        <label><input type="checkbox" name="items[]" value="Prise"> Prise</label><br>
        <label><input type="checkbox" name="items[]" value="PC"> PC</label><br>

        <label for="rating">Note :</label>
        <input type="number" id="rating" name="rating" min="1" max="5" value="3"><br><br>

        <button type="submit">Ajouter le lieu</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = sanitize_text_field($_POST['nom']);
        $adresse = sanitize_text_field($_POST['adresse']);
        $description = sanitize_textarea_field($_POST['description']);
        $rating = intval($_POST['rating']);
        $items = isset($_POST['items']) ? implode(', ', $_POST['items']) : 'Aucun';

        if (ajouter_lieu_wordpress($nom, $adresse, $description, $rating, $items)) {
            echo "<p style='color:green;'>Le lieu a été ajouté avec succès !</p>";
        } else {
            echo "<p style='color:red;'>Une erreur est survenue lors de l'ajout du lieu.</p>";
        }
    }

    return ob_get_clean();
}
add_shortcode('formulaire_lieu', 'afficher_formulaire_lieu');
