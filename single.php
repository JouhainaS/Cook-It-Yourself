<?php 
/** Template Name: Single - Page */
get_header(); ?>

<style>
    
        .custom-article {
        background-color: #fff;
        padding: 100px;
    }

    .custom-title {
        font-size: 2rem;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .custom-content {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    article img {
        border-radius: 10px;
        width: 100%; 
        height: auto; 
        object-fit: cover; 
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    .custom-article h1 {
        color: #3a5676;
    }

    .custom-article h2, h3, h4, h5, h6 {
        margin-bottom: 1rem;
        text-align: left;
        color: #3a5676;
        font-weight: 400;
    }
    
    .custom-article h1 { font-size: 2rem; }
    .custom-article h2 { font-size: 1.75rem; }
    .custom-article h3 { font-size: 1.5rem; }
    .custom-article h4 { font-size: 1.25rem; }
    .custom-article h5 { font-size: 1rem; }
 
    .custom-article p {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 1rem;
        color: black;
    }

    /* Links */
    .custom-article a {
        font-family: 'Poppins', sans-serif;
        color: #5692B2;
        text-decoration: none;
    }

    .custom-article a:hover {
        text-decoration: underline;
    }

    .custom-article ul, .custom-article ol {
        margin-top: 20px; /* Espace au-dessus de la liste */
        margin-bottom: 20px; /* Espace en-dessous de la liste */
        padding-left: 20px; /* Indentation pour les listes */
        color: black; /* Assure que le texte des listes est noir */
    }

    .custom-article ul li, .custom-article ol li {
        margin-bottom: 10px; /* Espace entre les éléments */
        line-height: 1.8; /* Interligne augmenté */
        color: black; /* Assure que le texte des items est noir */
    }

    
    /* Related Articles Section */
    .related-articles {
        padding: 50px 0;
    }

    .related-articles .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .related-articles h2 {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px;
    }

    .related-articles .articles-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 cartes alignées */
        gap: 20px;
        justify-content: center;
    }

    .related-articles .article-card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0px 0px 14px rgba(86, 146, 178, 0.41); /* Ombre avec les nouveaux paramètres */
        overflow: hidden;
        display: flex;
        flex-direction: column;
        width: 320px; /* Largeur de la carte */
        height: 400px; /* Hauteur de la carte */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .related-articles .article-card:hover {
        transform: scale(1.05); /* Zoom au survol */
        box-shadow: 0px 0px 20px rgba(86, 146, 178, 0.5); /* Accentue l'ombre au survol */
    }



    .related-articles .article-thumbnail {
        width: 100%;
        height: 50%; /* L'image occupe la moitié de la carte */
        overflow: hidden;
    }

    .related-articles .article-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-articles .article-content {
        padding: 20px;
        height: 50%; /* Le contenu occupe l'autre moitié */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .related-articles .article-content h3 {
        font-size: 1.25rem;
        color: #333;
        margin-bottom: 10px;
    }

    .related-articles .article-content h3 a {
        text-decoration: none;
        color: inherit;
    }

    .related-articles .article-content h3 a:hover {
        text-decoration: underline;
    }

    .related-articles .article-content p {
        font-size: 0.9rem;
        color: #555;
    }

    .related-articles h2 {
        font-size: 2rem;
        font-weight: 400;
        text-align: left;
        margin-bottom: 40px;
    }
    .section-divider {
        width: 100%; /* Ligne pleine largeur du container */
        height: 2px; /* Ligne fine */
        background-color: #e0e0e0; /* Gris clair */
        border: none; /* Supprime les styles par défaut de <hr> */
        margin: 20px 0; /* Espacement au-dessus et en dessous */
    }

</style>

<main>
    <div class="container">

    <?php if (have_posts()): ?>

        <?php while(have_posts()): the_post(); ?>

        <article class="custom-article">
            <h1 class="custom-title"><?php the_title(); ?></h1>
            <div class="custom-content">
                <?php the_content(); ?>
            </div>
        </article>

        <?php endwhile; ?>

    <?php else: ?>
        <p>Pas d'articles</p>
    <?php endif; ?>

    </div>

    <!-- Related Articles Section -->
    <section class="related-articles">
    <div class="container">
        <hr class="section-divider"> <!-- Ligne de séparation -->
        <h2>Tu pourrais trouver ça utile</h2>
        <div class="articles-list">
            <?php
            // Query pour récupérer les articles des catégories spécifiques
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
                    <div class="article-card">
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

</main>

<?php get_footer(); ?>