<?php
/** Template Name: Nos recettes - Page */
get_header();
?>

<div class="container">
    <h1>Nos Recettes</h1>

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

        .pagination .page-numbers {
            display: inline-block;
            margin: 0 5px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #333;
            text-decoration: none;
        }

        .pagination .page-numbers.current {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .page-numbers:hover {
            background-color: #0056b3;
            color: #fff;
            border-color: #0056b3;
        }
    </style>

    <!-- Liste des recettes -->
    <div class="row">
        <?php
        $args = [
            'post_type' => 'recipe', // Récupère uniquement les recettes
            'post_status' => 'publish', // Récupère uniquement les recettes publiées
            'posts_per_page' => 9, // Nombre de recettes par page
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Pagination
        ];
        $recipe_query = new WP_Query($args);

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

<?php
get_footer();
?>
