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
        <section class="profile-edit w-100">
            <h2 class="mb-4">Mes Publications</h2>
            <hr class="my-4"> 

            <div class="grid-container">
                <?php
                $current_user = wp_get_current_user();

                $args = [
                    'post_type' => 'recipe',
                    'posts_per_page' => -1,
                    'author' => $current_user->ID
                ];
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $total_time = get_post_meta(get_the_ID(), 'total_time', true);
                        $rating = get_post_meta(get_the_ID(), 'rating', true) ?: 4;
                        ?>
                        <a href="<?php the_permalink(); ?>" class="card-link">
                            <div class="card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', ['class' => 'custom-img']); ?>
                                <?php else : ?>
                                    <div class="placeholder" style="height: 180px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #aaa;">Image indisponible</div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="recipe-meta">
                                        <span class="time">Temps total : <?php echo $total_time ?: 'N/A'; ?> min</span>
                                    </p>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $rating ? '<span class="star">&#9733;</span>' : '<span class="star">&#9734;</span>';
                                        } ?>
                                        <span class="rating-value">(<?php echo $rating; ?>)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
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

        </section>
    </div>
</div>

<style>
    .grid-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 20px;
    }

    .card {
        width: 260px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        text-decoration: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .card-title {
        text-decoration: none; 
        color: #2c3e50;
    }

    .card-title:hover {
        color: #5692B2; 
        text-decoration: none; 
    }
    .card-link {
        text-decoration: none; 
        color: inherit;
    }

    .recipe-meta {
        color: #000;
        font-size: 0.9rem;
        margin-bottom: 10px;
        font-weight: normal;
    }

    .recipe-meta .time {
        margin-top: 3px;
        display: block;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .rating .star {
        font-size: 1.2rem;
        color: #ffc107;
    }

    .rating .rating-value {
        font-size: 0.9rem;
        color: #555;
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