<?php
/* Template Name: A propos */
get_header();
?>

<h1>Cook'It Yourself : la cuisine étudiante, fun et accessible</h1>

<div class="intro">
  <h2>Hey ! Bienvenue sur Cook'It Yourself</h2>
  <h3>Une plateforme pour galérer moins en cuisine et manger mieux sans exploser ton budget.</h3>
  <p><strong>Pourquoi on fait tout ça ?</strong>
  <br>Parce qu’être étudiant, c’est jongler entre les cours, le boulot et les petits moyens. Cuisiner ne doit pas être une galère. On t’aide à bien manger tout en t’amusant, avec une communauté trop cool.</p>
</div>

<div class="what">
  <h3>C’est quoi Cook'It Yourself ?</h3>
  <p> <strong>Une cuisine simple et cool, à portée de clic.</strong>
  <br>On sait que la vie étudiante, c’est pas simple : peu de temps, peu de sous… et souvent pas d’idées. Cook'It Yourself, c’est une communauté où tu partages et trouves des idées pour te régaler sans te ruiner.</p>
</div>

<div class="why">
  <h3>Pourquoi tu vas kiffer ?</h3>
  <p><strong>Des solutions pour toutes les galères.</strong>
  <ul>
    <li>Rapide et efficace : Des recettes prêtes en 20 minutes max.</li>
    <li>Pour tout le monde : Végé, végan ou petit budget, on a ce qu’il te faut.</li>
    <li>Trop pratique : Cherche des idées avec les ingrédients qui traînent dans ton frigo.</li>
  </ul>
</div>

<div class="together">
  <h3>Une communauté qui cuisine ensemble</h3>
  <p><strong>Ici, on cuisine ensemble !</strong>
  <br>Cook'It Yourself, c’est bien plus qu’une plateforme : c’est une communauté d’entraide. Partage tes recettes, note celles des autres, propose des variantes… bref, apporte ta touche perso !</p>
  <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/cook-together.jpg" alt="Students cook together">
</div>

<div class="objectif">
  <h3>Notre objectif</h3>
  <p><strong>Alors, prêt(e) à te lancer ?</strong>
  <br>Bien manger, même avec un emploi du temps blindé et un budget serré, c’est possible. Avec Cook'It Yourself, la cuisine devient enfin accessible (et amusante !).</p>
  <a href="/inscription" class="btn" aria-label="S'inscrire pour rejoindre Cook'It Yourself">S'inscrire</a>
</div>

<div class="container">
  <?php echo do_shortcode(the_content()); ?>
</div>

<?php get_footer(); ?>
