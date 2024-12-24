<?php
/** Template Name: Nos recettes - Page */
get_header();
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Nos Recettes</h1>

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
            width: 300px; /* Largeur uniforme */
            height: 400px; /* Hauteur réduite */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 180px; /* Hauteur réduite pour uniformisation */
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
            height: 100%;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .recipe-meta {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .recipe-meta .author {
            font-weight: bold;
            color: #3498db;
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
            margin: 10px 0;
        }

        .rating .star {
            font-size: 1.4rem; /* Agrandi légèrement les étoiles */
            color: #ffc107;
        }

        .rating .rating-value {
            font-size: 1rem;
            color: #555;
        }

        .btn {
            display: none; /* Masque le bouton */
        }

        .card-link {
            text-decoration: none;
        }
    </style>

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
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
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

<?php get_footer(); ?>
