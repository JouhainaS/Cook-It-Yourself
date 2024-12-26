<?php
/** Template Name: Single Recipe - Page */
get_header();
?>

<div class="recipe-page">
    
    <!-- Section Header -->
    <section class="recipe-header">
        <h1><?php the_title(); ?></h1>
        <div class="rating">
            <?php
            // Récupérer les commentaires approuvés pour cette recette
            $comments = get_comments([
                'post_id' => get_the_ID(),
                'status' => 'approve',
            ]);

            $total_rating = 0;
            $rating_count = 0;

            // Calculer la moyenne des notes
            foreach ($comments as $comment) {
                $rating = get_comment_meta($comment->comment_ID, 'rating', true);
                if ($rating) {
                    $total_rating += intval($rating);
                    $rating_count++;
                }
            }

            $average_rating = $rating_count > 0 ? round($total_rating / $rating_count, 1) : 0;

            // Afficher les étoiles en fonction de la moyenne des notes
            for ($i = 1; $i <= 5; $i++) {
                echo $i <= $average_rating ? '<span class="star filled">&#9733;</span>' : '<span class="star">&#9734;</span>';
            }
            ?>
            <span class="rating-value">(<?php echo $average_rating; ?> / 5)</span>
        </div>
        <div class="recipe-meta">
            <span class="author">Par <span class="author-name"> NOM DU CHEF</span></span>
            <span class="separator">|</span>
            <span class="date"><?php echo get_the_date('j F Y'); ?></span>
        </div>
    </section>

    <!-- Section Image -->
    <section class="recipe-image">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
        <?php endif; ?>
    </section>

    <!-- Section Description -->
    <section class="recipe-description">
        <h2>Description</h2>
        <p><?php echo wp_trim_words(get_the_content(), 50); ?></p>
    </section>

    <!-- Section Details -->
    <section class="recipe-details">
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/temps-preparation.svg" alt="">
            <p>Temps de préparation</p>
            <span>
                <?php
                $prep_time = get_post_meta(get_the_ID(), 'prep_time', true);
                echo !empty($prep_time) ? esc_html($prep_time) : 'N/A';
                ?>
            </span>
        </div>
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/temps-cuisson.svg" alt="">
            <p>Temps de cuisson</p>
            <span>
                <?php
                $cook_time = get_post_meta(get_the_ID(), 'cook_time', true);
                echo !empty($cook_time) ? esc_html($cook_time) : 'N/A';
                ?>
            </span>
        </div>
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/temps-total.svg" alt="">
            <p>Temps total</p>
            <span>
                <?php
                $prep_time_parts = explode(':', get_post_meta(get_the_ID(), 'prep_time', true));
                $cook_time_parts = explode(':', get_post_meta(get_the_ID(), 'cook_time', true));
                $prep_minutes = isset($prep_time_parts[0]) ? ((int)$prep_time_parts[0] * 60) + (int)$prep_time_parts[1] : 0;
                $cook_minutes = isset($cook_time_parts[0]) ? ((int)$cook_time_parts[0] * 60) + (int)$cook_time_parts[1] : 0;
                $total_minutes = $prep_minutes + $cook_minutes;
                echo $total_minutes > 0 ? $total_minutes . ' mins' : 'N/A';
                ?>
            </span>
        </div>
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/portions.svg" alt="">
            <p>Portions</p>
            <span>
                <?php
                $portions = get_post_meta(get_the_ID(), 'portions', true);
                echo !empty($portions) ? esc_html($portions) : 'N/A';
                ?>
            </span>
        </div>

    </section>

    <!-- Section Ingrédients -->
    <section class="recipe-ingredients">
        <h2>Ingrédients</h2>
        <ul>
            <?php 
            $ingredients = get_post_meta(get_the_ID(), 'ingredients', true);
            if (is_array($ingredients)) {
                foreach ($ingredients as $ingredient_data) {
                    $quantity = esc_html($ingredient_data['quantity'] ?? '');
                    $measure = esc_html($ingredient_data['measure'] ?? '');
                    $ingredient = esc_html($ingredient_data['ingredient'] ?? '');
                    echo '<li>' . $quantity . ' ' . $measure . ' ' . $ingredient . '</li>';
                }
            } else {
                echo '<li>Aucun ingrédient trouvé.</li>';
            }
            ?>
        </ul>
    </section>

    <section class="chef-tips">
        <h2>Astuces du chef</h2>
        <p>
            <?php 
            $tips = get_post_meta(get_the_ID(), 'tips', true);
            echo !empty($tips) ? esc_html($tips) : 'Aucune astuce fournie.';
            ?>
        </p>
    </section>

    <!-- Section Instructions -->
    <section class="recipe-instructions">
        <h2>Instructions</h2>
        <ol>
            <?php 
            $steps = get_post_meta(get_the_ID(), 'steps', true);
            if (is_array($steps)) {
                foreach ($steps as $step) {
                    echo '<li><p>' . esc_html($step) . '</p></li>';
                }
            } else {
                echo '<li><p>Aucune instruction trouvée.</p></li>';
            }
            ?>
        </ol>
    </section>

    <!-- Section Avis -->
    <section class="recipe-reviews">
    <h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/comment.svg" alt="Comment Icon" class="icon">
            Avis (<?php echo get_comments_number(); ?>)
        </h2>
        
        <!-- Formulaire d'ajout de commentaire -->
        <div class="add-review">
            <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post">
                <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" />
                
                <div class="rating">
                    <label for="rating">Votre évaluation : <span>(Requis)</span></label>
                    <div class="stars">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <input type="radio" id="star-<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" />
                            <label for="star-<?php echo $i; ?>" class="star">&#9733;</label>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="comment">
                    <label for="comment">Votre avis : <span>(Optionnel)</span></label>
                    <textarea id="comment" name="comment" placeholder="Partagez votre avis !"></textarea>
                </div>

                <button type="submit">Publier l'avis</button>
            </form>
        </div>

    <!-- Liste des commentaires -->
    <div class="comments-list">
        <?php
        $comments = get_comments([
            'post_id' => get_the_ID(),
            'status' => 'approve',
        ]);

        if ($comments) :
            foreach ($comments as $comment) :
                $rating = get_comment_meta($comment->comment_ID, 'rating', true);
        ?>
            <div class="comment-item">
                <div class="comment-header">
                    <span class="comment-author"><?php echo esc_html($comment->comment_author); ?></span>
                    <span class="comment-date"><?php echo date('d/m/Y', strtotime($comment->comment_date)); ?></span>
                </div>
                <div class="comment-body">
                    <?php if ($rating) : ?>
                        <div class="comment-rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $rating ? '<span class="star filled">&#9733;</span>' : '<span class="star">&#9734;</span>';
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    <p><?php echo esc_html($comment->comment_content); ?></p>
                </div>
            </div>
        <?php
            endforeach;
        else :
            echo '<p>Aucun avis pour le moment.</p>';
        endif;
        ?>
    </div>

    </section>

</div>

<style>

.recipe-page {
    font-family: 'Poppins', sans-serif;
    color: #333;
    padding: 20px;
    background-color: #fff;
    max-width: 1000px;
    margin: 0 auto;
    box-sizing: border-box;
}

.recipe-page h1,
.recipe-page h2,
.recipe-page h3,
.recipe-page h4,
.recipe-page h5,
.recipe-page h6 {
    margin-bottom: 20px;
    color: #3A5676;
}

.recipe-page h1 {
    font-size: 2.5rem;
    text-align: center;
}

.recipe-page h2 {
    font-size: 1.8rem;
    text-align: left;
}

.recipe-page p {
    font-size: 1rem;
    color: black;
    margin-bottom: 15px;
}

.recipe-page section {
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 8px;
    background-color: white;
    box-sizing: border-box;
}

/* Section recipe-header */ 
.recipe-header {
    text-align: center; /* Centrer le texte horizontalement */
    padding: 20px; /* Ajouter un peu de padding */
}

.recipe-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px; /* Espacement entre le titre et les autres éléments */
}

.recipe-header .rating {
    display: flex;
    justify-content: center; /* Centrer les étoiles et la note */
    align-items: center;
    gap: 5px; /* Espacement entre les étoiles et le texte */
    margin-top: 10px;
}

.recipe-header .rating .star {
    font-size: 1.5rem;
    color: #ddd;
}

.recipe-header .rating .star.filled {
    color: #A8BAA7;
}

.recipe-header .rating-value {
    font-size: 1rem;
    color: #333;
}

.recipe-header .recipe-meta {
    font-size: 0.9rem;
    color: #888;
    text-align: center; 
    margin-top: 10px;
}


/* Section Détails */
.recipe-details {
    display: flex;
    justify-content: center; /* Centrer les éléments horizontalement */
    align-items: center; /* Centrer les éléments verticalement */
    background-color: #EBF4E7; /* Fond vert clair */
    border-radius: 12px; /* Coins arrondis */
    padding: 20px; /* Espacement interne */
    gap: 20px; /* Espacement entre les éléments */
}

.recipe-details .detail {
    text-align: center; /* Centrer le contenu à l'intérieur de chaque détail */
    display: flex; /* Utiliser flexbox pour centrer verticalement */
    flex-direction: column; /* Empile les éléments verticalement */
    align-items: center; /* Centre les éléments horizontalement */
    justify-content: center; /* Centre les éléments verticalement */
    padding: 10px;
    flex: 1; /* Tous les détails occupent un espace égal */
}

.recipe-details .detail img {
    height: 60px;
    margin-bottom: 10px; /* Espacement entre l'image et le texte */
}

.recipe-details .detail p {
    font-size: 1rem; /* Taille de police pour le titre */
    font-weight: bold; /* Titre en gras */
    margin: 5px 0; /* Espacement vertical */
    color: #3A5676; /* Couleur sombre pour le titre */
}

.recipe-details .detail span {
    font-size: 0.9rem; /* Taille de police pour le sous-titre */
    color: #A8BAA7; /* Couleur douce pour les sous-titres */
}

/* Section Image */
.recipe-image img {
    width: 100%;
    height: auto;
    max-height: 500px; 
    border-radius: 12px;
    display: block;
    margin: 0 auto;
    object-fit: cover; 
}

/* Section Ingrédients */
.recipe-ingredients ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.recipe-ingredients ul li {
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
    font-size: 1rem;
    color: #333;
}

.recipe-ingredients ul li:last-child {
    border-bottom: none;
}

/* Section Instructions */
.recipe-instructions ol {
    list-style: none;
    padding: 0;
    margin: 0;
    counter-reset: step;
}

.recipe-instructions ol li {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
    padding-left: 40px;
}

.recipe-instructions ol li::before {
    content: counter(step);
    counter-increment: step;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 30px;
    height: 30px;
    font-size: 1rem;
    color: white;
    background-color: #5692B2;
    border-radius: 50%;
    flex-shrink: 0;
}

.recipe-instructions ol li p {
    margin: 0;
    font-size: 1rem;
    color: #333;
    line-height: 1.5;
}

/* Section Astuces du chef */
.chef-tips {
    background-color: white;
    border: 2px solid #A8BAA7;
    border-radius: 12px;
    padding: 20px;
    margin: 20px auto;
    text-align: left;
    max-width: 100%;

}

.chef-tips h2 {
    color: #A8BAA7;
    text-align: center;
    margin-bottom: 10px;
}


/* Section Avis */
.recipe-reviews {
    background-color: white;
    padding: 20px;
    margin-top: 30px;
    border-radius: 8px;
}

.recipe-reviews h2 .icon {
    height: 2rem;
    width: auto;
}

/* Section Commentaires */
.add-review {
    background-color: #EBF4E7;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.add-review form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.add-review label {
    font-size: 1rem;
    color: black;
}

.add-review textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    font-size: 1rem;
    min-height: 80px;
    border-radius: 10px;
}

.add-review button {
    background-color: #5692B2;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    cursor: pointer;
}

.add-review button:hover {
    background-color: #407899;
}

/* Liste des commentaires */
.comments-list .comment-item {
    padding: 15px;
    border-bottom: 1px solid #ddd;
}

.comments-list .comment-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.comments-list .comment-header .comment-author {
    font-size: 1rem;
    color: #333;
}

.comments-list .comment-header .comment-date {
    font-size: 0.9rem;
    color: #888;
}

.comments-list .comment-body p {
    color: #555;
}

/* Étoiles de notation */
.recipe-header .rating .star,
.comment-rating .star {
    font-size: 1.5rem;
    color: #ddd;
    transition: color 0.3s;
}

.recipe-header .rating .star.filled,
.comment-rating .star.filled {
    color: #A8BAA7;
}

.add-review .stars {
    display: flex;
    gap: 5px;
}

.add-review .stars input[type="radio"] {
    display: none;
}

.add-review .stars label {
    font-size: 1.5rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.3s;
}

.add-review .stars input[type="radio"]:checked ~ label,
.add-review .stars input[type="radio"]:checked ~ label ~ label {
    color: #A8BAA7;
}

/* Responsiveness */
@media (max-width: 1024px) {
    .recipe-details {
        flex-wrap: wrap;
    }

    .recipe-details .detail {
        flex: 1 1 calc(50% - 10px);
    }
}

@media (max-width: 768px) {
    .recipe-page {
        padding: 10px;
    }

    .recipe-details .detail {
        flex: 1 1 100%;
    }

    .recipe-header .rating .star {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .recipe-page h1 {
        font-size: 1.8rem;
    }

    .recipe-page h2 {
        font-size: 1.5rem;
    }

    .recipe-instructions ol li {
        padding-left: 20px;
    }

    .recipe-instructions ol li::before {
        width: 25px;
        height: 25px;
        font-size: 0.9rem;
    }

    .recipe-details .detail {
        flex: 1 1 100%;
    }

    .add-review .stars label {
        font-size: 1.2rem;
    }
}


</style>

<?php
get_footer();
?>
