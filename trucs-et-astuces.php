<?php
/* Template Name: Trucs et Astuces */
get_header();
?>
<style>

.article h3,
.article-card .article-content h3 {
    color: #3a5676;
    margin: 10px 15px;
    font-size: 1.3rem;
}

.article h3 a,
.article-card .article-content h3 a {
    text-decoration: none;
    color: inherit;
}

.article h3 a:hover,
.article-card .article-content h3 a:hover {
    text-decoration: underline;
    color: #5692B2;
}

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
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.article h3 {
    color: #3a5676;
    margin: 10px 15px;
    font-size: 1.3rem;
}


.article:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.article img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}

.article p {
    font-size: 0.9rem;
    color: #555;
    margin: 0 15px 15px;
}

.astuces-section .article-card {
    display: flex;
    flex-direction: row; 
    align-items: stretch; 
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
    margin-bottom: 20px; 
}

.astuces-section .article-card:hover {
    transform: scale(1.02);
}

.astuces-section .article-thumbnail {
    flex: 0 0 40%; 
    max-width: 40%;
}

.astuces-section .article-thumbnail img {
    width: 100%;
    height: 100%; 
    object-fit: cover; 
    border-radius: 10px 0 0 10px; 
}

.astuces-section .article-content {
    flex: 1; 
    padding: 20px; 
    display: flex;
    flex-direction: column; 
    justify-content: center; 
}

.astuces-section .article-content h3 {
    font-size: 1.2rem;
    margin: 0 0 10px 0;
    color: #3a5676;
}

.astuces-section .article-content p {
    font-size: 1rem;
    color: #555;
    margin: 0;
}

.alternatives-vegetales-section .content-wrapper {
    display: flex;
    gap: 20px;
    align-items: flex-start;
    flex-wrap: wrap;
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

.stop-gaspillage-section .articles,
.materiels-section .articles {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.stop-gaspillage-section .article img,
.materiels-section .article img {
    height: 200px;
}

.materiels-section .articles {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.materiels-section .article img {
    height: 200px;
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
    }

    .articles {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .astuces-section .article-card {
        flex-direction: row;
    }

    .astuces-section .article-thumbnail {
        flex: 0 0 40%; 
    }

    .astuces-section .article-thumbnail img {
        height: 100%; 
    }

    .astuces-section .article-content {
        padding: 15px; 
    }

    .astuces-section .article-content h3 {
        font-size: 1rem;
    }

    .astuces-section .article-content p {
        font-size: 0.9rem;
    }

    .article img {
        height: 150px;
    }

    .stop-gaspillage-section .articles,
    .materiels-section .articles {
        display: flex;
        flex-wrap: nowrap; 
        overflow-x: auto; 
        gap: 15px; 
        scroll-snap-type: x mandatory;
        padding-bottom: 20px;
    }

    .stop-gaspillage-section .article,
    .materiels-section .article {
        flex: 0 0 300px;
        scroll-snap-align: start;
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
        border-left: none; 
        padding-left: 0;
    }

    .alternatives-vegetales-section .image-container {
        max-width: 100%; 
    }

    .alternatives-vegetales-section .image-container img {
        border-radius: 10px; 
        width: 100%; 
        height: auto; 
    }

    .alternatives-vegetales-section .articles-container {
        border-left: none; 
        padding-left: 0;
    }

    .alternatives-vegetales-section .articles-container .article {
        padding: 10px 0; 
        border-bottom: none;
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