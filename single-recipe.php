<?php
get_header();
?>

<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>

        <!-- Image mise en avant -->
        <?php if (has_post_thumbnail()) : ?>
            <div>
                <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
            </div>
        <?php endif; ?>

        <!-- Contenu principal -->
        <div>
            <?php the_content(); ?>
        </div>

    <?php endwhile; else : ?>
        <p>Aucune recette trouvée.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
?>
