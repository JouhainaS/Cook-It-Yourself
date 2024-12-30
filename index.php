<?php
/* Template : Index - Page */
get_header(); 
?>
<style>
    body, html {
    overflow-x: hidden; /* Empêche tout débordement horizontal */
}
.index-page .container {
    max-width: 100%; /* Empêche de dépasser la largeur de l'écran */
    padding: 0 15px; /* Ajoute un peu de marge interne */
    overflow-x: hidden; /* Supprime le scroll horizontal */
}

*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.index-page .container {
  max-width: 1200px; /* Augmentez la largeur */
  margin: 0 auto;
  padding: 0 20px; /* Ajustez les marges internes si nécessaire */
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

.index-page .top-rated-recipes h2 {
    text-align: center;
    margin-left: 20px; /* Ajuste le décalage avec une petite marge */
}

.index-page .trucs-et-astuces h2 {
    text-align: center; /* S'assure que le texte est à gauche */
  
}


.index-page .categories h2 {
    margin-left: 20px !important; /* Forcer la marge à gauche */
}

.index-page h1 { font-size: 2.5rem; }
.index-page h2 { font-size: 2rem; }
.index-page h3 { font-size: 1.75rem; }
.index-page h4 { font-size: 1.5rem; }
.index-page h5 { font-size: 1.25rem; }
.index-page h6 { font-size: 1rem; }

.hero-section {
    max-width: 100%; /* Permet à la section de s'étendre */
    text-align: center; /* Centre le texte horizontalement */
}

.hero-section h1 {
    display: inline-block; /* Permet au texte de s’étendre */
    white-space: nowrap; /* Empêche le texte de passer à la ligne */
}

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
   background-color: rgba(117, 100, 84, 0.5); /* Par exemple, une transparence de 50% */
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
  margin: 50px auto; /* Centré */
  padding: 0 !important; /* Supprime les paddings */
}



.index-page .top-rated-recipes .row {
  display: flex; /* Utilise Flexbox pour aligner les cartes */
  flex-wrap: wrap; /* Permet aux cartes de retourner à la ligne si nécessaire */
  align-items: flex-start; /* Aligne les cartes en haut */
  gap: 0px; /* Ajoute un espacement uniforme entre les cartes */
  margin: 0; /* Supprime les marges inutiles */
  padding: 0; /* Supprime les paddings */
}






.index-page .top-rated-recipes .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.index-page .top-rated-recipes .card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}
.card-img-top {
    width: 100%; /* Toujours égal à la largeur de la carte */
    height: 180px; /* Une hauteur constante */
    object-fit: cover; /* Permet de remplir tout l'espace */
    border-radius: 15px 15px 0 0; /* Facultatif, pour arrondir les coins */
}

.index-page .top-rated-recipes .card-body {
  padding: 15px; /* Ajustez selon vos besoins */
}


.index-page .top-rated-recipes .card-body p {
    margin-bottom: 5px;
    font-size: 0.9rem;
    line-height: 1.4;
}

.index-page .top-rated-recipes .card-body p:last-child {
    margin-bottom: 0;
}

.index-page .top-rated-recipes .card-title {
    font-size: 1.3rem;
    color: #3A5676; 
    text-decoration: none;
    transition: color 0.3s ease, text-decoration 0.3s ease;
    white-space: nowrap; /* Empêche le titre de passer à la ligne */
    overflow: hidden; /* Cache le texte qui déborde */
    text-overflow: ellipsis; /* Ajoute des points de suspension (...) */
    display: block;
}

.index-page .top-rated-recipes .card-title a {
    text-decoration: none;
    color: inherit;
}

.index-page .top-rated-recipes .card-title a:hover {
    color: #5692B2;
    text-decoration: underline;
}

.index-page .top-rated-recipes .rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.index-page .top-rated-recipes .rating .star {
    font-size: 1.2rem;
    color: #A8BAA7;
}

.index-page .top-rated-recipes .rating .star.text-muted {
    color: #ddd;
}

.index-page .top-rated-recipes .rating .rating-value {
    font-size: 0.9rem;
    color: #333;
    margin-left: 5px;
}


.index-page .top-rated-recipes .card {
    border: none; 
    width: 260px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.index-page .top-rated-recipes .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.index-page .top-rated-recipes .card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.index-page .top-rated-recipes .card-body {
    padding: 15px;
}

.index-page .top-rated-recipes .card-body p {
    margin-bottom: 5px;
    font-size: 0.9rem;
    line-height: 1.4;
}

.index-page .top-rated-recipes .card-body p:last-child {
    margin-bottom: 0;
}

.index-page .top-rated-recipes .card-title {
    font-size: 1.3rem;
    color: #3A5676; 
    text-decoration: none;
    transition: color 0.3s ease, text-decoration 0.3s ease;
    white-space: nowrap; /* Empêche le titre de passer à la ligne */
    overflow: hidden; /* Cache le texte qui déborde */
    text-overflow: ellipsis; /* Ajoute des points de suspension (...) */
    display: block; /* Assure une bonne compatibilité */
}

.index-page .top-rated-recipes  .card-title a {
    text-decoration: none; 
    color: inherit; 
}

.index-page .top-rated-recipes .card-title a:hover {
    color: #5692B2; 
    text-decoration: underline; 
}

.index-page .top-rated-recipes  .rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.index-page .top-rated-recipes  .rating .star {
    font-size: 1.2rem; 
    color: #A8BAA7; 
}

.index-page .top-rated-recipes  .rating .star.text-muted {
    color: #ddd; 
}

.index-page .top-rated-recipes .rating .rating-value {
    font-size: 0.9rem; 
    color: #333; 
    margin-left: 5px; 
}

.index-page .top-rated-recipes .card-link:hover {
  text-decoration: underline; 
  color: #3a5676; 
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

.index-page .trucs-et-astuces {
    margin-bottom: 40px; 
}
.index-page .category-btn {
    text-decoration: none !important;
}

.index-page .category-btn span {
    text-decoration: none !important; 
}

.index-page .category-btn a {
    text-decoration: none !important;
}

.index-page .category-btn:hover a,
.index-page .category-btn:hover span {
    text-decoration: underline !important;
}
.index-page .top-rated-recipes .card {
    margin: 0; /* Assurez-vous qu'aucune marge externe n'augmente l'espacement */
}
.index-page .top-rated-recipes .col-md-3 {
  margin: 0 !important; /* Supprime les marges extérieures */
  padding: 0 !important; /* Supprime les paddings intérieurs */
  display: flex;
  justify-content: center; /* Centre les cartes dans les colonnes */
}


@media (max-width: 768px) {
  
  .index-page .hero-section h1 {
    font-size: 3rem; /* Réduit la taille du texte */
    white-space: normal; /* Permet au texte de passer à la ligne */
    word-wrap: break-word; /* Autorise le texte à se couper sur plusieurs lignes */
    line-height: 1.3; /* Ajuste l'espacement vertical entre les lignes */
    padding: 0 10px; /* Ajoute un peu de padding pour éviter les bordures */
    text-align: center; /* Centre le contenu */
  }


  .index-page .hero-section .search-bar {
    font-size: 1rem;
    padding: 10px 15px;
  }

  .index-page .top-rated-recipes .row {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto; 
        gap: 15px; 
        scroll-snap-type: x mandatory; 
        padding-bottom: 20px; 
        justify-content: center; 
    }

   
    .index-page .top-rated-recipes .row::-webkit-scrollbar {
        height: 8px;
    }

    .index-page .top-rated-recipes .row::-webkit-scrollbar-thumb {
        background: #5692B2; 
        border-radius: 4px;
    }

    .index-page .top-rated-recipes .row::-webkit-scrollbar-track {
        background: #ddd;
    }

  .trucs-et-astuces .article-card {
    flex-direction: row;
    align-items: stretch;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
    margin-bottom: 20px;
    height: 250px;
}


.trucs-et-astuces .article-card:hover {
    transform: scale(1.02);
}

.trucs-et-astuces .article-thumbnail {
    flex: 0 0 40%;
    max-width: 40%;
    overflow: hidden;
}

.trucs-et-astuces .article-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px 0 0 10px;
}

.trucs-et-astuces .article-content {
    flex: 1;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.trucs-et-astuces .article-content h3 {
    font-size: 1rem;
    color: #3a5676;
    margin-bottom: 10px;
}

.trucs-et-astuces .article-content h3 a {
    text-decoration: none;
    color: inherit;
}

.trucs-et-astuces .article-content h3 a:hover {
    text-decoration: underline;
}

.trucs-et-astuces .article-content p {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 10px;
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
  .index-page .category-btn {
    text-decoration: none !important; /* Forcer aucune soulignation sur toute la catégorie */
}

.index-page .category-btn span {
    text-decoration: none !important; /* Supprime la soulignation sur le texte */
}

.index-page .category-btn a {
    text-decoration: none !important; /* Supprime la soulignation sur les liens */
}

.index-page .category-btn:hover a,
.index-page .category-btn:hover span {
    text-decoration: underline !important; /* Souligner uniquement au survol */
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
            <h1 class="display-4 fw-bold">Cuisiner n’a jamais été aussi simple! </h1>
            <!-- Search Bar -->
            <form class="d-flex align-items-center me-3" method="get" action="<?php echo home_url('/'); ?>">
                <input class="form-control rounded-pill search-bar" type="search" name="s" placeholder="RECHERCHE PAR PLAT, INGREDIENTS, ..." aria-label="Search">
            </form>
        </div>
    </header>

 
<!-- Section des Recettes les mieux notées -->
<section class="top-rated-recipes">
    <div class="container">
        <h2>Les mieux notées</h2>
        <div class="row">
            <?php
            global $wpdb;

            // Requête SQL pour calculer la moyenne des notes
            $query = "
                SELECT p.ID, p.post_title, p.post_author, AVG(meta.meta_value) AS average_rating
                FROM {$wpdb->posts} p
                INNER JOIN {$wpdb->comments} c ON p.ID = c.comment_post_ID
                INNER JOIN {$wpdb->commentmeta} meta ON c.comment_ID = meta.comment_id
                WHERE p.post_type = 'recipe' 
                  AND meta.meta_key = 'rating'
                  AND c.comment_approved = 1
                GROUP BY p.ID
                ORDER BY average_rating DESC
                LIMIT 4
            ";

            $top_recipes = $wpdb->get_results($query);

            if (!empty($top_recipes)) :
                foreach ($top_recipes as $recipe) : 
                    // Récupérer le temps total et l'auteur
                    $prep_time = get_post_meta($recipe->ID, 'prep_time', true);
                    $cook_time = get_post_meta($recipe->ID, 'cook_time', true);

                    // Calcul du temps total en minutes
                    $prep_minutes = explode(':', $prep_time);
                    $cook_minutes = explode(':', $cook_time);
                    $total_minutes = ($prep_minutes[0] * 60 + $prep_minutes[1]) + ($cook_minutes[0] * 60 + $cook_minutes[1]);

                    $author_name = get_the_author_meta('display_name', $recipe->post_author);
            ?>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="card">
                            <?php if (has_post_thumbnail($recipe->ID)) : ?>
                                <?php echo get_the_post_thumbnail($recipe->ID, 'medium', ['class' => 'card-img-top']); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/default.jpg" alt="Image par défaut" class="card-img-top">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php echo get_permalink($recipe->ID); ?>">
                                        <?php echo esc_html($recipe->post_title); ?>
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Par : <?php echo esc_html($author_name); ?>
                                </p>
                                <p class="card-text">
                                    Temps total : <?php echo $total_minutes ? $total_minutes . ' min' : 'Non spécifié'; ?>
                                </p>
                                <p class="card-text">
                                    
                                    <div class="rating">
                                        <?php
                                        $average_rating = round($recipe->average_rating, 1);
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $average_rating ? '<span class="star">&#9733;</span>' : '<span class="star text-muted">&#9734;</span>';
                                        }
                                        ?>
                                        <span class="rating-value">(<?php echo $average_rating; ?>)</span>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php 
                endforeach;
            else : ?>
                <p>Aucune recette trouvée.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

        <!-- Section des Catégories -->
    <section class="categories">
        <div class="container">
            <h2>Catégories</h2>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <!-- Petit déjeuner -->
                <a href="<?php echo home_url('/recettes'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/petit-dejeuner.svg" alt="Petit déjeuner" class="category-icon">
                    <span>Petit 
                        <br> déjeuner</span>
                </a>
                <!-- Déjeuner -->
                <a href="<?php echo home_url('/recettes'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dejeuner.svg" alt="Déjeuner" class="category-icon">
                    <span>Déjeuner</span>
                </a>
                <!-- Dîner -->
                <a href="<?php echo home_url('/recettes'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/diner.svg" alt="Dîner" class="category-icon">
                    <span>Dîner</span>
                </a>
                <!-- Desserts -->
                <a href="<?php echo home_url('/recettes'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/dessert.svg" alt="Desserts" class="category-icon">
                    <span>Desserts</span>
                </a>
                <!-- Boissons -->
                <a href="<?php echo home_url('/recettes'); ?>" class="category-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/boisson.svg" alt="Boissons" class="category-icon">
                    <span>Boissons</span>
                </a>
            </div>
        </div>
    </section>


    <section class="trucs-et-astuces">
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