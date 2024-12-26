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
    
    <section class="recipe-actions-section">
        <div class="container">
            <div class="recipe-actions">
                <!-- Bouton IMPRIMER -->
                <button class="print-button" onclick="printSpecificSections();">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/imprimer.svg" alt="Imprimer">
                    <span>IMPRIMER</span>
                </button>

                <!-- Partage sur les réseaux sociaux -->
                <div class="social-share">
                    <a href="#=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Partager sur TikTok">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/tiktok-vert.svg" alt="TikTok">
                    </a>
                    <a href="#=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Partager sur Pinterest">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/pinterest-vert.svg" alt="Pinterest">
                    </a>
                    <a href="#=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Partager sur Instagram">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/insta-vert.svg" alt="Instagram">
                    </a>
                    <a href="mailto:?subject=Découvrez cette recette&body=Voici une recette qui pourrait vous plaire : <?php echo get_permalink(); ?>" title="Envoyer par e-mail">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/mail-vert.svg" alt="E-mail">
                    </a>
                </div>
            </div>
        </div>
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
    text-align: center; 
    padding: 20px; 
}

.recipe-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.recipe-header .rating {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px; 
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



.recipe-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 15px;
}

.print-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    border: 1px solid #A8BAA7;
    border-radius: 20px;
    padding: 10px 20px;
    background-color: white;
    color: #A8BAA7;
    cursor: pointer;
    font-size: 1rem;
    text-transform: uppercase;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.print-button:hover {
    background-color: #EBF4E7;
    color: #3A5676;
}

.print-button img {
    width: 20px;
    height: 20px;
}

.social-share {
    display: flex;
    gap: 15px;
}

.social-share a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border: 1px solid #A8BAA7;
    border-radius: 50%;
    background-color: white;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.social-share a:hover {
    background-color: #EBF4E7;
    border-color: #3A5676;
}

.social-share img {
    width: 20px;
    height: 20px;
}

/* Section Détails */
.recipe-details {
    display: flex;
    justify-content: center;
    align-items: center; 
    background-color: #EBF4E7; 
    border-radius: 12px; 
    padding: 20px;
    gap: 20px; 
}

.recipe-details .detail {
    text-align: center;
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    justify-content: center; 
    padding: 10px;
    flex: 1; 
}

.recipe-details .detail img {
    height: 60px;
    margin-bottom: 10px; 
}

.recipe-details .detail p {
    font-size: 1rem;
    font-weight: bold; 
    margin: 5px 0; 
    color: #5692B2;
}

.recipe-details .detail span {
    font-size: 0.9rem; 
    color: #3A5676; 
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


@media (max-width: 768px) {
    .recipe-header h1 {
        font-size: 2rem;
    }

    .recipe-header .rating .star {
        font-size: 1.2rem;
    }

    .recipe-details {
        flex-wrap: wrap;
        gap: 30px;
    }

    .recipe-details .detail {
        width: 48%;
    }

    .social-share {
        display: flex;
        justify-content: center;
        gap: 10px; /* Réduction de l'espace entre les boutons */
        flex-wrap: wrap;
    }

    .social-share a {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-share img {
        width: 16px; 
        height: 16px;
    }

    .print-button {
        padding: 5px 10px; 
        font-size: 0.8rem; 
    }

    .add-review textarea {
        font-size: 0.9rem;
    }

    .add-review button {
        font-size: 0.9rem;
        padding: 8px 15px;
    }
}

@media print {
    /* Cache tout sauf la partie à imprimer */
    body * {
        visibility: hidden;
    }

    .recipe-page,
    .recipe-page * {
        visibility: visible;
    }

    .recipe-page {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    /* Ajuste la section des détails */
    .recipe-details {
        display: flex;
        justify-content: space-between; 
        gap: 10px;
        padding: 10px;
        background: none; 
        border: none; 
    }

    .recipe-details .detail {
        display: flex;
        flex-direction: row;
        gap: 5px;
        align-items: center;
    }

    .recipe-details .detail p {
        font-size: 0.9rem;
        font-weight: bold;
        color: #000;
        margin: 0;
    }

    .recipe-details .detail span {
        font-size: 0.9rem;
        color: #000;
    }

    /* Ajuste la section de l'image */
    .recipe-image img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    /* Cache les icônes dans la section des détails */
    .recipe-details .detail img {
        display: none;
    }

    /* Ajuste la section Description */
    .recipe-description p {
        font-size: 1rem;
        line-height: 1.4;
        margin-bottom: 10px;
    }

    /* Ajuste la section des astuces du chef */
    .chef-tips {
        border: none;
        padding: 10px;
        background: none;
    }

    .chef-tips h2 {
        font-size: 1.2rem;
        color: #000;
    }

    .chef-tips p {
        font-size: 1rem;
        line-height: 1.5;
    }
}

}



</style>

<script>
    function printSpecificSections() {
        const originalContent = document.body.innerHTML;

        // Sélection des sections désirées
        const header = document.querySelector('.recipe-header').outerHTML;
        const image = document.querySelector('.recipe-image').outerHTML;
        const details = document.querySelector('.recipe-details').cloneNode(true);
        const description = document.querySelector('.recipe-description').outerHTML;
        const ingredients = document.querySelector('.recipe-ingredients').outerHTML;
        const instructions = document.querySelector('.recipe-instructions').outerHTML;
        const tips = document.querySelector('.chef-tips').outerHTML;

        // Suppression des icônes dans les détails
        const detailIcons = details.querySelectorAll('img');
        detailIcons.forEach(icon => icon.remove());

        // Contenu imprimable
        const printableContent = `
            <div class="printable-recipe">
                ${header}
                ${image}
                ${description}
                ${details.outerHTML}
                ${ingredients}
                ${instructions}
                ${tips}
            </div>
        `;

        // Remplacement du contenu
        document.body.innerHTML = printableContent;

        // Impression
        window.print();

        // Restaurer le contenu original
        document.body.innerHTML = originalContent;
        location.reload();
    }
</script>

<?php
get_footer();
?>