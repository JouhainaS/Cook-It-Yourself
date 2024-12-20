<?php
/** Template Name: Formulaire - Page */
get_header(); // Charge le header du site WordPress (fichier header.php)

// Si le formulaire a été soumis (méthode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et sécurisation des données du formulaire
    $titre_recette = htmlspecialchars($_POST['titre_recette']); // Récupère le titre de la recette
    $description = htmlspecialchars($_POST['description']); // Récupère la description de la recette
    $portions = htmlspecialchars($_POST['portions']); // Récupère le nombre de portions
    $preparation = htmlspecialchars($_POST['preparation']); // Temps de préparation (en heures)
    $cuisson = htmlspecialchars($_POST['cuisson']); // Temps de cuisson (en heures)
    $total = htmlspecialchars($_POST['total']); // Temps total
    $difficulte = htmlspecialchars($_POST['difficulte']); // Niveau de difficulté
    $ingredients = $_POST['ingredients']; // Liste des ingrédients (tableau)
    $instructions = $_POST['instructions']; // Liste des instructions (tableau)
    $tags = $_POST['tags']; // Tags de la recette (tableau)
    $photo = $_FILES['photo']; // Fichier image téléchargé

    // Gestion de l'upload de la photo
    if (!empty($photo['name'])) { // Si une image a été sélectionnée
        $upload_dir = wp_upload_dir(); // Obtient le répertoire d'upload de WordPress
        $upload_file = wp_handle_upload($photo, ['test_form' => false]); // Gère l'upload du fichier
        $photo_url = $upload_file['url']; // Récupère l'URL de l'image téléchargée
    }

    // Affichage des données soumises (pour test)
    echo "<h3>Votre recette a été soumise avec succès :</h3>";
    echo "Titre : $titre_recette <br>"; // Affiche le titre
    echo "Description : $description <br>"; // Affiche la description
    echo "Portions : $portions <br>"; // Affiche les portions
    echo "Difficulté : $difficulte <br>"; // Affiche la difficulté
    if (isset($photo_url)) echo "<img src='$photo_url' style='max-width:200px;'><br>"; // Affiche l'image téléchargée
    exit(); // Termine l'exécution du script
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!-- Définit l'encodage des caractères -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Rend la page responsive -->
    <title>Ajouter une recette</title> <!-- Titre de la page -->
    <style>
        /* Styles généraux pour le body */
        body {
            font-family: Arial, sans-serif; /* Police d'écriture */
            background-color: #f9f9f9; /* Couleur de fond */
            margin: 0; /* Supprime les marges par défaut */
            padding: 0;
            color: #333; /* Couleur du texte principal */
        }

        /* Conteneur principal */
        .container {
            max-width: 1200px; /* Largeur maximale pour les écrans PC */
            margin: 50px auto; /* Centre le conteneur horizontalement */
            background: white; /* Fond blanc */
            padding: 30px; /* Espacement intérieur */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre légère */
            border-radius: 10px; /* Coins arrondis */
        }

        /* Style du titre principal */
        h1 {
            text-align: center; /* Centre le titre */
            font-size: 32px; /* Taille de police */
            font-weight: bold; /* Gras */
            margin-bottom: 10px;
        }

        /* Description sous le titre */
        .description-header {
            text-align: center;
            margin-bottom: 30px;
            font-size: 16px;
            color: #555;
        }

        /* Style des étiquettes (labels) */
        label {
            font-weight: bold; /* Met le texte en gras */
            margin-top: 15px;
            display: block; /* Place chaque label sur une nouvelle ligne */
        }

        /* Style des champs de formulaire */
        input, textarea, select {
            width: 100%; /* Occupe toute la largeur */
            padding: 10px; /* Espacement intérieur */
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd; /* Bordure légère */
            border-radius: 5px; /* Coins arrondis */
            font-size: 14px; /* Taille de police */
            box-sizing: border-box; /* Inclut padding et bordure dans la largeur */
        }

        /* Boutons */
        button {
            background-color: #5cb85c; /* Couleur verte */
            color: white; /* Texte blanc */
            padding: 10px 20px;
            border: none; /* Supprime les bordures */
            cursor: pointer; /* Change le curseur */
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #4cae4c; /* Couleur plus sombre au survol */
        }

        /* Champs dynamiques (ingrédients) */
        .dynamic-section {
            margin-top: 10px;
        }

        .add-btn {
            display: inline-block;
            margin-top: 10px;
            color: #5bc0de;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .add-btn:hover {
            text-decoration: underline;
        }

        /* Zone pour l'upload de photo */
        .photo-upload {
            background-color: #f5f9f2;
            padding: 20px;
            text-align: center;
            border: 1px dashed #d4e3c4; /* Bordure pointillée */
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .photo-upload input {
            display: none; /* Cache le champ de fichier */
        }

        .photo-upload label {
            font-weight: normal;
            color: #5cb85c;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Ajouter une recette</h1>
    <p class="description-header">Tu te sens comme un chef étoilé ? Montre-nous ton chef-d'œuvre ! Ajoute ta recette et laisse éclater ta créativité culinaire.</p>

    <form method="POST" enctype="multipart/form-data">
        <!-- Zone de téléchargement d'image -->
        <div class="photo-upload">
            <label for="photo">+ Ajouter une photo</label>
            <input type="file" id="photo" name="photo" accept="image/*">
        </div>

        <!-- Titre de la recette -->
        <label for="titre_recette">Titre de la recette *</label>
        <input type="text" id="titre_recette" name="titre_recette" placeholder="Entrer le titre de la recette" required>

        <!-- Description -->
        <label for="description">Description *</label>
        <textarea id="description" name="description" rows="3" placeholder="Décrivez votre recette" required></textarea>

        <!-- Portions -->
        <label for="portions">Portions *</label>
        <input type="number" id="portions" name="portions" placeholder="e.g., 4" required>

        <!-- Bouton de soumission -->
        <button type="submit">Soumettre la recette</button>
    </form>
</div>

<script>
function ajouterIngredient() {
    const container = document.getElementById('ingredients_list');
    container.innerHTML += '<div><input type="text" name="ingredients[]" placeholder="Qté"><input type="text" name="ingredients[]" placeholder="Mesure"><input type="text" name="ingredients[]" placeholder="Elément"></div>';
}
</script>
</body>
<?php get_footer(); ?>
