<?php
/** Template Name: Index - Page */

get_header();
?>

<div class="hero-section text-center text-white py-5" style="background-size: cover; background-position: center;">
    <div class="hero-background"></div>
    <div class="overlay"></div>
    <div class="container">
        <h1 class="display-4 fw-bold">Cuisiner n’a jamais été aussi fun !!!</h1>
        <!-- Search Bar -->
        <form class="d-flex align-items-center me-3" action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <input class="form-control rounded-pill search-bar" type="search" name="s" placeholder="RECHERCHE PAR PLAT, INGREDIENTS, ..." aria-label="Search">
        </form>
    </div>
</div>

<!-- Top Rated Recipes Section -->
<section class="top-rated-recipes py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Les mieux notées</h2>
        <div class="row">

            <?php
            // Exemple de boucle WordPress pour récupérer les recettes
            $args = array(
                'post_type' => 'recette', // Type de contenu personnalisé (si vous avez créé un CPT "recette")
                'posts_per_page' => 4,   // Nombre de recettes affichées
                'orderby' => 'meta_value_num',
                'meta_key' => 'rating', // Tri basé sur un champ personnalisé "rating"
                'order' => 'DESC',
            );
            $recettes_query = new WP_Query($args);

            if ($recettes_query->have_posts()) :
                while ($recettes_query->have_posts()) : $recettes_query->the_post(); ?>

                    <div class="col-md-3 d-flex justify-content-center">
                        <a href="<?php the_permalink(); ?>" class="card-link">
                            <div class="card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
                                    </h5>
                                    <p class="card-text">
                                        Par <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-decoration-none text-muted"><?php the_author(); ?></a>
                                    </p>
                                    <p class="card-text">Temps total : <?php echo get_post_meta(get_the_ID(), 'temps_total', true); ?> min</p>
                                    <div>
                                        <?php
                                        $rating = get_post_meta(get_the_ID(), 'rating', true);
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/icones/chef_2.svg" alt="Rating" class="star-icon"' . ($i <= $rating ? ' style="opacity:1;"' : ' style="opacity:0.5;"') . '>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Catégories</h2>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <?php
            $categories = get_categories(array(
                'taxonomy' => 'category',
                'hide_empty' => false,
            ));
            foreach ($categories as $category) :
                // Vérification si l'icône existe
                $icon_path = get_template_directory_uri() . '/assets/icones/' . strtolower($category->slug) . '.svg';
                $icon_exists = file_exists(get_template_directory() . '/assets/icones/' . strtolower($category->slug) . '.svg');
                // Vérification si la catégorie est active
                $is_active = is_category($category->term_id);
            ?>
                <a href="<?php echo get_category_link($category->term_id); ?>" class="category-link" 
                   aria-label="<?php echo esc_attr($category->name); ?>" 
                   <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                    <button class="category-btn <?php echo $is_active ? 'active-category' : ''; ?>">
                        <img src="<?php echo $icon_exists ? $icon_path : get_template_directory_uri() . '/assets/icones/default.svg'; ?>" 
                             alt="<?php echo esc_attr($category->name); ?>" 
                             class="category-icon">
                        <span><?php echo esc_html($category->name); ?></span>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Articles Section -->
<section class="articles-section">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Nos derniers articles</h2>
        <div class="articles-container">

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $articles_query = new WP_Query($args);

            if ($articles_query->have_posts()) :
                while ($articles_query->have_posts()) : $articles_query->the_post(); ?>
                    <div class="article-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="article-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div>
                                <?php
                                $rating = get_post_meta(get_the_ID(), 'rating', true);
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<img src="' . get_template_directory_uri() . '/assets/icones/chef 2.svg" alt="Rating" class="star-icon"' . ($i <= $rating ? ' style="opacity:1;"' : ' style="opacity:0.5;"') . '>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
