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
                       class="sidebar-link <?php echo is_page('modifier-le-profil') ?  : ''; ?>">
                        Modifier le profil
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('parametres-du-compte'))); ?>" 
                       class="sidebar-link <?php echo is_page('parametres-du-compte') ? '' : ''; ?>">
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
                    $prep_time = get_post_meta(get_the_ID(), 'prep_time', true);
                    $cook_time = get_post_meta(get_the_ID(), 'cook_time', true);

                    $prep_minutes = !empty($prep_time) ? explode(':', $prep_time) : [0, 0];
                    $cook_minutes = !empty($cook_time) ? explode(':', $cook_time) : [0, 0];
                    $total_minutes = ($prep_minutes[0] * 60 + $prep_minutes[1]) + ($cook_minutes[0] * 60 + $cook_minutes[1]);

                    $formatted_time = $total_minutes > 0 
                        ? floor($total_minutes / 60) . 'h ' . ($total_minutes % 60) . 'min' 
                        : 'Non spécifié';

                    $rating = get_post_meta(get_the_ID(), 'rating', true) ?: 0;
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
                                <strong>Temps total :</strong> <?php echo $formatted_time; ?>
                            </p>
                           
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
            <a href="<?php echo get_permalink(get_page_by_path('ajouter-recette')); ?>" class="btn-update">+ AJOUTER UNE RECETTE</a>
        </div>
    </div>
</div>

<style>

.body-wrapper {
    flex-direction: column;
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

.sidebar-title {
    text-align: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #3a5676;
}

.btn-deconnexion {
    display: block;
    margin: 20px auto;
    font-size: 1rem;
    color: black;
    text-align: center;
    text-decoration: underline;
    background: none;
    border: none;
    cursor: pointer;
}

.btn-deconnexion:hover {
    color: #e53935;
}

.sidebar ul {
    list-style-type: none;
    padding-left: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar-link {
    text-decoration: none;
    color: #333;
    font-weight: normal;
    padding: 10px;
    display: block;
    border-radius: 0;
}

.sidebar-link.active {
    background-color: white;
    color: #333;
    font-weight: 550;
}

.sidebar-link:hover {
    background-color: #D4E9D2;
}

.main-content {
    margin-left: 250px;
    flex-grow: 1;
    padding: 20px;
    background-color: #fff;
    min-height: calc(100vh - 50px);
    z-index: 1; 
    position: relative;
}


footer {
    z-index: 10;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: auto; 
}

.grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px; 
}


.card {
    width: 260px;
    background-color: #fff;
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
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
}

.card-title a {
    text-decoration: none;
    color: #3A5676;
}

.card-title a:hover {
    text-decoration: underline;
    color: #5692B2;
}

.btn-update {
    background-color: #5692B2;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-update:hover {
    background-color: #3f6e87;
}

@media screen and (max-width: 768px) {
    .body-wrapper {
        flex-direction: column;
    }

    .sidebar {
        text-align: center;
        position: relative;
        width: 100%;
        height: auto; 
        z-index: 1;
        box-shadow: none;
    }

    .main-content {
        margin-left: 0;
        padding: 20px;
        padding-bottom: 80px; 
       

    }

    footer {
        position: relative; 
        margin-top: 50px; 
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }

    .grid-container {
        flex-direction: column;
        gap: 15px; 
        margin-bottom: 20px;
    }

    .card {
        width: 100%;
    }

    .btn-update {
        width: 100%; 
    }
}

</style>

<?php get_footer(); ?>