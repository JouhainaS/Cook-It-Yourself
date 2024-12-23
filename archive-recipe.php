<?php
get_header();
?>

<div class="container">
    <h1>Nos Recettes</h1>
    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-4">
                <div class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                        </a>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
            </div>
        <?php endwhile; else : ?>
            <p>Aucune recette trouvée.</p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>
