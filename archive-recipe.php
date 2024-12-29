<?php
/** Template Name: Nos recettes - Page */
get_header();
?>

<style>
.nos-recettes-page body {
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

.nos-recettes-page h1 {
    text-align: center; 
    font-size: 2.5rem; 
    margin-bottom: 20px;
    color: #3A5676;
}

.nos-recettes-page .content-wrapper {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.nos-recettes-page .filter-sidebar {
    width: 25%;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}

.nos-recettes-page .filters h4 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: #000;
}

.nos-recettes-page .filter-section {
    margin-bottom: 20px;
}

.nos-recettes-page .filter-section h5 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    color: #000;
}

.nos-recettes-page .filter-options {
    max-height: 100px;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.nos-recettes-page .filter-options.expanded {
    max-height: 500px;
}

.nos-recettes-page .show-more {
    font-size: 0.9rem;
    color: #5692B2;
    cursor: pointer;
    margin-top: 10px;
    display: inline-block;
}

.nos-recettes-page .filter-section input[type="checkbox"] {
    margin-right: 8px;
    accent-color: #A8BAA7;
}

.nos-recettes-page label {
    font-size: 0.9rem;
    color: #000;
}

.nos-recettes-page .grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.nos-recettes-page .card {
    border: none;
    width: 260px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.nos-recettes-page .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.nos-recettes-page .card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.nos-recettes-page .card-body {
    padding: 15px;
}

.nos-recettes-page .card-body p {
    margin-bottom: 5px;
    font-size: 0.9rem;
    line-height: 1.4;
}

.nos-recettes-page .card-body p:last-child {
    margin-bottom: 0;
}

.nos-recettes-page .card-title {
    font-size: 1.3rem;
    color: #3A5676;
    text-decoration: none;
    transition: color 0.3s ease, text-decoration 0.3s ease;
}

.nos-recettes-page .card-title a {
    text-decoration: none;
    color: inherit;
}

.nos-recettes-page .card-title a:hover {
    color: #5692B2;
    text-decoration: underline;
}

.nos-recettes-page .rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.nos-recettes-page .rating .star {
    font-size: 1.2rem;
    color: #A8BAA7;
}

.nos-recettes-page .rating .star.text-muted {
    color: #ddd;
}

.nos-recettes-page .rating .rating-value {
    font-size: 0.9rem;
    color: #333;
    margin-left: 5px;
}

.nos-recettes-page .filter-toggle-btn {
    display: none;
    background-color: #5692B2;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 20px;
    font-size: 1rem;
    margin: 10px auto;
    cursor: pointer;
    width: 90%;
}

.nos-recettes-page .filter-overlay {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    height: 100%;
    width: 66.6%;
    background-color: white;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
    z-index: 9999;
    padding: 20px;
}

.nos-recettes-page .filter-overlay.active {
    display: block;
}

.nos-recettes-page .close-btn {
    font-size: 1.5rem;
    color: #333;
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .nos-recettes-page .content-wrapper {
        flex-direction: column;
    }

    .nos-recettes-page .filter-sidebar {
        display: none;
    }

    .nos-recettes-page .filter-toggle-btn {
        display: block;
    }

    .nos-recettes-page .grid-container {
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .nos-recettes-page .grid-container .card {
        width: 90%;
        max-width: 400px;
    }
}

</style>
<div class="nos-recettes-page">
    <div class="container">
        <div class="row">
            <button class="filter-toggle-btn" id="filterToggleBtn">Afficher les filtres </button>

            <div class="filter-overlay" id="filterOverlay">
                <button class="close-btn" id="closeFilters">&times;</button>
                <div class="filters">
                    <h4>Filtrer par</h4>
                    <?php
                    $filter_data = [
                        'Difficulté' => [
                            'Facile' => 'facile',
                            'Moyen' => 'moyen',
                            'Difficile' => 'difficile',
                        ],
                        'Type de repas' => [
                            'Petit déjeuner' => 'petit-dejeuner',
                            'Déjeuner' => 'dejeuner',
                            'Dîner' => 'diner',
                            'Dessert' => 'dessert',
                            'Boissons' => 'boissons',
                        ],
                        'Type de cuisson' => [
                            'Micro-ondes' => 'micro-ondes',
                            'Four' => 'four',
                            'Plaque de cuisson' => 'plaque-de-cuisson',
                            'Sans cuisson' => 'sans-cuisson',
                            'Friteuse' => 'friteuse',
                            'Grill' => 'grill',
                        ],
                        'Cuisine' => [
                            'Pakistanais' => 'pakistanais',
                            'Italien' => 'italien',
                            'Américain' => 'americain',
                            'Méditerranéen' => 'mediterraneen',
                            'Asiatique' => 'asiatique',
                            'Orientale' => 'orientale',
                        ],
                        'Régime alimentaire' => [
                            'Végétarien' => 'vegetarien',
                            'Vegan' => 'vegan',
                            'Healthy' => 'healthy',
                            'Sans sucre' => 'sans-sucre',
                            'Halal' => 'halal',
                            'Casher' => 'casher',
                        ],
                        'Budget' => [
                            '0 - 5 €' => '0-5€',
                            '5 - 10 €' => '5-10€',
                            '10 - 15 €' => '10-15€',
                        ],
                        'Ingrédients' => [
                            'Poulet' => 'poulet',
                            'Poisson' => 'poisson',
                            'Boeuf' => 'boeuf',
                            'Riz' => 'riz',
                            'Pommes de terre' => 'pommes-de-terre',
                            'Carottes' => 'carottes',
                            'Tomates' => 'tomates',
                            'Oignons' => 'oignons',
                        ],
                    ];

                    foreach ($filter_data as $section_title => $options) : ?>
                        <div class="filter-section">
                            <h5><?php echo $section_title; ?> :</h5>
                            <div class="filter-options">
                                <?php $i = 0; ?>
                                <?php foreach ($options as $label => $value) : ?>
                                    <?php $i++; ?>
                                    <div class="<?php echo $i > 3 ? 'hidden-option' : ''; ?>">
                                        <input type="checkbox" name="<?php echo strtolower($section_title); ?>[]" value="<?php echo $value; ?>">
                                        <label><?php echo $label; ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if ($i > 3) : ?>
                                <span class="show-more">Afficher plus</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="content-wrapper">
                <div class="filter-sidebar d-none d-md-block">
                    <div class="filters">
                        <h4>Filtrer par</h4>
                        <?php foreach ($filter_data as $section_title => $options) : ?>
                            <div class="filter-section">
                                <h5><?php echo $section_title; ?> :</h5>
                                <div class="filter-options">
                                    <?php $i = 0; ?>
                                    <?php foreach ($options as $label => $value) : ?>
                                        <?php $i++; ?>
                                        <div class="<?php echo $i > 3 ? 'hidden-option' : ''; ?>">
                                            <input type="checkbox" name="<?php echo strtolower($section_title); ?>[]" value="<?php echo $value; ?>">
                                            <label><?php echo $label; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if ($i > 3) : ?>
                                    <span class="show-more">Afficher plus</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-md-9">
                <h1 class="mb-4">Nos Recettes</h1>
                <div class="grid-container">
                    <?php
                    global $wpdb;

                    // Requête pour récupérer toutes les recettes avec leurs métadonnées
                    $query = "
                        SELECT p.ID, p.post_title, p.post_author, AVG(meta.meta_value) AS average_rating
                        FROM {$wpdb->posts} p
                        LEFT JOIN {$wpdb->comments} c ON p.ID = c.comment_post_ID
                        LEFT JOIN {$wpdb->commentmeta} meta ON c.comment_ID = meta.comment_id
                        WHERE p.post_type = 'recipe'
                        AND p.post_status = 'publish'
                        AND (meta.meta_key = 'rating' OR meta.meta_key IS NULL)
                        GROUP BY p.ID
                        ORDER BY p.post_date DESC
                    ";

                    $recipes = $wpdb->get_results($query);

                    if (!empty($recipes)) :
                        foreach ($recipes as $recipe) : 
                            // Récupérer le temps de préparation et de cuisson
                            $prep_time = get_post_meta($recipe->ID, 'prep_time', true);
                            $cook_time = get_post_meta($recipe->ID, 'cook_time', true);

                            // Calculer le temps total en minutes
                            $prep_minutes = !empty($prep_time) ? explode(':', $prep_time) : [0, 0];
                            $cook_minutes = !empty($cook_time) ? explode(':', $cook_time) : [0, 0];
                            $total_minutes = ($prep_minutes[0] * 60 + $prep_minutes[1]) + ($cook_minutes[0] * 60 + $cook_minutes[1]);

                            // Récupérer le nom de l'auteur
                            $author_name = get_the_author_meta('display_name', $recipe->post_author);
                            $average_rating = round($recipe->average_rating, 1);
                    ?>
                        <div class="card">
                            <?php if (has_post_thumbnail($recipe->ID)) : ?>
                                <?php echo get_the_post_thumbnail($recipe->ID, 'medium', ['class' => 'card-img-top']); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/default.jpg" alt="Image par défaut" class="card-img-top">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php echo get_permalink($recipe->ID); ?>">
                                        <?php echo esc_html($recipe->post_title); ?>
                                    </a>
                                </h5>
                                <p class="card-text">
                                    <strong>Par :</strong> <?php echo esc_html($author_name); ?>
                                </p>
                                <p class="card-text">
                                    <strong>Temps total :</strong> <?php echo $total_minutes ? $total_minutes . ' min' : 'Non spécifié'; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Note :</strong>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <span class="star<?php echo $i <= $average_rating ? '' : ' text-muted'; ?>">&#9733;</span>
                                        <?php endfor; ?>
                                        <span class="rating-value">(<?php echo $average_rating; ?>)</span>
                                    </div>
                                </p>
                            </div>
                        </div>

                    <?php 
                        endforeach;
                    else : ?>
                        <p>Aucune recette trouvée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterToggleBtn = document.getElementById('filterToggleBtn');
    const filterOverlay = document.getElementById('filterOverlay');
    const closeFilters = document.getElementById('closeFilters');
    const showMoreButtons = document.querySelectorAll('.show-more');

    filterToggleBtn.addEventListener('click', function () {
        filterOverlay.classList.add('active');
    });

    closeFilters.addEventListener('click', function () {
        filterOverlay.classList.remove('active');
    });

    showMoreButtons.forEach(button => {
        button.addEventListener('click', function () {
            const options = this.previousElementSibling;
            options.classList.toggle('expanded');
            this.textContent = options.classList.contains('expanded') ? 'Afficher moins' : 'Afficher plus';
        });
    });
});
</script>

<?php
get_footer();
?>