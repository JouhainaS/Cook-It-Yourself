<?php get_header(); ?>

<style>
/* Style des cartes pour les résultats de recherche */
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
    position: relative;
    text-decoration: none;
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
    text-decoration: none;
}

.card-title:hover {
    text-decoration: underline;
}

.recipe-meta {
    color: #000;
    font-size: 0.9rem;
    margin-bottom: 10px;
    font-weight: normal;
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

.placeholder {
    height: 180px;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #aaa;
    text-align: center;
}
</style>

<div class="container py-5">
    <h1 class="mb-4">Résultats de recherche pour : "<?php echo get_search_query(); ?>"</h1>

    <?php if (have_posts()) : ?>
        <div class="grid-container">
            <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="card-link">
                    <div class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <div class="placeholder">Image indisponible</div>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="recipe-meta">
                                <span class="author">Par <?php the_author(); ?></span>
                                <span class="time">Publié le <?php echo get_the_date(); ?></span>
                            </p>
                            <div class="rating">
                                <?php
                                $rating = get_post_meta(get_the_ID(), 'rating', true) ?: 4; // Note par défaut : 4
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $rating ? '<span class="star">&#9733;</span>' : '<span class="star">&#9734;</span>';
                                }
                                ?>
                                <span class="rating-value">(<?php echo $rating; ?>)</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>

        <div class="col-12">
            <?php
            // Pagination
            echo paginate_links([
                'total' => $wp_query->max_num_pages,
            ]);
            ?>
        </div>
    <?php else : ?>
        <p>Aucun résultat trouvé pour votre recherche. Essayez avec un autre mot-clé.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>