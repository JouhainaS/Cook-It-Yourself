<?php
/* Template Name: Trucs et Astuces */
get_header();
?>
<style>

.trucs-et-astuces-page {
    padding: 40px 20px;
    background-color: white;
}

.trucs-et-astuces-page h1 {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 40px;
    color: #3a5676;
}

.category-section {
    margin-bottom: 60px; 
}

.category-section h2 {
    text-align: left;
    font-size: 2rem;
    color: #5692B2;
    margin-bottom: 20px;
}

.articles {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.article {
    background-color: white;
    border-radius: 10px;
    box-shadow:0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.article:hover {
    transform: scale(1.05);
}

.article img {
    width: 100%;
    height: auto;
    display: block;
}

.alternatives-vegetales-section h3,
.astuces-section .article-content h3,
.stop-gaspillage-section .article h3,
.materiels-section .article h3{
    font-size: 1.25rem;
    color: #333;
    margin: 10px 15px;
}

.alternatives-vegetales-section h3 a,
.astuces-section .article-content h3 a,
.stop-gaspillage-section .article h3 a,
.materiels-section .article h3 a {
    text-decoration: none;
    color: inherit;
}

.alternatives-vegetales-section h3 a:hover,
.astuces-section .article-content h3 a:hover,
.stop-gaspillage-section .article h3 a:hover,
.materiels-section .article h3 a:hover {
    text-decoration: underline;
    color: #5692B2;
}

.article p {
    font-size: 0.9rem;
    color: #555;
    margin: 0 15px 15px;
}

.astuces-section .articles-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.astuces-section .article-card {
    display: flex;
    align-items: stretch;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
    margin-bottom: 10px;
}

.astuces-section .article-card:hover {
    transform: scale(1.02);
}

.astuces-section .article-thumbnail {
    flex: 1;
    max-width: 33.33%;
    overflow: hidden;
}

.astuces-section .article-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px 0 0 10px;
}

.astuces-section .article-content {
    flex: 2;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.article-meta {
    display: flex;
    gap: 10px;
    font-size: 0.9rem;
    color: #777;
    margin-top: auto;
}

.article-meta .author,
.article-meta .date {
    font-style: italic;
}

.article-meta .date {
    color: #555;
}

.alternatives-vegetales-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 60px;
}

.alternatives-vegetales-section .content-wrapper {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.alternatives-vegetales-section .image-container {
    flex: 1;
    max-width: 33.33%;
}

.alternatives-vegetales-section .image-container img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.alternatives-vegetales-section .articles-container {
    flex: 2;
    display: flex;
    flex-direction: column;
    border-left: 1px solid #ddd;
    padding-left: 20px;
}

.alternatives-vegetales-section .article {
    padding: 15px 20px;
    border-bottom: 1px solid #ddd;
}

.alternatives-vegetales-section .article:last-child {
    border-bottom: none;
}

.stop-gaspillage-section .articles,
.materiels-section .articles {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 60px;
}

.stop-gaspillage-section .article,
.materiels-section .article {
    background-color: white;
    border-radius: 15px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow:0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stop-gaspillage-section .article:hover,
.materiels-section .article:hover {
    transform: scale(1.03);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.stop-gaspillage-section .article img,
.materiels-section .article img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

@media (max-width: 768px) {
    .trucs-et-astuces-page {
        padding: 20px;
    }

    .trucs-et-astuces-page h1 {
        font-size: 2rem;
    }

    .category-section h2 {
        font-size: 1.5rem;
        margin-bottom: 15px;
    }

    .articles {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .article {
        margin: 0 auto;
    }

    .articles-list {
        display: flex;
        flex-direction: column;
        gap: 20px; 
    }

    .article-card {
        flex-direction: column; 
        height: auto; 
        margin: 0 auto;
    }

    .article-thumbnail {
        width: 100%; 
        height: auto;
    }

    .article-thumbnail img {
        width: 100%;
        height: auto; 
        object-fit: cover;
    }

    .article-content {
        padding: 15px;
        text-align: center;
    }

    .article-content h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .article-content p {
        font-size: 0.9rem;
        color: #555;
    }

    .astuces-section .article-card {
        display: flex;
        flex-direction: row; 
        align-items: stretch;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 0;
        height: 0px; 
    }

    .astuces-section .article-thumbnail {
        flex: 0 0 33.33%; 
        max-width: 33.33%;
        height: 100%; 
        overflow: hidden;
    }

    .astuces-section .article-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .astuces-section .article-content {
        flex: 1; 
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between; 
        height: 100%; 
    }

    .stop-gaspillage-section .articles,
    .materiels-section .articles {
        display: flex;
        flex-wrap: nowrap; 
        overflow-x: auto; 
        gap: 15px; 
        padding-bottom: 10px; 
        scroll-snap-type: x mandatory;
    }

    .stop-gaspillage-section .article,
    .materiels-section .article {
        flex: 0 0 300px; 
        height: auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden; 
        scroll-snap-align: start; 
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .stop-gaspillage-section .article img,
    .materiels-section .article img {
        width: 100%;
        height: 150px;
        object-fit: cover; 
        border-bottom: 1px solid #ddd;
    }

    .alternatives-vegetales-section h3,
    .astuces-section .article-content h3,
    .stop-gaspillage-section .article h3,
    .materiels-section .article h3 {
        font-size: 1.2rem;
        margin: 10px 15px;
        color: #333;
    }

    .alternatives-vegetales-section h3 a,
    .astuces-section .article-content h3 a,
    .stop-gaspillage-section .article h3 a,
    .materiels-section .article h3 a {
        text-decoration: none;
        color: inherit;
    }

    .alternatives-vegetales-section h3 a:hover,
    .astuces-section .article-content h3 a:hover,
    .stop-gaspillage-section .article h3 a:hover,
    .materiels-section .article h3 a:hover {
        text-decoration: underline;
        color: #5692B2;
    }

    .alternatives-vegetales-section p,
    .astuces-section .article-content p 
    .stop-gaspillage-section .article p,
    .materiels-section .article p {
        font-size: 0.9rem;
        color: #555;
        margin: 10px 15px 15px;
    }

    .stop-gaspillage-section .articles::-webkit-scrollbar,
    .materiels-section .articles::-webkit-scrollbar {
        height: 8px;
    }

    .stop-gaspillage-section .articles::-webkit-scrollbar-thumb,
    .materiels-section .articles::-webkit-scrollbar-thumb {
        background: #5692B2;
        border-radius: 4px;
    }

    .stop-gaspillage-section .articles::-webkit-scrollbar-track,
    .materiels-section .articles::-webkit-scrollbar-track {
        background: #ddd;
    }


    .alternatives-vegetales-section .content-wrapper {
        flex-direction: column;
        gap: 10px;
    }

    .alternatives-vegetales-section .image-container {
        max-width: 100%;
    }

    .alternatives-vegetales-section .articles-container {
        padding-left: 0;
        border-left: none;
    }

    .article img {
        height: 150px;
    }

    .stop-gaspillage-section .article img,
    .materiels-section .article img {
        height: 150px;
    }
}

</style>

<main class="trucs-et-astuces-page">
    <div class="container">
        <h1>Trucs et Astuces</h1>

        <section class="category-section astuces-section">
            <h2>Quelques Astuces</h2>
            <div class="articles-list">
                <?php
                $query_astuces = new WP_Query(array(
                    'category_name' => 'astuces', // Slug de la catégorie
                    'posts_per_page' => 5, // Nombre d'articles
                ));
                if ($query_astuces->have_posts()) :
                    while ($query_astuces->have_posts()) : $query_astuces->the_post();
                ?>
                        <div class="article-card">
                            <div class="article-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="article-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>Aucun article trouvé dans cette catégorie.</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>


        <section class="category-section stop-gaspillage-section">
            <h2>Et si on évitait de gaspiller ?</h2>
            <div class="articles">
                <?php
                $query_gaspillage = new WP_Query(array(
                    'category_name' => 'stop-au-gaspillage', // Slug de la catégorie
                    'posts_per_page' => 6, // Affiche jusqu'à 6 articles
                ));
                if ($query_gaspillage->have_posts()) :
                    while ($query_gaspillage->have_posts()) : $query_gaspillage->the_post();
                ?>
                        <div class="article">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>Aucun article trouvé dans cette catégorie.</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>


        <!-- Section 3 : Alternatives Végétales -->
        <section class="category-section alternatives-vegetales-section">
            <!-- Titre de la section -->
            <h2>Cuisine malin avec des alternatives végétales</h2>

            <!-- Contenu : Image à gauche et articles à droite -->
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/articles/alternatives-végétales.jpg" alt="Alternatives végétales">
                </div>
                <div class="articles-container">
                    <?php
                    $query_vegetales = new WP_Query(array(
                        'category_name' => 'alternatives-vegetales', // Slug de la catégorie
                        'posts_per_page' => 3,
                    ));
                    if ($query_vegetales->have_posts()) :
                        while ($query_vegetales->have_posts()) : $query_vegetales->the_post();
                    ?>
                            <div class="article">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                    <?php
                        endwhile;
                    else :
                        echo '<p>Aucun article trouvé dans cette catégorie.</p>';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

        <!-- Section 4 : Matériels -->
        <section class="category-section materiels-section">
            <h2>Pas de Matériel ? Pas de Panique !</h2>
            <div class="articles">
                <?php
                $query_materiels = new WP_Query(array(
                    'category_name' => 'materiels', // Slug de la catégorie
                    'posts_per_page' => 6, // Affiche jusqu'à 6 articles
                ));
                if ($query_materiels->have_posts()) :
                    while ($query_materiels->have_posts()) : $query_materiels->the_post();
                ?>
                        <div class="article">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>Aucun article trouvé dans cette catégorie.</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>