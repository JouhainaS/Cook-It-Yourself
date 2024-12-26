<?php
/** Template Name: Single Recipe - Page */
get_header();
?>

<div class="recipe-page">
    <div class="recipe-header">
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
            <span class="author">By <span class="author-name">COOK'S NAME</span></span>
            <span class="separator">|</span>
            <span class="date"><?php echo get_the_date('j F Y'); ?></span>
        </div>
        
    </div>

    <div class="recipe-image">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', ['class' => 'custom-img']); ?>
        <?php endif; ?>
    </div>

    <div class="overview">
        <h2>Description</h2>
        <p><?php echo wp_trim_words(get_the_content(), 50); ?></p>
    </div>

    <div class="recipe-details">
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
    </div>

    <div class="ingredients">
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
    </div>

    <div class="chef-tips">
        <h2>Astuces du chef</h2>
        <p>
            <?php 
            $tips = get_post_meta(get_the_ID(), 'tips', true);
            echo !empty($tips) ? esc_html($tips) : 'Aucune astuce fournie.';
            ?>
        </p>
    </div>

    <div class="instructions">
        <h2>Instructions</h2>
        <ol>
            <?php 
            $steps = get_post_meta(get_the_ID(), 'steps', true);
            if (is_array($steps)) {
                foreach ($steps as $step) {
                    echo '<li>' . esc_html($step) . '</li>';
                }
            } else {
                echo '<li>Aucune instruction trouvée.</li>';
            }
            ?>
        </ol>
    </div>

    <div class="tags">
        <h2>Tags</h2>
        <div class="tag-list">
            <?php
            $meal_types = get_post_meta(get_the_ID(), 'meal_types', true);
            $cook_types = get_post_meta(get_the_ID(), 'cook_types', true);
            $cuisines = get_post_meta(get_the_ID(), 'cuisines', true);
            $diets = get_post_meta(get_the_ID(), 'diets', true);

            $all_tags = [
                'Types de repas' => $meal_types,
                'Types de cuisson' => $cook_types,
                'Cuisines' => $cuisines,
                'Régimes alimentaires' => $diets
            ];

            foreach ($all_tags as $category => $tags) {
                if (is_array($tags)) {
                    echo '<strong>' . esc_html($category) . ':</strong> ';
                    foreach ($tags as $tag) {
                        echo '<span class="tag">' . esc_html($tag) . '</span> ';
                    }
                    echo '<br>';
                }
            }
            ?>
        </div>
    </div>

    <div class="recipe-reviews">
    <h2>Avis (<?php echo get_comments_number(); ?>)</h2>
    
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

</div>

<style>

    .recipe-page {
        font-family: 'Poppins', sans-serif;
        color: #333;
        padding: 20px;
        background-color: #fff;
        max-width: 1000px;
        margin: 0 auto;
    }


    .breadcrumb {
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 20px;
    }

    .recipe-header h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #3A5676; 
        margin-bottom: 10px;
        text-align: center;
    }

    h2 {
        font-size: 1.5rem; 
        color: #3A5676;
        margin-bottom: 15px; 
        font-weight: 400px; 
    }

    
    .recipe-header .author {
        font-size: 0.9rem;
        color: #888;
        text-align: center;
    }

    .recipe-header .rating {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 10px;
        justify-content: center;
    }

    .recipe-header .rating .star {
        font-size: 1.5rem;
        color: #ddd;
    }

    .recipe-header .rating .star.filled {
        color: #ffc107;
    }

    .recipe-image {
        margin: 20px 0;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
    }

    .overview {
        background-color: none; /* Supprime le fond bleu */
        padding: 15px; /* Conservez le padding si nécessaire */
        border-radius: 8px; /* Conservez les coins arrondis si nécessaire */
    }


    .recipe-details {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        justify-content: space-around;
        background-color: #EBF4E7; 
        border-radius: 12px; 
        padding: 20px; 
    }

    .recipe-details .detail {
        text-align: center;
        padding: 10px;
        flex: 1;
    }

    .recipe-details .detail img {
        height: 60px;
        margin-bottom: 10px;
    }

    .recipe-details .detail p {
        font-size: 0,8rem;
        font-weight: 400px;
        margin: 5px 0;
        color: black;
    }

    .recipe-details .detail span {
        font-size: 0.8rem;
        color: #A8BAA7;
    }

    .ingredients ul {
        list-style: none;
        padding: 0;
    }

    .ingredients ul li {
        padding: 5px 0;
        border-bottom: 1px solid #ddd;
    }

    .instructions ol {
        list-style: decimal inside;
        padding-left: 20px;
    }

    .tags .tag-list {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .tags .tag {
        background-color: white; 
        color: #A8BAA7; 
        padding: 5px 15px; 
        border-radius: 20px; 
        font-size: 0.9rem; 
        border: 1px solid #A8BAA7; 
        transition: background-color 0.3s, color 0.3s; 
    }

    .tags .tag:hover {
        background-color: #EBF4E7; 
        color: #A8BAA7; 
        border-color: #A8BAA7; 
    }


    .chef-tips {
        background-color: #F4EFEB; 
        padding: 20px;
        border-radius: 12px;
        border-left: 5px solid #FFB53D;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .chef-tips h2 {
        font-size: 1.8rem;
        color: #3A5676;
        margin-bottom: 15px;
        font-weight: 400px;
    }

    .chef-tips ul {
        list-style: disc inside;
        padding: 0;
        margin: 0; 
        color: #333;
        line-height: 1.8;
    }

    .chef-tips ul li {
        margin-bottom: 10px;
    }

    .recipe-content {
        display: flex;
        gap: 20px; /* Espacement entre "Ingrédients" et "Astuces du chef" */
        margin-bottom: 20px;
    }

    .recipe-content .ingredients,
    .recipe-content .chef-tips {
        flex: 1; /* Prend un espace égal */
    }


    .recipe-content .ingredients ul {
        list-style: none;
        padding: 0;
    }

    .recipe-content .ingredients ul li {
        padding: 5px 0;
        border-bottom: 1px solid #ddd;
    }

    .recipe-content .chef-tips {
        background-color: #f8f0e3;
        padding: 15px;
        border-left: 4px solid #ffb53d;
        border-radius: 8px;
    }

    .recipe-content .chef-tips h2 {
        margin-top: 0;
    }
    
    h2 {
        text-align: left; /* Aligne tous les titres <h2> à gauche */
        margin-bottom: 15px;
        font-size: 1.5rem; 
        font-weight: 400; 
    }

    .recipe-reviews {
        background-color: white;
        padding: 20px;
        margin-top: 30px;
        border-radius: 8px;
    }

    .recipe-reviews h2 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: #333;
    }

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

    .add-review label,
    .comments-list .comment-header .comment-author,
    .comments-list .comment-header .comment-date {
        font-size: 1rem;
        color: #555;
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
        color: #ffc107;
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

    .comments-list .comment-item {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .comments-list .comment-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .comments-list .comment-body p {
        color: #555;
    }

    .recipe-header .rating .star,
    .comment-rating .star {
        font-size: 1.5rem;
        color: #ddd;
        transition: color 0.3s;
    }

    .recipe-header .rating .star.filled,
    .comment-rating .star.filled {
        color: #ffc107;
    }

</style>

<?php
get_footer();
?>