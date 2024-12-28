<?php
/** Template Name: Header - Page */
get_header(); 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: black;
            margin: 0;
            padding-top: 80px;
        }

        .custom-navbar {
            background-color: #f5efeb;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .logo-image {
            height: 35px;
        }

        .nav-link {
            font-weight: 450;
            color: #3a5676;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #5692b2;
        }

        .btn {
            background-color: #ffb053;
            color: white;
            border-radius: 20px;
            padding: 0 20px;
            border: none;
            transition: background-color 0.3s ease;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn:hover {
            background-color: #dc9340;
        }

        /* Conteneur pour la barre de recherche et le bouton */
        .search-add-container {
            display: flex;
            align-items: center; /* Alignement vertical parfait */
            gap: 15px; /* Espacement entre les éléments */
        }

        .search-bar {
            width: 300px; /* Largeur fixe */
            height: 50px; /* Même hauteur que le bouton */
            padding: 0 15px;
            border-radius: 20px;
            border: 1px solid #ddd;
            font-size: 16px;
            margin-top: 10px; /* Marge plus grande pour descendre */
            line-height: normal;
        }

        @media (max-width: 768px) {
            .search-add-container {
                flex-direction: column; /* Éléments en colonne sur mobile */
                align-items: flex-start; /* Alignement à gauche */
                gap: 10px;
            }

            .search-bar {
                width: 100%; /* Barre de recherche pleine largeur */
                margin-top: 0;
            }

            .btn {
                width: 100%; /* Bouton pleine largeur */
            }
        }
    </style>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3 custom-navbar">
        <div class="container">
            <!-- Mobile Navbar -->
            <div class="mobile-navbar d-lg-none">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    &#9776;
                </button>
                <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logo/logo_monogramme.svg" alt="Cook It Yourself Monogram" class="logo-image">
                </a>
                <a href="<?php echo site_url('/parametres-du-compte'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/profil.svg" alt="Profile Icon" class="profile-image">
                </a>
            </div>

            <!-- Desktop Navbar -->
            <div class="collapse navbar-collapse" id="navbarContent">

                <a class="navbar-brand d-lg-flex d-none me-4" href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logo/logo_horizontal.svg" alt="Cook It Yourself Logo" class="logo-image">
                </a>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('/recettes'); ?>">Recettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('/trucs-et-astuces'); ?>">Trucs et Astuces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('/a-propos'); ?>">À Propos</a>
                    </li>
                </ul>

                <!-- Barre de recherche et bouton -->
                <div class="search-add-container">
                    <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                        <input class="form-control search-bar" type="search" placeholder="RECHERCHE DE RECETTES" name="s" aria-label="Search">
                    </form>
                    <a href="<?php echo site_url('/ajouter-une-recette'); ?>" class="btn">+ AJOUTER UNE RECETTE</a>
                </div>

                <a href="<?php echo site_url('/modifier-profil'); ?>" class="ms-auto">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/profil.svg" alt="Profile Icon" class="profile-image">
                </a>
            </div>
        </div>
    </nav>

    <?php wp_footer(); ?>
</body>
</html>
