<?php
/* Template : Index - Page */
get_header(); 
?>
<style>
*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.index-page .container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 15px;
}

.index-page body {
  font-family: 'Poppins', sans-serif;
  background-color: white;
  color: black;
  margin: 0;
  padding: 0;
  padding-top: 80px;
}

.index-page h1, h2, h3, h4, h5, h6 {
  margin-bottom: 1rem;
  text-align: left;
  color: #3a5676;
}

.index-page h1 { font-size: 2.5rem; }
.index-page h2 { font-size: 2rem; }
.index-page h3 { font-size: 1.75rem; }
.index-page h4 { font-size: 1.5rem; }
.index-page h5 { font-size: 1.25rem; }
.index-page h6 { font-size: 1rem; }

.index-page .hero-section {
   position: relative;
   height: 70vh;
   display: flex;
   justify-content: center;
   align-items: center;
   text-align: center;
   background-image: url("assets/photos/hero-img.jpg");
   background-size: cover;
   background-position: center;
   background-repeat: no-repeat;
   color: white;
   z-index: 1;
 }
 
 .index-page .hero-section .overlay {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-color: 0 4px 10px rgba(0, 0, 0, 0.1);
   z-index: 1;
 }
 
 .index-page .hero-section .container {
   position: relative;
   z-index: 2;
 }
 
 .index-page .hero-section h1 {
   color: white;
   font-size: 4rem;
   line-height: 1.2;
 }
 
 .index-page .hero-section .search-bar {
   width: 100%;
   max-width: 800px;
   height: 50px;
   font-size: 1.2rem;
   padding: 12px 20px;
   border-radius: 25px;
   border: none;
   background-color: white;
   color: #5692b2;
   background-image: url('assets/icones/loupe.svg');
   background-repeat: no-repeat;
   background-position: 10px center;
   background-size: 20px 20px;
   padding-left: 50px;
 }
 
 .index-page .hero-section .search-bar::placeholder {
   color: #5692b2;
 }
 
 .index-page .hero-section .search-bar:focus {
   outline: none;
   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
 }
 
 .index-page .hero-section {
   margin-bottom: 40px;
 }


 .index-page .top-rated-recipes {
  padding: 60px 0;
}

.index-page .top-rated-recipes .container {
  max-width: 1000px; /* Aligne avec la classe .container */
  margin: 0 auto;
  padding: 0 15px;
}

.index-page .top-rated-recipes .row {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: space-between;
  align-items: center;
  overflow-x: auto;
  padding-bottom: 10px;
}


.index-page .card {
  display: flex;
  flex-direction: column;
  background-color: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  width: 16rem;
  text-align: left;
  transition: transform 0.2s ease;
}

.index-page .card:hover {
  transform: scale(1.05);
}

.index-page .card .card-body {
  padding: 15px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.index-page .card img {
  width: 100%;
  margin-bottom: 0;
  border-radius: 10px 10px 0 0;
}

.index-page .card-content h3 {
  color: black;
  font-size: 1.2rem;
  margin-bottom: 5px;
}

.index-page .card-content p {
  color: #666;
  line-height: 1.4;
  font-size: 0.9rem;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.index-page .card-title {
  font-size: 1.25rem;
  margin: 0;
  text-decoration: none;
}

.index-page .card .star-icon {
  width: auto;
  height: 20px;
  margin-right: 5px;
}

.index-page .categories {
  padding: 60px 0;
  text-align: center;
}

.index-page .categories .container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  max-width: 1000px;
  margin: 0 auto;
  gap: 20px;
  padding: 0 15px;
}

.index-page .category-btn {
  flex: 0 1 auto;
  width: 120px;
  height: 170px;
  background-color: #EBF4E7;
  border-radius: 70px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  border: none;
  transition: background-color 0.3s ease;
}

.index-page .category-btn:hover span {
  text-decoration: underline;
}

.index-page .category-btn span {
  font-size: 1.2rem;
  color: #3a5676;
  font-weight: 500;
  text-align: center;
  text-decoration: none
}

.index-page .category-btn:hover {
  background-color: #d7e8d2;
}

.index-page .category-icon {
  height: 55px;
  object-fit: contain;
}

.index-page .articles-list {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 0 15px;
  overflow: hidden;
  align-items: center;
}

.index-page .article-card {
  max-width: 100%;
  width: auto;
  display: flex;
  align-items: stretch;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
  padding: 0;
  margin: 0 auto;
  box-sizing: border-box;
}

.index-page  .article-card:hover {
  transform: scale(1.02);
}

.index-page .article-thumbnail {
  flex: 1;
  max-width: 33.33%;
  overflow: hidden;
}

.index-page .article-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 10px 0 0 10px;
}

.index-page .article-content {
  flex: 2;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.index-page .article-content h3 {
  font-size: 1.25rem;
  margin-bottom: 10px;
  color: #3a5676;
}

.index-page .article-content h3 a {
  text-decoration: none;
  color: #3a5676;
}

.index-page .article-content h3 a:hover {
  text-decoration: underline;
}

.index-page .article-content p {
  font-size: 0.9rem;
  color: #555;
  margin-bottom: 10px;
  line-height: 1.6;
}

.index-page .article-meta {
  display: flex;
  align-items: center;
  font-size: 0.9rem;
  color: #777;
  margin-bottom: 10px;
  display: flex;
  gap: 10px;
}

.index-page .article-meta .author,
.index-page .article-meta .date {
  font-style: italic;
}

.index-page .article-meta .date {
  color: #555;
}

.index-page .article-meta .comments {
  color: #3a5676;
}

@media (max-width: 768px) {
  .index-page .hero-section h1 {
    font-size: 2.5rem;
  }

  .index-page .hero-section .search-bar {
    font-size: 1rem;
    padding: 10px 15px;
  }

  .index-page .top-rated-recipes .row {
    flex-wrap: wrap;
    gap: 20px;
  }

  .index-page .card {
    width: 100%;
    margin-bottom: 20px;
    height: 550px;
  }

  .index-page .article-card {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    height: auto;
  }

  .index-page .article-thumbnail {
    flex: 0 0 auto;
    width: 100%;
    height: auto;
  }

  .index-page .article-thumbnail img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
  }

  .index-page .article-content {
    flex: 1;
    padding: 15px;
  }

  .index-page .article-content h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
  }

  .index-page .article-content p {
    font-size: 0.95rem;
    line-height: 1.6;
  }

  .index-page .categories {
    padding: 40px 0;
  }

  .index-page .categories .container {
    flex-wrap: wrap;
    max-width: 100%;
    gap: 15px;
    padding: 0 10px;
  }

  .index-page .category-btn {
    width: 100px;
    height: 140px;
    border-radius: 60px;
  }

  .index-page .category-btn span {
    font-size: 1rem;
  }

  .index-page .category-icon {
    height: 45px;
  }
}
</style>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?> 
    
    <div class="index-page"> 
    <!-- Hero Section -->
    <header class="hero-section text-center text-white py-5" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/photos/hero-img.jpg');">
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

 
    <!-- Section des Recettes les mieux notées -->
    <section class="top-rated-recipes py-5">
        <div class="container">
            <h2 >Les mieux notées</h2>
            <div class="row">
                <?php
                // Query pour récupérer les recettes les mieux notées
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
                                        <p class="card-text">
                                            <strong>Temps de préparation :</strong> 
                                            <?php 
                                            $temps_de_preparation = get_post_meta(get_the_ID(), 'temps_de_preparation', true); 
                                            echo $temps_de_preparation ? $temps_de_preparation : 'Non spécifié';
                                            ?>
                                        </p>
                                        <p class="card-text">
                                            <strong>Note :</strong>
                                            <?php 
                                            $rating = get_post_meta(get_the_ID(), 'rating', true); 
                                            if ($rating) {
                                                $full_stars = floor($rating); 
                                                $half_star = ($rating - $full_stars) >= 0.5;
                                                $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);

                                                // Générer les étoiles pleines
                                                for ($i = 0; $i < $full_stars; $i++) {
                                                    echo '<span class="text-warning">&#9733;</span>';
                                                }

                                                // Générer l'étoile à moitié pleine si applicable
                                                if ($half_star) {
                                                    echo '<span class="text-warning">&#9734;</span>';
                                                }

                                                // Générer les étoiles vides
                                                for ($i = 0; $i < $empty_stars; $i++) {
                                                    echo '<span class="text-muted">&#9734;</span>';
                                                }
                                            } else {
                                                echo 'Non notée';
                                            }
                                            ?>
                                        </p>
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

        <!-- Section des Catégories -->
    <section class="categories py-5">
        <div class="container">
            <h2>Catégories</h2>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <!-- Petit déjeuner -->
                <a href="<?php echo home_url('petit-dejeuner.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/petit-dejeuner.svg" alt="Petit déjeuner" class="category-icon">
                    <span>Petit 
                        <br> déjeuner</span>
                </a>
                <!-- Déjeuner -->
                <a href="<?php echo home_url('dejeuner.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dejeuner.svg" alt="Déjeuner" class="category-icon">
                    <span>Déjeuner</span>
                </a>
                <!-- Dîner -->
                <a href="<?php echo home_url('diner.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/diner.svg" alt="Dîner" class="category-icon">
                    <span>Dîner</span>
                </a>
                <!-- Desserts -->
                <a href="<?php echo home_url('dessert.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dessert.svg" alt="Desserts" class="category-icon">
                    <span>Desserts</span>
                </a>
                <!-- Boissons -->
                <a href="<?php echo home_url('boisson.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/boisson.svg" alt="Boissons" class="category-icon">
                    <span>Boissons</span>
                </a>
            </div>
        </div>
    </section>


    <section class="trucs-et-astuces py-5">
        <div class="container">
            <h2>Trucs et Astuces</h2>
            <div class="articles-list">
                <?php
                // Query pour récupérer les 3 derniers articles des catégories spécifiques
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'category_name'  => 'alternatives-vegetales, astuces, materiels, stop-au-gaspillage'
                );
                $articles = new WP_Query($args);

                if ($articles->have_posts()) :
                    while ($articles->have_posts()) : $articles->the_post(); ?>
                        <div class="article-card d-flex">
                            <div class="article-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/default.jpg" alt="Image par défaut">
                                <?php endif; ?>
                            </div>
                            <div class="article-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun article trouvé dans les catégories sélectionnées.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
  </div>

    <?php get_footer(); ?>