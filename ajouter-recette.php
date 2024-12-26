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
    $difficulty = sanitize_text_field($_POST['difficulty']);
    $ingredients = $_POST['ingredient'] ?? [];
    $quantities = $_POST['quantity'] ?? [];
    $measures = $_POST['measure'] ?? [];
    $steps = $_POST['steps'] ?? [];
    $tips = sanitize_textarea_field($_POST['tips']);
    $meal_types = $_POST['type_de_repas'] ?? [];
    $cook_types = $_POST['type_de_cuisson'] ?? [];
    $cuisines = $_POST['cuisine'] ?? [];
    $diets = $_POST['regime_alimentaire'] ?? [];
    $budgets = $_POST['budget'] ?? [];

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
        $post_id = wp_insert_post([
            'post_title' => $title,
            'post_content' => $description,
            'post_type' => 'recipe',
            'post_status' => 'publish',
        ]);

        if (!is_wp_error($post_id)) {
            if ($attachment_id) {
                set_post_thumbnail($post_id, $attachment_id);
            }

            // Enregistrement des métadonnées
            update_post_meta($post_id, 'portions', $portions);
            update_post_meta($post_id, 'prep_time', "$prep_hours:$prep_minutes");
            update_post_meta($post_id, 'cook_time', "$cook_hours:$cook_minutes");
            update_post_meta($post_id, 'difficulty', $difficulty);
            update_post_meta($post_id, 'tips', $tips);
            update_post_meta($post_id, 'meal_types', $meal_types);
            update_post_meta($post_id, 'cook_types', $cook_types);
            update_post_meta($post_id, 'cuisines', $cuisines);
            update_post_meta($post_id, 'diets', $diets);
            update_post_meta($post_id, 'budgets', $budgets);

            // Enregistrement des ingrédients
            $ingredients_data = [];
            foreach ($ingredients as $key => $ingredient) {
                $ingredients_data[] = [
                    'ingredient' => sanitize_text_field($ingredient),
                    'quantity' => sanitize_text_field($quantities[$key] ?? ''),
                    'measure' => sanitize_text_field($measures[$key] ?? ''),
                ];
            }
            update_post_meta($post_id, 'ingredients', $ingredients_data);

            // Enregistrement des étapes
            update_post_meta($post_id, 'steps', array_map('sanitize_textarea_field', $steps));

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
            margin-bottom: 10px;
            display: block;
            color: #000;
        }

        .form-container p {
            font-size: 0.9rem;
            color: #555;
            margin-top: 0;
            margin-bottom: 15px;
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
            background-color: #EBF4E7;
            border: 2px dashed #BBD6B0;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            color: #6c757d;
            font-size: 16px;
        }
        .form-container .image-upload:hover {
            background-color:rgb(219, 230, 215);
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
            flex: 0.5;
        }

        .ingredient-input.measure {
            flex: 0.8;
        }

        .ingredient-input.element {
            flex: 1.7;
        }

        button#add-step,
        button#add-ingredient {
            background-color: transparent;
            color: #A8BAA7;
            font-weight: bold; 
            font-size: 1rem; 
            cursor: pointer; 
            text-align: left; 
            padding: 0; 
            border: none;
            box-shadow: none;
            outline: none;
        }

        button#add-ingredient:hover,
        button#add-step:hover {
            text-decoration: underline;
        }


        button.cancel {
            background-color: white;
            color: #5692B2;
            border: 1px solid #5692B2;
            padding: 8px 16px;
            font-size: 0.9rem;
            border-radius: 30px;
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
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        button.submit:hover {
            background-color: #407899;
            border-color: #407899;
        }

        div.cancelorsubmit {
            display: flex;
            gap: 10px;
            justify-content: flex-end; 
            margin-top: 20px;
            margin-bottom: 20px;
        }

        button.cancel, button.submit {
            width: 200px; 
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
        <input type="text" name="title" placeholder="Entrez le titre" id="title" required>

        <label for="description">Description *</label>
        <textarea name="description" placeholder="Décrivez votre recette" id="description" rows="4" required></textarea>

        <label for="image">Ajouter une photo *</label>

        <div class="image-upload">
            <label class="image-upload-label" for="image">
                <span>+ Ajouter une photo</span>
                <input type="file" name="image" id="image" accept="image/*" required>
            </label>
        </div>

        <label for="prep_time">Temps de préparation *</label>
        <div class="dynamic-field">
            <input type="number" name="prep_hours" placeholder="Heures" required>
            <input type="number" name="prep_minutes" placeholder="Minutes" required>
        </div>

        <label for="cook_time">Temps de cuisson *</label>
        <div class="dynamic-field">
            <input type="number" name="cook_hours" placeholder="Heures" required>
            <input type="number" name="cook_minutes" placeholder="Minutes" required>
        </div>

        <label for="cook_time">Portions *</label>
        <div class="dynamic-field">
            <input type="number" name="portions" placeholder=" personnes" required>
        </div>

        <label for="difficulty">Difficulté *</label>
        <select name="difficulty" id="difficulty" required>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
        </select>

        <label for="ingredients">Ingrédients *</label>
        <div id="ingredients-wrapper">
            <div class="ingredient-group">
                <input type="text" name="quantity[]" placeholder="Quantité">
                <select name="measure[]">
                    <option value="g">g</option>
                    <option value="kg">kg</option>
                    <option value="ml">ml</option>
                    <option value="l">l</option>
                    <option value="càc">càc</option>
                    <option value="càs">càs</option>
                    <option value="unité">unité</option>
                </select>
                <input type="text" name="ingredient[]" placeholder="Ingrédient">
            </div>
        </div>
        <button type="button" id="add-ingredient">+ Ajouter un ingrédient</button>

        <label for="steps">Instructions *</label>
        <div id="steps-wrapper">
            <textarea name="steps[]" placeholder="Étape 1"></textarea>
        </div>
        <button type="button" id="add-step">+ Ajouter une étape</button>

        <label for="tips">Astuces du chef</label>
        <textarea name="tips" placeholder="Vos conseils" id="tips"></textarea>

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
    document.getElementById('add-ingredient').addEventListener('click', function () {
        const wrapper = document.getElementById('ingredients-wrapper');
        const div = document.createElement('div');
        div.className = 'ingredient-group';
        div.innerHTML = `
            <input type="text" name="quantity[]" placeholder="Quantité">
            <select name="measure[]">
                <option value="g">g</option>
                <option value="kg">kg</option>
                <option value="ml">ml</option>
                <option value="l">l</option>
                <option value="càc">càc</option>
                <option value="càs">càs</option>
                <option value="unité">unité</option>
            </select>
            <input type="text" name="ingredient[]" placeholder="Ingrédient">
        `;
        wrapper.appendChild(div);
    });

    document.getElementById('add-step').addEventListener('click', function () {
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
