<?php
/** Template Name: Nos recettes - Page */
get_header();
?>

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
                        'Bœuf' => 'boeuf',
                        'Œufs' => 'oeufs',
                        'Riz' => 'riz',
                        'Pommes de terre' => 'pommes-de-terre',
                        'Carottes' => 'carottes',
                        'Tomates' => 'tomates',
                        'Oignons' => 'oignons',
                        'Ail' => 'ail',
                        'Épinards' => 'epinards',
                        'Champignons' => 'champignons',
                        'Lait' => 'lait',
                        'Fromage' => 'fromage',
                        'Crème fraîche' => 'creme-fraiche',
                        'Pain' => 'pain',
                        'Pâtes' => 'pates',
                        'Haricots verts' => 'haricots-verts',
                        'Lentilles' => 'lentilles',
                        'Pois chiches' => 'pois-chiches',
                        'Maïs' => 'mais',
                        'Beurre' => 'beurre',
                        'Huile d\'olive' => 'huile-d-olive',
                        'Sel' => 'sel',
                        'Poivre' => 'poivre',
                        'Paprika' => 'paprika',
                        'Curry' => 'curry',
                        'Basilic' => 'basilic',
                        'Persil' => 'persil',
                        'Thym' => 'thym',
                        'Citron' => 'citron',
                        'Miel' => 'miel',
                        'Chocolat' => 'chocolat',
                        'Sucre' => 'sucre',
                        'Farine' => 'farine',
                        'Levure' => 'levure',
                        'Pommes' => 'pommes',
                        'Bananes' => 'bananes',
                        'Fraises' => 'fraises',
                        'Framboises' => 'framboises',
                        'Noix' => 'noix',
                        'Amandes' => 'amandes',
                        'Noisettes' => 'noisettes',
                        'Yaourt' => 'yaourt',
                        'Saumon' => 'saumon',
                        'Crevettes' => 'crevettes',
                        'Thon' => 'thon',
                        'Courgettes' => 'courgettes',
                        'Aubergines' => 'aubergines',
                        'Poivrons' => 'poivrons',
                        'Brocoli' => 'brocoli',
                        'Chou-fleur' => 'chou-fleur',
                    ],
                ];

                foreach ($filter_data as $section_title => $options) : ?>
                    <div class="filter-section">
                        <h5><?php echo $section_title; ?> :</h5>
                        <?php foreach ($options as $label => $value) : ?>
                            <div>
                                <input type="checkbox" name="<?php echo strtolower(str_replace(' ', '_', $section_title)); ?>[]" value="<?php echo $value; ?>" id="<?php echo strtolower($section_title . '_' . $value); ?>">
                                <label for="<?php echo strtolower($section_title . '_' . $value); ?>"><?php echo $label; ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Liste des recettes -->
        <div class="col-md-9">
            <h1 class="mb-4">Nos Recettes</h1>
            <div class="row">
                <?php
                // Arguments de la requête WP_Query
                $args = [
                    'post_type' => 'recipe',
                    'post_status' => 'publish',
                    'posts_per_page' => 9,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                ];

                // Requête principale
                $recipe_query = new WP_Query($args);

                // Vérification des résultats
                if ($recipe_query->have_posts()) :
                    while ($recipe_query->have_posts()) :
                        $recipe_query->the_post();
                ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate"><?php the_title(); ?></h5>
                                    <p class="card-text">
                                        <strong>Auteur :</strong> <?php the_author(); ?><br>
                                        <strong>Portions :</strong> <?php echo get_post_meta(get_the_ID(), 'portions', true); ?><br>
                                        <strong>Difficulté :</strong> <?php echo ucfirst(get_post_meta(get_the_ID(), 'difficulty', true)); ?><br>
                                        <strong>Temps de Préparation :</strong> <?php echo get_post_meta(get_the_ID(), 'prep_time', true); ?> min
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Voir la recette</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;

                    // Pagination
                    echo '<div class="col-12">';
                    echo '<nav class="pagination justify-content-center">';
                    echo paginate_links([
                        'total' => $recipe_query->max_num_pages,
                        'prev_text' => __('&larr; Précédent', 'textdomain'),
                        'next_text' => __('Suivant &rarr;', 'textdomain'),
                    ]);
                    echo '</nav>';
                    echo '</div>';
                else :
                    echo '<p>Aucune recette trouvée.</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Styles intégrés -->
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .card-text {
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

    .filter-section div {
        margin-bottom: 0.5rem;
    }

    .filter-section input[type="checkbox"] {
        margin-right: 8px;
    }

    label {
        font-size: 0.9rem;
        color: #000;
    }
    
    /* Style de la case à cocher */
    .filter-section input[type="checkbox"] {
        accent-color: #A8BAA7; /* Change la couleur de fond de la case cochée */
    }

</style>

<?php
get_footer();
?>
