<?php
/** Template Name: Nos recettes - Page */
get_header();
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .content-wrapper {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    .filter-sidebar {
        width: 25%;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: none;
    }

    .filters h4 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: #000;
    }

    .filter-section {
        margin-bottom: 20px;
    }

    .filter-section h5 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: #000;
    }

    .filter-options {
        max-height: 100px;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .filter-options.expanded {
        max-height: 500px;
    }

    .show-more {
        font-size: 0.9rem;
        color: #5692B2;
        cursor: pointer;
        margin-top: 10px;
        display: inline-block;
    }

    .filter-section input[type="checkbox"] {
        margin-right: 8px;
        accent-color: #A8BAA7;
    }

    label {
        font-size: 0.9rem;
        color: #000;
    }

    .recipe-list {
        width: 75%;
    }

    .grid-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 20px;
    }

    .card {
        width: 260px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
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
    }

    .card-title {
        font-size: 1.3rem;
        color: #2c3e50;
        margin-bottom: 5px;
        text-decoration: none;
    }

    .recipe-meta {
        color: #000;
        font-size: 0.9rem;
        margin-bottom: 10px;
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

    .filter-icon {
        width: 20px;
        height: 20px;
        margin-right: 8px;
        vertical-align: middle; 
    }

    .filter-toggle-btn i {
        margin-right: 8px; 
        font-size: 18px; 
        vertical-align: middle; 
    }

    .filter-toggle-btn {
        display: none;
        background-color: #5692B2;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 20px;
        font-size: 1rem;
        text-align: center;
        margin: 10px auto;
        cursor: pointer;
        width: 90%;
    }

    .filter-overlay {
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

    .filter-overlay.active {
        display: block;
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #333;
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .content-wrapper {
            flex-direction: column;
        }

        .filter-sidebar {
            display: none;
        }

        .filter-toggle-btn {
            display: block;
        }
    }
</style>

<div class="container">
    <div class="row">
        <button class="filter-toggle-btn" id="filterToggleBtn"> <img src="assets/icones/filtre.svg" alt="Filtres" class="filter-icon">Afficher les filtres </button>

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