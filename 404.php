<?php 
    /* Template Name: 404 */
get_header(); ?>

<div class="container text-center" style="padding: 100px 20px;">
    <!-- Image -->
    <div style="margin: 20px 0;">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/404.svg" alt="404 Image" style="max-width: 100px; height: auto;">
    </div>

    <h1>OUPS ! Perdu ?</h1>
    <p>Et si tu retournais en page d'accueil</p>

    <!-- Lien vers la page d'accueil -->
    <a href="<?php echo home_url('/'); ?>" style="text-decoration: none; color: #fff; background-color: #5692B2; padding: 10px 20px; border-radius: 5px;">
        Retourner à la page d'accueil
    </a>
</div>

<?php get_footer(); ?>
