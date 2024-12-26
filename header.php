<?php
/** Template Name: Header - Page */

get_header(); // Charge le header du site WordPress
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
    
    <style>
/* Reset général */
*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

/* Header */
.custom-navbar {
    background-color: #f5efeb;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    padding: 15px 0; /* Augmentation de la hauteur du header */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.custom-navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo */
.navbar-brand {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo-image {
    height: 50px; /* Agrandir la taille du logo */
}

/* Menu */
.navbar-nav {
    display: flex;
    gap: 30px; /* Espacement plus large entre les liens */
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
}

.navbar-nav a {
    color: #3a5676;
    text-decoration: none;
    font-weight: 600; /* Texte légèrement plus gras */
    font-size: 1.2rem; /* Taille de police augmentée */
    transition: color 0.3s;
    text-align: center;
}

.navbar-nav a:hover {
    color: #5692B2;
}

/* Search Bar */
.search-form {
    flex: 1;
    max-width: 500px; /* Barre de recherche légèrement plus large */
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 30px; /* Espacement latéral augmenté */
}

.search-bar {
    width: 100%;
    padding: 15px 20px; /* Augmenter la hauteur et le padding */
    border-radius: 25px; /* Coins légèrement plus arrondis */
    border: 1px solid #ddd;
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icones/loupe.svg');
    background-repeat: no-repeat;
    background-position: 15px center; /* Ajustement de l'icône */
    background-size: 25px; /* Icône légèrement agrandie */
    font-size: 1rem; /* Texte légèrement plus grand */
    color: #5692B2;
    transition: box-shadow 0.3s ease;
}

.search-bar:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(86, 146, 178, 0.3);
}

/* Buttons */
.btn {
    background-color: #ffb053;
    color: #fff;
    border: none;
    padding: 15px 25px; /* Bouton plus large et plus haut */
    border-radius: 25px; /* Coins arrondis plus marqués */
    font-size: 1.2rem; /* Taille de texte augmentée */
    cursor: pointer;
    transition: background-color 0.3s ease;
    white-space: nowrap;
}

.btn:hover {
    background-color: #dc9340;
}

/* Profile Icon */
.profile-icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-icon img {
    width: 50px; /* Taille de l'icône augmentée */
    height: 50px; /* Taille de l'icône augmentée */
    border-radius: 50%;
    object-fit: cover;
}

/* Responsive Design */
@media (max-width: 768px) {
    .custom-navbar .container {
        flex-wrap: wrap;
    }

    .navbar-nav {
        display: none;
        flex-direction: column;
        background-color: #f5efeb;
        position: absolute;
        top: 70px;
        right: 0;
        width: 250px; /* Menu déroulant plus large */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-toggler {
        display: block;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .navbar-toggler.active + .navbar-nav {
        display: flex;
    }

    .search-form {
        margin: 10px 0;
    }
}
</style>



    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navbar -->
    <nav class="custom-navbar">
        <div class="container">
            <!-- Logo -->
            <a href="<?php echo home_url('/'); ?>" class="navbar-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/logo_horizontal.svg" alt="Cook It Yourself Logo" class="logo-image">
            </a>

            <!-- Menu -->
            <button class="navbar-toggler" onclick="this.classList.toggle('active')">☰</button>
            <ul class="navbar-nav">
                <li><a href="<?php echo site_url('/recettes'); ?>">Recettes</a></li>
                <li><a href="<?php echo site_url('/articles'); ?>">Articles</a></li>
                <li><a href="<?php echo site_url('/a-propos'); ?>">À propos</a></li>
            </ul>

            <!-- Search Bar -->
            <form class="search-form" method="get" action="<?php echo home_url('/'); ?>">
                <input class="search-bar" type="search" name="s" placeholder="Rechercher...">
            </form>

            <!-- Add Recipe Button -->
            <a href="<?php echo site_url('/ajouter-recette'); ?>" class="btn">+ AJOUTER UNE RECETTE</a>

            <!-- Profile Icon -->
            <div class="profile-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/profil.svg" alt="Profil">
            </div>
        </div>
    </nav>

    <?php wp_footer(); ?>
</body>
</html>
