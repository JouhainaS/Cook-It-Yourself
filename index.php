<?php
/* Template : Page d'Accueil */
get_header(); 
?>
<style>/* Section Hero */
 .hero-section {
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
 
 .hero-section .overlay {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-color: rgba(255, 176, 83, 0.24);
   z-index: 1;
 }
 
 .hero-section .container {
   position: relative;
   z-index: 2;
 }
 
 .hero-section h1 {
   color: white;
   font-size: 4rem;
   line-height: 1.2;
 }
 
 .hero-section .search-bar {
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
 
 .hero-section .search-bar::placeholder {
   color: #5692b2;
 }
 
 .hero-section .search-bar:focus {
   outline: none;
   box-shadow: 0 0 10px rgba(86, 146, 178, 0.5);
 }
 
 .hero-section {
   margin-bottom: 40px;
 }
 
 /* Top Rated Recipes Section */
 .top-rated-recipes .row {
   display: flex;
   flex-wrap: nowrap;
   gap: 50px;
   justify-content: center;
   align-items: center;
   overflow-x: auto;
   padding-bottom: 10px;
 }
 
 .top-rated-recipes h2 {
   margin-left: 150px;
   margin-right: 20px;
   margin-bottom: 2rem;
 }
 
 .card {
   display: flex;
   flex-direction: column;
   background-color: white;
   border-radius: 10px;
   overflow: hidden;
   box-shadow: 0 2px 4px rgba(86, 146, 178, 0.1);
   width: 16rem;
   text-align: left;
   transition: transform 0.2s ease;
 }
 
 .card:hover {
   transform: scale(1.05);
 }
 
 .card .card-body {
   padding: 15px;
   display: flex;
   flex-direction: column;
   gap: 10px;
 }
 
 .card img {
   width: 100%;
   margin-bottom: 0;
   border-radius: 10px 10px 0 0;
 }
 
 .card-content h3 {
   color: black;
   font-size: 1.2rem;
   margin-bottom: 5px;
 }
  
  .card-content p {
    color: #666;
    line-height: 1.4;
    font-size: 0.9rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  
  .card-title {
    font-size: 1.25rem;
    margin: 0;
    text-decoration: none;
  }
  
  .card .star-icon {
    width: auto;
    height: 20px;
    margin-right: 5px;
  }
  
  /* Categories Section */
  .categories {
    padding: 60px 0;
    text-align: center;
  }
  
  .d-flex {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }
  
  .category-btn {
    background-color: #EBF4E7;
    border-radius: 70px;
    width: 140px;
    height: 180px;
    margin: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    border: none;
  }
  
  .category-btn:hover {
    background-color: #d7e8d2;
  }
  
  .category-btn span {
    font-size: 1.2rem;
    color: #3a5676;
    font-weight: 500;
  }
  
  .category-icon {
    height: 55px;
    object-fit: contain;
  }
  
  /* Articles Section */
  .articles-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-bottom: 40px;
  }
  
  .article-card {
    display: flex;
    width: 1170px;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(86, 146, 178, 0.1);
    transition: transform 0.2s ease;
    height: 180px;
    margin: 0 auto;
  }
  
  .article-card:hover {
    transform: scale(1.02);
  }
  
  .article-card img {
    width: 30%;
    height: 100%;
    object-fit: cover;
  }
  
  .article-content {
    padding: 10px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    word-wrap: break-word;
  }
  
  .article-content .star-icon {
    width: auto;
    height: 20px;
    margin-right: 5px;
  }
  
  .article-content h3 {
    color: black;
    font-size: 1.2rem;
    margin-bottom: 5px;
  }
  
  .article-content p {
    color: #666;
    line-height: 1.4;
    font-size: 0.9rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    word-wrap: break-word;
  }
  </style>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?> 

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
            <h2 class="fw-bold mb-4">Les mieux notées</h2>
            <div class="row">
                <?php
                // Query pour récupérer les recettes les mieux notées
                $args = array(
                    'post_type' => 'recette', // Type de publication 'recette'
                    'posts_per_page' => 4,    // Limite à 4 recettes
                    'meta_key' => 'rating',   // Trier par champ personnalisé 'rating'
                    'orderby' => 'meta_value_num', // Trier par valeur numérique
                    'order' => 'DESC'         // Par ordre décroissant (les mieux notées en premier)
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
                                                $full_stars = floor($rating); // Nombre d'étoiles pleines
                                                $half_star = ($rating - $full_stars) >= 0.5; // Étoile à moitié pleine ?
                                                $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0); // Étoiles vides

                                                // Générer les étoiles pleines
                                                for ($i = 0; $i < $full_stars; $i++) {
                                                    echo '<span class="text-warning">&#9733;</span>'; // Étoile pleine
                                                }

                                                // Générer l'étoile à moitié pleine si applicable
                                                if ($half_star) {
                                                    echo '<span class="text-warning">&#9734;</span>'; // Étoile à moitié pleine
                                                }

                                                // Générer les étoiles vides
                                                for ($i = 0; $i < $empty_stars; $i++) {
                                                    echo '<span class="text-muted">&#9734;</span>'; // Étoile vide
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
            <h2 class="fw-bold mb-4">Catégories</h2>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <!-- Petit déjeuner -->
                <a href="<?php echo home_url('petit-dejeuner.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/petit-dejeuner.svg" alt="Petit déjeuner" class="category-icon">
                    <span>Petit 
                        <br> déjeuner</span>
                </a>
                <!-- Déjeuner -->
                <a href="<?php echo home_url('dejeuner.php'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dej.svg" alt="Déjeuner" class="category-icon">
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


    <!-- Section "Trucs et Astuces" -->
    <section class="trucs-et-astuces py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Trucs et Astuces</h2>
            <div class="row">
                <?php
                // Query pour récupérer les articles "Trucs et Astuces"
                $args = array(
                    'post_type'      => 'post',  // Type de publication standard 'post' pour les articles
                    'posts_per_page' => 3,       // Limite à 3 articles
                    'orderby'        => 'date',  // Trier par date
                    'order'          => 'DESC',  // Du plus récent au plus ancien
                    'category_name'  => 'trucs-et-astuces'  // Catégorie spécifique "Trucs et Astuces"
                );
                $articles = new WP_Query($args);

                if ($articles->have_posts()) :
                    while ($articles->have_posts()) : $articles->the_post(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="article-thumbnail">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire la suite</a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    else : ?>
                        <p>Aucun artcile trouvé.</p>
                    <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>