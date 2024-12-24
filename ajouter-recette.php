<?php
/** Template Name: AjouterRecette - Page */
get_header();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize_text_field($_POST['title']);
    $description = sanitize_textarea_field($_POST['description']);
    $portions = sanitize_text_field($_POST['portions']);
    $prep_hours = sanitize_text_field($_POST['prep_hours']);
    $prep_minutes = sanitize_text_field($_POST['prep_minutes']);
    $cook_hours = sanitize_text_field($_POST['cook_hours']);
    $cook_minutes = sanitize_text_field($_POST['cook_minutes']);
    $cook_style = sanitize_text_field($_POST['cook_style']);
    $total_hours = sanitize_text_field($_POST['total_hours']);
    $total_minutes = sanitize_text_field($_POST['total_minutes']);
    $temperature = sanitize_text_field($_POST['temperature']);
    $difficulty = sanitize_text_field($_POST['difficulty']);
    $ingredients = $_POST['ingredient'] ?? [];
    $quantities = $_POST['quantity'] ?? [];
    $measures = $_POST['measure'] ?? [];
    $steps = $_POST['steps'] ?? [];
    $tips = sanitize_textarea_field($_POST['tips']);
    $meal_type = sanitize_text_field($_POST['meal_type']);
    $cook_type = sanitize_text_field($_POST['cook_type']);
    $cuisine_type = sanitize_text_field($_POST['cuisine_type']);
    $allergies = isset($_POST['allergies']) ? implode(', ', $_POST['allergies']) : '';
    $diet_type = sanitize_text_field($_POST['diet_type']);
    $budget = sanitize_text_field($_POST['budget']);

    // Gestion de l'image
    $attachment_id = null;
    if (!empty($_FILES['image']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $uploaded_file = wp_handle_upload($_FILES['image'], ['test_form' => false]);

        if (isset($uploaded_file['file'])) {
            $file_type = wp_check_filetype($uploaded_file['file']);
            $attachment = [
                'post_mime_type' => $file_type['type'],
                'post_title' => sanitize_file_name($_FILES['image']['name']),
                'post_content' => '',
                'post_status' => 'inherit',
            ];
            $attachment_id = wp_insert_attachment($attachment, $uploaded_file['file']);
            $attachment_data = wp_generate_attachment_metadata($attachment_id, $uploaded_file['file']);
            wp_update_attachment_metadata($attachment_id, $attachment_data);
        }
    }

    if (!empty($title) && !empty($description)) {
        // Préparer les données des ingrédients et étapes
        $ingredients_data = '';
        foreach ($ingredients as $key => $ingredient) {
            $quantity = $quantities[$key] ?? '';
            $measure = $measures[$key] ?? '';
            $ingredients_data .= "$quantity $measure $ingredient\n";
        }

        $steps_data = '';
        foreach ($steps as $key => $step) {
            $steps_data .= "Étape " . ($key + 1) . ": $step\n";
        }

        // Stocker toutes les données comme contenu
        $post_content = "
            <strong>Description:</strong> $description <br>
            <strong>Portions:</strong> $portions <br>
            <strong>Temps de Préparation:</strong> $prep_hours h $prep_minutes min <br>
            <strong>Temps de Cuisson:</strong> $cook_hours h $cook_minutes min ($cook_style) <br>
            <strong>Temps Total:</strong> $total_hours h $total_minutes min <br>
            <strong>Température:</strong> $temperature °C <br>
            <strong>Difficulté:</strong> $difficulty <br>
            <strong>Ingrédients:</strong><pre>$ingredients_data</pre><br>
            <strong>Étapes:</strong><pre>$steps_data</pre><br>
            <strong>Tips:</strong> $tips <br>
            <strong>Type de repas:</strong> $meal_type <br>
            <strong>Type de cuisson:</strong> $cook_type <br>
            <strong>Type de cuisine:</strong> $cuisine_type <br>
            <strong>Allergies:</strong> $allergies <br>
            <strong>Régime Alimentaire:</strong> $diet_type <br>
            <strong>Budget:</strong> $budget
        ";

        $post_id = wp_insert_post([
            'post_title' => $title,
            'post_content' => $post_content,
            'post_type' => 'recipe',
            'post_status' => 'publish',
        ]);

        if (!is_wp_error($post_id)) {
            if ($attachment_id) {
                set_post_thumbnail($post_id, $attachment_id);
            }
            $message = "Recette ajoutée avec succès !";
        } else {
            $error = "Erreur lors de l'ajout de la recette.";
        }
    } else {
        $error = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>

<div class="container">
    <h1>Ajouter une recette</h1>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?= esc_html($message); ?></div>
    <?php elseif (!empty($error)) : ?>
        <div class="alert alert-danger"><?= esc_html($error); ?></div>
    <?php endif; ?>

    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Titre de la recette</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>

        <label for="image">Image</label>
        <input type="file" name="image" accept="image/*" required>

        <!-- Ajoute les autres champs ici comme portions, temps, ingrédients, etc. -->
        <button type="submit">Ajouter la recette</button>
    </form>
</div>

<?php
get_footer();
?>