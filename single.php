<?php get_header(); ?>

<style>

    .article-page {
        font-family: 'Poppins', sans-serif;
        color: #333;
        padding: 20px;
        background-color: #fff;
        max-width: 1000px;
        margin: 0 auto;
        box-sizing: border-box;
    }

    .custom-title {
        font-size: 2rem;
        color: #3A5676;
        text-align: center;
        margin-bottom: 20px;
    }

    .custom-content h2 {
        font-size: 1.5rem;
        color: #3A5676;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: left;
    }

    .custom-content img {
        width: 100%;
        height: auto;
        object-fit: cover; 
        border-radius: 15px; 
        margin: 20px 0; 
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .related-articles .article-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }
    .related-articles .article-thumbnail {
            width: 100%;
            height: 50%;
            overflow: hidden;
        }

    .article-page ul,
    .article-page ol {
        margin-top: 20px; 
        margin-bottom: 20px;
        padding-left: 20px; 
    }

    .article-page ul li,
    .article-page ol li {
        margin-bottom: 10px; 
        line-height: 1.8; 
    }

    .related-articles .articles-list {
        display: flex; 
        flex-wrap: nowrap;
        gap: 15px; 
        overflow-x: auto;
        padding-bottom: 10px;
        scroll-snap-type: x mandatory; 
        max-width: 100%;
    }

    /* Styles individuels des cartes */
    .related-articles .article-card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0px 0px 14px rgba(86, 146, 178, 0.41);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        width: 280px; /* Largeur des cartes */
        height: 400px; /* Hauteur des cartes */
        margin-bottom: 20px; /* Ajoute un espace en dessous de chaque carte */
        scroll-snap-align: start; /* Aligne les cartes sur le conteneur */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .related-articles .article-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 0px 20px rgba(86, 146, 178, 0.5);
    }
    .related-articles .container {
        max-width: 1000px; /* Limite la largeur à 1000px */
        margin: 0 auto; /* Centre horizontalement le contenu */
        padding: 0 15px; /* Ajoute un peu d'espace sur les côtés */
    }

    /* Contenu dans les cartes */
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

    .related-articles h2 {
        font-size: 2rem;
        font-weight: 400;
        text-align: left;
        margin-bottom: 40px;
    }

    .related-articles .article-content p {
        font-size: 0.9rem;
        color: #555;
    }

    /* Scrollbar personnalisé */
    .related-articles .articles-list::-webkit-scrollbar {
        height: 8px; /* Taille de la scrollbar */
    }

    .related-articles .articles-list::-webkit-scrollbar-thumb {
        background: #5692B2; /* Couleur de la scrollbar */
        border-radius: 4px;
    }

    .related-articles .articles-list::-webkit-scrollbar-track {
        background: #ddd;
    }

    .section-divider {
        width: 100%; /* Ligne pleine largeur du container */
        height: 2px; /* Ligne fine */
        background-color: #e0e0e0; /* Gris clair */
        border: none; /* Supprime les styles par défaut de <hr> */
        margin: 20px 0; /* Espacement au-dessus et en dessous */
    }

    /* Responsive : ajustement en mobile */
    @media (max-width: 768px) {
        .related-articles .article-card {
            flex: 0 0 300px;
            height: 400px; /* Hauteur fixe en mobile */
        }

        .related-articles .article-thumbnail {
            height: 50%; /* L'image occupe la moitié de la carte */
        }

        .related-articles .article-content {
            height: 50%; /* Le contenu occupe l'autre moitié */
        }

        .related-articles .articles-list{
            margin-bottom: 30px;
        }
    }

</style>

<main class="article-page">
    <!-- Contenu principal de la page -->
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
</main>

<section class="related-articles">
    <div class="container">
        <hr class="section-divider">
        <h2>Tu pourrais trouver ça utile</h2>
        <div class="articles-list">
            <?php
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

<?php get_footer(); ?>
