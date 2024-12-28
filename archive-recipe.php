<?php
/** Template Name: Nos recettes - Page */
get_header();
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .grid-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 20px;
    }

    .card {
        width: 260px; /* Réduction de la largeur des cartes */
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        text-decoration: none; /* Supprime la décoration par défaut */
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .card-title {
        font-size: 1.3rem;
        color: #2c3e50;
        margin-bottom: 5px;
        text-decoration: none; /* Par défaut, pas de soulignement */
    }

    .card-title:hover {
        text-decoration: none; /* Pas de soulignement au survol */
        color: #5692B2; /* Change la couleur au survol */
    }

    a {
        text-decoration: none; /* Supprime la décoration par défaut des liens */
        color: inherit; /* Utilise la couleur par défaut du texte */
    }

    a:hover {
        text-decoration: none; /* Pas de soulignement au survol des liens */
    }

    .recipe-meta {
        color: #000;
        font-size: 0.9rem;
        margin-bottom: 10px;
        font-weight: normal; /* Texte non gras */
    }

    .recipe-meta .author {
        color: black;
        display: block;
    }

    .recipe-meta .time {
        margin-top: 3px;
        display: block;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .rating .star {
        font-size: 1.2rem;
        color: #ffc107;
    }

    .rating .rating-value {
        font-size: 0.9rem;
        color: #555;
    }

    .filters {
        padding: 15px;
        background-color: white;
    }

    .filters h4 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #000;
        text-align: left;
    }

    .filter-section {
        margin-bottom: 1.5rem;
    }

    .filter-section h5 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: #000;
        text-align: left;
    }

    .filter-options {
        max-height: 100px;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .filter-options.expanded {
        max-height: 500px;
    }

    .filter-section input[type="checkbox"] {
        margin-right: 8px;
        accent-color: #A8BAA7;
    }

    label {
        font-size: 0.9rem;
        color: #000;
    }

    .toggle-more {
        background: none;
        border: none;
        color: #3498db;
        cursor: pointer;
        font-size: 0.9rem;
        margin-top: 10px;
        text-decoration: underline;
    }

    .toggle-more:hover {
        color: #2c3e50;
    }
    .recipes-page-wrapper body {
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

.recipes-page-wrapper .content-wrapper {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.recipes-page-wrapper .filter-sidebar {
    width: 25%;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}

.recipes-page-wrapper .filters h4 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: #000;
}

.recipes-page-wrapper .filter-section {
    margin-bottom: 20px;
}

.recipes-page-wrapper .filter-section h5 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    color: #000;
}

.recipes-page-wrapper .filter-options {
    max-height: 100px;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.recipes-page-wrapper .filter-options.expanded {
    max-height: 500px;
}

.recipes-page-wrapper .show-more {
    font-size: 0.9rem;
    color: #5692B2;
    cursor: pointer;
    margin-top: 10px;
    display: inline-block;
}

.recipes-page-wrapper .filter-section input[type="checkbox"] {
    margin-right: 8px;
    accent-color: #A8BAA7;
}

.recipes-page-wrapper label {
    font-size: 0.9rem;
    color: #000;
}

.recipes-page-wrapper .grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.recipes-page-wrapper .card {
    width: 260px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.recipes-page-wrapper .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.recipes-page-wrapper .card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.recipes-page-wrapper .card-body {
    padding: 15px;
}

.recipes-page-wrapper .card-body p {
    margin-bottom: 5px;
    font-size: 0.9rem;
    line-height: 1.4;
}

.recipes-page-wrapper .card-body p:last-child {
    margin-bottom: 0;
}

.recipes-page-wrapper .card-title {
    font-size: 1.3rem;
    color: #3A5676; 
    text-decoration: none;
    transition: color 0.3s ease, text-decoration 0.3s ease; 
}

.recipes-page-wrapper .card-title a {
    text-decoration: none; 
    color: inherit; 
}

.recipes-page-wrapper .card-title a:hover {
    color: #5692B2; 
    text-decoration: underline; 
}

.recipes-page-wrapper .rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.recipes-page-wrapper .rating .star {
    font-size: 1.2rem; 
    color: #A8BAA7; 
}

.recipes-page-wrapper .rating .star.text-muted {
    color: #ddd; 
}

.recipes-page-wrapper .rating .rating-value {
    font-size: 0.9rem; 
    color: #333; 
    margin-left: 5px; 
}

.recipes-page-wrapper .filter-toggle-btn {
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

.recipes-page-wrapper .filter-overlay {
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

.recipes-page-wrapper .filter-overlay.active {
    display: block;
}

.recipes-page-wrapper .close-btn {
    font-size: 1.5rem;
    color: #333;
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .recipes-page-wrapper .content-wrapper {
        flex-direction: column;
    }

    .recipes-page-wrapper .filter-sidebar {
        display: none;
    }

    .recipes-page-wrapper .filter-toggle-btn {
        display: block;
    }
}

</style>
<div class="recipes-page-wrapper">
    <!-- Votre contenu existant -->

<div class="container">
    <div class="row">
        <!-- Sidebar des filtres -->
        <div class="col-md-3">
            <div class="filters">
                <h4>Filtrer par</h4>

                <!-- Boucle dynamique pour générer des sections de filtres -->
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
                        <div class="filter-options" id="options-<?php echo strtolower(str_replace(' ', '-', $section_title)); ?>">
                            <?php foreach ($options as $label => $value) : ?>
                                <div>
                                    <input type="checkbox" name="<?php echo strtolower(str_replace(' ', '_', $section_title)); ?>[]" value="<?php echo $value; ?>" id="<?php echo strtolower($section_title . '_' . $value); ?>">
                                    <label for="<?php echo strtolower($section_title . '_' . $value); ?>"><?php echo $label; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (count($options) > 3) : ?>
                            <button type="button" class="toggle-more" data-target="options-<?php echo strtolower(str_replace(' ', '-', $section_title)); ?>">Afficher plus</button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Liste des recettes -->
        <div class="col-md-9">
            <h1 class="mb-4">Nos Recettes</h1>
            <div class="grid-container">
                <?php
                $query = new WP_Query([
                    'post_type' => 'recipe',
                    'posts_per_page' => 9,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                ]);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $total_time = get_post_meta(get_the_ID(), 'total_time', true);
                        $rating = get_post_meta(get_the_ID(), 'rating', true) ?: 4;
                ?>
                        <a href="<?php the_permalink(); ?>" class="card-link">
                            <div class="card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', ['class' => 'custom-img']); ?>
                                <?php else : ?>
                                    <div class="placeholder" style="height: 180px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #aaa;">Image indisponible</div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="recipe-meta">
                                        <span class="author">Par COOK'S NAME</span>
                                        <span class="time">Temps total : <?php echo $total_time ?: 'N/A'; ?> min</span>
                                    </p>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $rating ? '<span class="star">&#9733;</span>' : '<span class="star">&#9734;</span>';
                                        } ?>
                                        <span class="rating-value">(<?php echo $rating; ?>)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php
                    endwhile;

                    echo '<div class="col-12">';
                    echo paginate_links([
                        'total' => $query->max_num_pages,
                        'prev_text' => __('&larr; Précédent', 'textdomain'),
                        'next_text' => __('Suivant &rarr;', 'textdomain'),
                    ]);
                    echo '</div>';

                    wp_reset_postdata();
                else :
                    echo '<p>Aucune recette trouvée.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.toggle-more');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);

                if (targetElement.classList.contains('expanded')) {
                    targetElement.classList.remove('expanded');
                    this.textContent = 'Afficher plus';
                } else {
                    targetElement.classList.add('expanded');
                    this.textContent = 'Afficher moins';
                }
            });
        });
    });
</script>

<?php
get_footer();
?>