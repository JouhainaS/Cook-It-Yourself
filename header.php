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
    padding: 10px 0;
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
    gap: 10px;
}

.logo-image {
    height: 40px;
}

/* Menu */
.navbar-nav {
    display: flex;
    gap: 20px;
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
}

.navbar-nav a {
    color: #3a5676;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    transition: color 0.3s;
    display: inline-block;
    text-align: center;
}

.navbar-nav a:hover {
    color: #5692B2;
}

/* Search Bar */
.search-form {
    flex: 1;
    max-width: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 20px;
}

.search-bar {
    width: 100%;
    padding: 10px 20px;
    border-radius: 20px;
    border: 1px solid #ddd;
    background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icones/loupe.svg');
    background-repeat: no-repeat;
    background-position: 10px center;
    background-size: 20px;
    font-size: 0.9rem;
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
    padding: 10px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
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
    width: 40px;
    height: 40px;
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
        width: 200px;
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
