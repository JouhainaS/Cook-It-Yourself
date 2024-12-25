<?php
/* Template Name: A Propos */
get_header();
?>

<style> 
.apropos-page body {
    font-family: 'Poppins', sans-serif;
    margin: ;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

.apropos-page main {
    padding: 40px 20px;
    max-width: 1200px;
    margin: auto;
    background-color: white;
}

.apropos-page h1 {
    font-size: 2.5rem;
    color: #3a5676;
    text-align: center;
    margin-top: 60px; 
    margin-bottom: 60px;
}

.apropos-page h2 {
    font-size: 2rem;
    color: #3a5676;
    margin-bottom: 15px;
    text-align: left;
}

.apropos-page h3 {
    font-size: 1.75rem;
    color: #5692B2;
    margin-bottom: 10px;
    text-align: left;
}

.apropos-page p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.8;
}

.apropos-page ul {
    list-style-type: disc;
    margin: 20px 0;
    padding-left: 40px;
}

.apropos-page ul li {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.apropos-page .btn {
    background-color: #ffb053;
    color: white;
    padding: 10px 20px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    display: inline-block;
    margin-top: 20px;
}

.apropos-page .btn:hover {
    background-color: #dc9340;
}

.apropos-page img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}


.apropos-page .intro, .what, .why, .together{
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
}

.apropos-page .together {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px; 
    margin-bottom: 40px;
}

.apropos-page .together-content {
    flex: 1;
    max-width: 50%;
}

.apropos-page .together-image {
    flex: 1; 
    max-width: 50%;
    display: flex;
    justify-content: center; 
}

.apropos-page .together img {
    max-width: 100%; 
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.apropos-page .objectif p {
    font-size: 1.2rem;
    font-weight: bold;
    text-align: center;
    color: #3a5676;
}

.apropos-page .objectif a {
    text-align: center;
    display: block;
    margin: 0 auto;
    margin-bottom: 40px; 
    max-width: 200px;
}

.apropos-page .img {
    box-shadow: 0px 1px 4px rgba(86, 146, 178, 0.45);
}

.apropos-page .container {
    padding: 20px;
    margin-top: 40px;
    background-color: #f5f5f5;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.container {
    max-width: 1200px;
    margin: 0 auto; 
    padding-left: 20px;
    padding-right: 20px;
}
.time-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px; 
    margin: 40px 0;
    text-align: center;
}

.time-box {
    flex: 1;
    max-width: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.time-box img {
    height: auto;
    max-height: 80px;
    width: auto; 
    margin-bottom: 10px; 
    border: none;
    box-shadow: none; 
}



.time-box h4 {
    font-size: 1.2rem;
    font-weight: bold;
    color: #8DA08D;
    margin-bottom: 5px;
}

.time-box p {
    font-size: 1rem;
    color: black;
    margin: 0;
}


/* Media Queries */
@media (max-width: 768px) {
    main {
        padding: 20px 10px;
    }

    h1 {
        font-size: 2rem;
    }

    h2 {
        font-size: 1.75rem;
    }

    h3 {
        font-size: 1.5rem;
    }

    p {
        font-size: 0.9rem;
    }

    .btn {
        padding: 8px 15px;
        font-size: 0.9rem;
    }

    .together {
        flex-direction: column; 
        text-align: center; 
    }

    .together-content, .together-image {
        max-width: 100%; 
    }
}
</style> 

<main class="apropos-page container"> 
<h1>Cook'It Yourself : la cuisine étudiante, fun et accessible</h1>

<div class="intro">
<h2>Hey ! 👋 Bienvenue sur Cook'It Yourself</h2>

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
  <div class="time-section">
    <div class="time-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/rapide.svg" alt="Rapide et efficace">
        <h4>Rapide et efficace</h4>
        <p>Des recettes prêtes en 20 minutes max.</p>
    </div>
    <div class="time-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/ttlemonde.svg" alt="Pour tout le monde">
        <h4>Pour tout le monde</h4>
        <p>Végé, végan ou petit budget, on a ce qu’il te faut.</p>
    </div>
    <div class="time-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/frigo.svg" alt="Trop pratique">
        <h4>Trop pratique</h4>
        <p>Cherche des idées avec les ingrédients qui traînent dans ton frigo.</p>
    </div>
</div>

</div>

<div class="together">
  <div class="together-content">
    <h3>Une communauté qui cuisine ensemble</h3>
    <p><strong>Ici, on cuisine ensemble !</strong>
    <br>Cook'It Yourself, c’est bien plus qu’une plateforme : c’est une communauté d’entraide. Partage tes recettes, note celles des autres, propose des variantes… bref, apporte ta touche perso !</p>
  </div>
  <div class="together-image">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/photos/cook-together.jpg" alt="Students cook together">
  </div>
</div>


<div class="objectif">
  <p> <strong>Alors, prêt(e) à te lancer ?</strong>
  <br>Bien manger, même avec un emploi du temps blindé et un budget serré, c’est possible. Avec Cook'It Yourself, la cuisine devient enfin accessible (et amusante !).</p>
  <a href="/inscription" class="btn" aria-label="S'inscrire pour rejoindre Cook'It Yourself">S'inscrire</a>
</div>
</main>

<?php get_footer(); ?>
