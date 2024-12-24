<?php
/** Template Name: Single Recipe - Page */
get_header();
?>

<div class="recipe-page">
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>">Accueil</a> > <a href="<?php echo home_url('/recettes'); ?>">Rechercher</a> > <?php the_title(); ?>
    </div>

    <div class="recipe-header">
        <h1><?php the_title(); ?></h1>
        <div class="recipe-meta">
            <p class="author">Par <span class="author-name">COOK'S NAME</span></p>
            <p class="date">Publié le <?php echo get_the_date('j F Y'); ?></p>
        </div>
        <div class="rating">
            <?php
            $rating = get_post_meta(get_the_ID(), 'rating', true) ?: 4;
            for ($i = 1; $i <= 5; $i++) {
                echo $i <= $rating ? '<span class="star filled">&#9733;</span>' : '<span class="star">&#9734;</span>';
            }
            ?>
            <span class="rating-value">(<?php echo $rating; ?>)</span>
        </div>
    </div>

    <div class="recipe-image">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
        <?php endif; ?>
    </div>

    <div class="overview">
        <h2>Aperçu</h2>
        <p><?php echo wp_trim_words(get_the_content(), 50); ?></p>
    </div>

    <div class="recipe-details">
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/preparation-time.svg" alt="">
            <p>Temps de préparation</p>
            <span>10 mins</span>
        </div>
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/cooking-time.svg" alt="">
            <p>Temps de cuisson</p>
            <span>20 mins</span>
        </div>
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/total-time.svg" alt="">
            <p>Temps total</p>
            <span>30 mins</span>
        </div>
        <div class="detail">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/servings.svg" alt="">
            <p>Portions</p>
            <span>4</span>
        </div>
    </div>

    <div class="ingredients">
        <h2>Ingrédients</h2>
        <ul>
            <?php foreach (get_post_meta(get_the_ID(), 'ingredients', true) as $ingredient): ?>
                <li><?php echo $ingredient; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="chef-tips">
        <h2>Astuces du chef</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras magna morbi mi lectus erat.</p>
    </div>

    <div class="instructions">
        <h2>Instructions</h2>
        <ol>
            <?php foreach (get_post_meta(get_the_ID(), 'instructions', true) as $step): ?>
                <li><?php echo $step; ?></li>
            <?php endforeach; ?>
        </ol>
    </div>

    <div class="tags">
        <h2>Tags</h2>
        <div class="tag-list">
            <?php the_tags('<span class="tag">', '</span><span class="tag">', '</span>'); ?>
        </div>
    </div>
</div>

<style>
    .recipe-page {
        font-family: 'Poppins', sans-serif;
        color: #333;
        padding: 20px;
        background-color: #fff;
        max-width: 800px;
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
        margin-bottom: 10px;
        text-align: center;
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
        background-color: #f0f8ff;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .recipe-details {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        justify-content: space-around;
    }

    .recipe-details .detail {
        text-align: center;
        background-color: #fff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
    }

    .tags .tag:hover {
        background-color: #0056b3;
    }

    .chef-tips {
        background-color: #f8f0e3;
        padding: 15px;
        border-left: 4px solid #ffb53d;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .chef-tips h2 {
        margin-top: 0;
    }
</style>

<?php
get_footer();
?>
