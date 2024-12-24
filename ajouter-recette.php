<?php
/** Template Name: ajouter-recette **/
get_header();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et sanitisation des données
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

<div class="form-container">
    <h1>Ajouter une recette</h1>
    <style scoped>
        
        .form-container {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;

        }
        .form-container h1 {
            text-align: center;
            color: #3A5676;
        }
        .form-container label {
            font-weight: semi-bold;
            margin-top: 15px;
            margin-bottom: 10px; /* Ajout d'espace entre le titre et le paragraphe explicatif */
            display: block;
            color: #000;
        }

        .form-container p {
            font-size: 0.9rem;
            color: #555;
            margin-top: 0;
            margin-bottom: 15px; /* Ajout d'espace en dessous du paragraphe explicatif */
        }

        .form-container input, .form-container select, .form-container textarea, .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        .form-container input:focus, .form-container select:focus, .form-container textarea:focus {
            outline: none;
            border-color: #A8BAA7;
        }
        .form-container button {
            background-color: #A8BAA7;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container button:hover {
            background-color: #A8BAA7;
        }
        .form-container .alert {
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .form-container .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .form-container .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-container .dynamic-field {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .form-container .dynamic-field input, .form-container .dynamic-field select {
            flex: 1;
        }
        .form-container .image-upload {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            background-color: #f4f8f6;
            border: 2px dashed #d1e7dd;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            color: #6c757d;
            font-size: 16px;
        }
        .form-container .image-upload:hover {
            background-color: #e9f5f0;
        }
        .form-container .image-upload input {
            display: none;
        }
        .form-container .image-upload-label {
            display: inline-block;
        }

        .ingredient-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        #ingredients-wrapper {
            margin-top: 10px;
        }


        .ingredient-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .ingredient-input.quantity {
            flex: 0.5; /* Pour que le champ Quantité soit plus petit */
        }

        .ingredient-input.measure {
            flex: 0.8; /* Taille intermédiaire pour la mesure */
        }

        .ingredient-input.element {
            flex: 1.7; /* Plus grand pour l'ingrédient */
        }

        button#add-step,
        button#add-ingredient {
            background-color: transparent; /* Supprime le fond */
            color: #A8BAA7; /* Couleur du texte */
            font-weight: bold; 
            font-size: 1rem; 
            cursor: pointer; 
            text-align: left; 
            padding: 0; 
            border: none; /* Supprime la bordure */
            box-shadow: none; /* Supprime les ombres éventuelles */
            outline: none; /* Supprime l'encadré lors du focus */
        }

        button#add-ingredient:hover,
        button#add-step:hover {
            text-decoration: underline; /* Ajout de soulignement sur hover */
        }

        button.cancel {
            background-color: white;
            color: #5692B2;
            border: 1px solid #5692B2;
            padding: 8px 16px;
            font-size: 0.9rem;
            border-radius: 30px; /* Ajout de l'arrondi */
            transition: all 0.3s ease;
        }

        button.cancel:hover {
            background-color: #F4F9FC;
            color: #407899;
        }

        button.submit {
            background-color: #5692B2;
            color: white;
            border: 1px solid #5692B2;
            padding: 8px 16px;
            font-size: 0.9rem;
            border-radius: 30px; /* Ajout de l'arrondi */
            transition: all 0.3s ease;
        }

        button.submit:hover {
            background-color: #407899;
            border-color: #407899;
        }

        div.cancelorsubmit {
            display: flex;
            gap: 10px;
            justify-content: flex-end; /* Aligne les boutons à droite */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        button.cancel, button.submit {
            width: 200px; /* Réduction de la largeur des boutons */
        }


        .items-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 10px 0 20px;
        }

        .items-list label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background-color: white;
            padding: 5px 10px;
            border-radius: 20px;
            border: 1px solid #A8BAA7;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .items-list label:hover {
            background-color: #EBF4E7;
            border-color: #A8BAA7;
        }

        .items-list input[type="checkbox"] {
            display: none;
        }

        .items-list input[type="checkbox"]:checked + span {
            font-weight: bold;
            color: #A8BAA7;
        }

        .items-list input[type="checkbox"]:checked + span::before {
            content: "✓ ";
            color: #A8BAA7;
            font-weight: bold;
        }

        .form-container input,
        .form-container select,
        .form-container textarea,
        button#add-ingredient,
        button#add-step {
            border-radius: 10px; 
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 1rem;
            margin-top: 5px;
            box-sizing: border-box;
            outline: none;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            outline: none;
            border-color: #A8BAA7;
        }

        

    </style>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?php echo esc_html($message); ?></div>
    <?php elseif (!empty($error)) : ?>
        <div class="alert alert-danger"><?php echo esc_html($error); ?></div>
    <?php endif; ?>

    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Titre de la recette *</label>
        <input type="text" name="title" placeholder="Entre le titre de ta recette"  id="title" required>

        <label for="description">Description *</label>
        <textarea name="description" placeholder="Décris ta recette de manière à faire saliver !" id="description" rows="4" required></textarea>

        <label for="image">Ajouter une photo *</label>

        <div class="image-upload">
            <label class="image-upload-label" for="image">
                <span>+ Ajouter une photo</span>
                <input type="file" name="image" id="image" accept="image/*" required>
            </label>
        </div>

        <label for="portions">Portions *</label>
        <input type="number" placeholder="Entre le titre de ta recette" name="portions" id="portions" required>

        <label for="prep_hours">Temps de Préparation *</label>
        <div class="dynamic-field">
            <input type="number" name="prep_hours" placeholder="Hrs" required>
            <input type="number" name="prep_minutes" placeholder="Mins" required>
        </div>

        <label for="cook_hours">Temps de Cuisson *</label>
        <div class="dynamic-field">
            <input type="number" name="cook_hours" placeholder="Hrs" required>
            <input type="number" name="cook_minutes" placeholder="Mins" required>
        </div>

        <label for="difficulty">Difficulté *</label>
        <select name="difficulty" required>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
        </select>

        <label for="ingredients">Ingrédients *</label>
        <p style="font-size: 0.9rem; color: #555; margin-top: -10px; margin-bottom: 10px;">
            Liste tes ingrédients un par un, en précisant les quantités (1, 2) et les mesures (tasses, cuillères). N’hésite pas à laisser libre cours à ta créativité et à donner des détails pour que ta recette soit encore plus claire et savoureuse !
        </p>
        <div id="ingredients-wrapper">
            <div class="ingredient-group">
                <input type="text" name="quantity[]" placeholder="Qté" class="ingredient-input quantity">
                <select name="measure[]" class="ingredient-input measure">
                    <option value="g">g</option>
                    <option value="kg">kg</option>
                    <option value="ml">ml</option>
                    <option value="l">l</option>
                    <option value="càc">càc</option>
                    <option value="càs">càs</option>
                    <option value="unité">unité</option>
                </select>
                <input type="text" name="ingredient[]" placeholder="Élément" class="ingredient-input element">
            </div>
        </div>
        <button type="button" id="add-ingredient">+ Ajouter un ingrédient</button>

        <label>Instructions *</label>
        <p style="font-size: 0.9rem; color: #555; margin-top: -10px; margin-bottom: 10px;">
            Décompose ta recette en instructions claires, étape par étape.
        </p>
        <div id="steps-wrapper">
            <textarea name="steps[]" placeholder="Étape 1"></textarea>
        </div>
        <button type="button" id="add-step">+ Ajouter une étape</button>


        <label for="tips">Tips</label>
        <textarea name="tips" placeholder="Partage tes secrets de cuisine ! Que ce soit des astuces pour un meilleur résultat au four, des substitutions d'ingrédients ou des conseils pratiques pour réussir ta recette à coup sûr. Toute info qui peut faire de ton plat un vrai succès est la bienvenue !" id="tips"></textarea>

        <div class="items-container">
            <label>Type de repas :</label>
            <div class="items-list">
                <label>
                    <input type="checkbox" name="type_de_repas[]" value="Petit déjeuner">
                    <span>Petit déjeuner</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_repas[]" value="Déjeuner">
                    <span>Déjeuner</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_repas[]" value="Dîner">
                    <span>Dîner</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_repas[]" value="Dessert">
                    <span>Dessert</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_repas[]" value="Boissons">
                    <span>Boissons</span>
                </label>
            </div>
        </div>

        <div class="items-container">
            <label>Type de cuisson :</label>
            <div class="items-list">
                <label>
                    <input type="checkbox" name="type_de_cuisson[]" value="Micro-ondes">
                    <span>Micro-ondes</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_cuisson[]" value="Four">
                    <span>Four</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_cuisson[]" value="Plaque de cuisson">
                    <span>Plaque de cuisson</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_cuisson[]" value="Sans cuisson">
                    <span>Sans cuisson</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_cuisson[]" value="Friteuse">
                    <span>Friteuse</span>
                </label>
                <label>
                    <input type="checkbox" name="type_de_cuisson[]" value="Grill">
                    <span>Grill</span>
                </label>
            </div>
        </div>


        <!-- Cuisine -->
        <label>Cuisine :</label>
        <div class="items-list">
            <label>
                <input type="checkbox" name="cuisine[]" value="Pakistanais">
                <span>Pakistanais</span>
            </label>
            <label>
                <input type="checkbox" name="cuisine[]" value="Italien">
                <span>Italien</span>
            </label>
            <label>
                <input type="checkbox" name="cuisine[]" value="Américain">
                <span>Américain</span>
            </label>
            <label>
                <input type="checkbox" name="cuisine[]" value="Méditerranéen">
                <span>Méditerranéen</span>
            </label>
            <label>
                <input type="checkbox" name="cuisine[]" value="Asiatique">
                <span>Asiatique</span>
            </label>
            <label>
                <input type="checkbox" name="cuisine[]" value="Orientale">
                <span>Orientale</span>
            </label>
        </div>

        <!-- Régime alimentaire -->
        <label>Régime alimentaire :</label>
        <div class="items-list">
            <label>
                <input type="checkbox" name="regime_alimentaire[]" value="Végétarien">
                <span>Végétarien</span>
            </label>
            <label>
                <input type="checkbox" name="regime_alimentaire[]" value="Vegan">
                <span>Vegan</span>
            </label>
            <label>
                <input type="checkbox" name="regime_alimentaire[]" value="Healthy">
                <span>Healthy</span>
            </label>
            <label>
                <input type="checkbox" name="regime_alimentaire[]" value="Sans sucre">
                <span>Sans sucre</span>
            </label>
            <label>
                <input type="checkbox" name="regime_alimentaire[]" value="Halal">
                <span>Halal</span>
            </label>
            <label>
                <input type="checkbox" name="regime_alimentaire[]" value="Casher">
                <span>Casher</span>
            </label>
        </div>

        <!-- Budget -->
        <label>Budget :</label>
        <div class="items-list">
            <label>
                <input type="checkbox" name="budget[]" value="0 - 5 €">
                <span>0 - 5 €</span>
            </label>
            <label>
                <input type="checkbox" name="budget[]" value="5 - 10 €">
                <span>5 - 10 €</span>
            </label>
            <label>
                <input type="checkbox" name="budget[]" value="10 - 15 €">
                <span>10 - 15 €</span>
            </label>
        </div>


        <div class=cancelorsubmit>
            <button type="button" class="cancel" onclick="window.location.href='<?php echo site_url('/'); ?>'">Annuler</button>
            <button type="submit" class="submit">Soumettre</button>
        </div>
    </form>

</div>

<script>
    document.getElementById('add-ingredient').addEventListener('click', function() {
        const wrapper = document.getElementById('ingredients-wrapper');
        const div = document.createElement('div');
        div.className = 'dynamic-field';
        div.innerHTML = `
            <input type="text" name="quantity[]" placeholder="Quantité">
            <select name="measure[]">
                <option value="g">g</option>
                <option value="kg">kg</option>
                <option value="ml">ml</option>
            </select>
            <input type="text" name="ingredient[]" placeholder="Ingrédient">
        `;
        wrapper.appendChild(div);
    });

    document.getElementById('add-step').addEventListener('click', function() {
        const wrapper = document.getElementById('steps-wrapper');
        const textarea = document.createElement('textarea');
        textarea.name = "steps[]";
        textarea.placeholder = `Étape ${wrapper.children.length + 1}`;
        wrapper.appendChild(textarea);
    });
</script>

<?php
get_footer();
?>