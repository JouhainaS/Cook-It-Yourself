<?php
/* Template : Page d'Accueil */
get_header(); 
?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?> 

    <!-- Hero Section -->
    <header class="hero-section text-center text-white py-5" style="background-size: cover; background-position: center;">
        <div class="hero-background"></div>
        <div class="overlay"></div>
        <div class="container">
            <h1 class="display-4 fw-bold">Cuisiner n’a jamais été aussi fun !!!</h1>
            <!-- Search Bar -->
            <form class="d-flex align-items-center me-3" method="get" action="<?php echo home_url('/'); ?>">
                <input class="form-control rounded-pill search-bar" type="search" name="s" placeholder="RECHERCHE PAR PLAT, INGREDIENTS, ..." aria-label="Search">
            </form>
        </div>
    </header>

    <!-- Top Rated Recipes Section -->
    <section class="top-rated-recipes py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Les mieux notées</h2>
            <div class="row">
                <?php
                // Query des recettes les mieux notées
                $args = array(
                    'post_type' => 'recette',
                    'posts_per_page' => 4,
                    'meta_key' => 'rating',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC'
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-md-3 d-flex justify-content-center">
                            <a href="<?php the_permalink(); ?>" class="card-link">
                                <div class="card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/default.jpg" alt="Image par défaut" class="card-img-top">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php the_title(); ?></h5>
                                        <p class="card-text">
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-decoration-none text-muted">Par <?php the_author(); ?></a>
                                        </p>
                                        <p class="card-text"><?php the_time('j F Y'); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucune recette trouvée.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="categories py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Catégories</h2>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <!-- Petit déjeuner -->
            <a href="<?php echo home_url('/petit-dejeuner.php'); ?>" class="category-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/petit dej.svg" alt="Petit déjeuner" class="category-icon">
                <span>Petit déjeuner</span>
            </a>
            <!-- Déjeuner -->
            <a href="<?php echo home_url('/dejeuner.php'); ?>" class="category-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dej.svg" alt="Déjeuner" class="category-icon">
                <span>Déjeuner</span>
            </a>
            <!-- Dîner -->
            <a href="<?php echo home_url('/diner.php'); ?>" class="category-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/diner.svg" alt="Dîner" class="category-icon">
                <span>Dîner</span>
            </a>
            <!-- Desserts -->
            <a href="<?php echo home_url('/dessert.php'); ?>" class="category-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dessert.svg" alt="Desserts" class="category-icon">
                <span>Desserts</span>
            </a>
            <!-- Boissons -->
            <a href="<?php echo home_url('/boisson.php'); ?>" class="category-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/boisson.svg" alt="Boissons" class="category-icon">
                <span>Boissons</span>
            </a>
        </div>
    </div>
</section>

    <!-- Articles Section -->
    <section class="articles-section">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">Nos derniers articles</h2>
            <div class="articles-container">
                <?php
                // Query des articles récents
                $articles = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));

                if ($articles->have_posts()) :
                    while ($articles->have_posts()) : $articles->the_post(); ?>
                        <div class="article-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'article-img']); ?>
                            <?php endif; ?>
                            <div class="article-content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun article trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>