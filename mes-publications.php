<?php
/* Template Name: Mes Publications - Page */

get_header(); ?>

<div class="body-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="sidebar-title">Mon profil</h2>
        <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn-deconnexion">Déconnexion</a>
        <aside>
            <ul>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('modifier-le-profil'))); ?>" 
                    class="sidebar-link <?php echo is_page('modifier-le-profil') ? : ''; ?>">
                    Modifier le profil
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('parametres-du-compte'))); ?>" 
                    class="sidebar-link <?php echo is_page('parametres-du-compte') ?  : ''; ?>">
                    Paramètres du compte
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('mes-publications'))); ?>" 
                    class="sidebar-link <?php echo is_page('mes-publications') ? 'active' : ''; ?>">
                    Mes publications
                    </a>
                </li>
            </ul>
        </aside>
    </div>

    <div class="main-content">
        <h2 class="mb-4">Mes Publications</h2>
        <hr class="my-4"> 

        <div class="grid-container">
            <?php
            $current_user = wp_get_current_user();

            $args = [
                'post_type' => 'recipe',
                'posts_per_page' => -1,
                'author' => $current_user->ID // Filtrer par l'auteur connecté
            ];
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    // Récupérer les métadonnées nécessaires
                    $prep_time = get_post_meta(get_the_ID(), 'prep_time', true); // Temps de préparation
                    $cook_time = get_post_meta(get_the_ID(), 'cook_time', true); // Temps de cuisson

                    // Conversion en minutes
                    $prep_minutes = !empty($prep_time) ? explode(':', $prep_time) : [0, 0];
                    $cook_minutes = !empty($cook_time) ? explode(':', $cook_time) : [0, 0];
                    $total_minutes = ($prep_minutes[0] * 60 + $prep_minutes[1]) + ($cook_minutes[0] * 60 + $cook_minutes[1]);

                    // Formater le temps total en heures et minutes
                    $formatted_time = $total_minutes > 0 
                        ? floor($total_minutes / 60) . 'h ' . ($total_minutes % 60) . 'min' 
                        : 'Non spécifié';

                    $rating = get_post_meta(get_the_ID(), 'rating', true) ?: 0; // Par défaut, note à 0
                    $author_name = get_the_author_meta('display_name', $current_user->ID);
                    ?>
                    <div class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'custom-img']); ?>
                        <?php else : ?>
                            <div class="placeholder" style="height: 180px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #aaa;">Image indisponible</div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p class="recipe-meta">
                                <strong>Par :</strong> <?php echo esc_html($author_name); ?>
                            </p>
                            <p class="recipe-meta">
                                <strong>Temps total :</strong> <?php echo $formatted_time; ?>
                            </p>
                            <div class="rating">
                                <strong>Note :</strong>
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <span class="star"><?php echo $i <= $rating ? '&#9733;' : '&#9734;'; ?></span>
                                <?php endfor; ?>
                                <span class="rating-value">(<?php echo $rating > 0 ? $rating : 'N/A'; ?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune publication trouvée.</p>';
            endif;
            ?>
        </div>

        <div class="publish-recipe d-flex align-items-center mb-4">
            <hr class="my-4"> 
            <p class="mb-0">Et si tu publiais une nouvelle recette ?</p>
            <a href="<?php echo get_permalink(get_page_by_path('ajouter-recette')); ?>" class="btn">+ AJOUTER UNE RECETTE</a>
        </div>
    <div>
</div>


<style>
    .main-content .grid-container {
    display: flex; 
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
    align-items: center;
}

.main-content .card {
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

.main-content .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.main-content .card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.main-content .card-body p {
    margin-bottom: 5px;
    font-size: 0.9rem;
    line-height: 1.4;
    color: #000;
}

.main-content .rating .star {
    font-size: 1.2rem;
    color: #A8BAA7; 
}

.main-content .rating .star.text-muted {
    color: #ddd;
}

.main-content .rating .rating-value {
    font-size: 0.9rem;
    color: #333; 
}

.main-content .card-title a {
    text-decoration: none;
    color: #3A5676;
}

.main-content .card-title a:hover {
    color: #5692B2; 
    text-decoration: underline;
}


    .body-wrapper {
        display: flex;
        justify-content: flex-start;
        align-items: stretch;
        min-height: 100vh; 
        position: relative;
    }

    .sidebar {
        background-color: #EBF4E7;
        width: 250px;
        padding-top: 20px;
        padding-bottom: 20px;
        height: 100%; 
        position: absolute; 
        left: 0;
        top: 0;
        z-index: 0; 
    }

    .main-content {
        margin-left: 250px;
        flex-grow: 1;
        padding: 50px;
        background-color: #fff;
        min-height: calc(100vh - 50px); 
        z-index: 1; 
        position: relative;
    }

    footer {
        position: relative; 
        z-index: 10;
        background: #333;
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }

    /* Responsive adjustments */
@media screen and (max-width: 768px) {
    .body-wrapper {
        flex-direction: column;
    }

    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
        z-index: 1;
        box-shadow: none;
    }

    .sidebar ul li {
        text-align: center;
    }

    .main-content {
        margin-left: 0;
        padding: 20px;
    }

    .profile-container {
        flex-direction: column;
    }

    .form-control {
        width: 100%;
    }

    .btn-update {
        width: 100%;
    }
}

</style>

<?php get_footer(); ?>