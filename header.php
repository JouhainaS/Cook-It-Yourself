<?php
/** Template Name: Header - Page */

get_header(); // Charge le header du site WordPress (fichier header.php)
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Global Styles */
        body {
          font-family: 'Poppins', sans-serif; 
          background-color: white;
          color: blue;
        }

        /* Styles des titres */
        h1, h2, h3, h4, h5, h6 {     
          font-family: 'Poppins', sans-serif;
          margin-bottom: 20px;
          text-align: left;
          color: #3a5676;
        }

        h1 { font-size: 2.5rem; }
        h2 { font-size: 2rem; }
        h3 { font-size: 1.75rem; }
        h4 { font-size: 1.5rem; }
        h5 { font-size: 1.25rem; }
        h6 { font-size: 1rem; }

        /* Buttons */
        .btn {
          background-color: #ffb053; /* Orange color for buttons */
          color: white;
          border-radius: 20px; /* Rounded corners for buttons */
          padding: 8px 20px;
          border: none;
          transition: background-color 0.3s ease; /* Smooth transition for hover */
        }

        .btn:hover {
          background-color: #dc9340; /* Darker orange on hover */
          color: white; /* Change text color on hover */
        }

        /* Logo Styles */
        .logo-image {
          height: 35px; /* Set height of the logo */
        }

        /* Navbar Styles */
        .custom-navbar {
          background-color: #f5efeb; /* Light beige background for navbar */
          position: fixed; /* Fixe la barre de navigation */
          top: 0; /* Placer le navbar en haut */
          left: 0; /* Alignement à gauche */
          right: 0; /* Alignement à droite */
          z-index: 1000; /* Assure que le navbar soit au-dessus du contenu */
          padding-top: 10px; /* Ajuste l'espacement du haut */
          padding-bottom: 10px; /* Ajuste l'espacement du bas */
        }

        /* Ajout d'un padding-top pour compenser l'espace que prend le navbar fixe */
        body {
          padding-top: 80px; /* Ajustez cette valeur en fonction de la hauteur de votre navbar */
        }

        .nav-link {
          font-weight: 450; /* Regular weight for links */
          color: #3a5676; /* Dark Blue for links */
        }

        .nav-link:hover {
          color: #3a5676; /* Keep color on hover */
          text-decoration: underline; /* Underline links on hover */
        }

        .dropdown-menu {
          background-color: white; /* White background for dropdown */
        }

        .dropdown-item {
          color: #3a5676; /* Dark blue for dropdown text */
        }

        .dropdown-item:hover {
          background-color: white; /* White background on hover */
          color: #5692B2; /* Dark blue color on hover */
        }

        /* Search Bar */
        .search-bar {
          width: 350px; /* Set width of the search bar */
          padding: 8px 20px;
          border-radius: 20px; /* Rounded corners for search bar */
          border: none; /* Remove border */
          background-image: url('assets/icones/loupe.svg'); /* Image de la loupe */
          background-repeat: no-repeat; /* Empêche la répétition de l'image */
          background-position: 10px center; /* Positionne l'icône à gauche */
          background-size: 20px 20px; /* Taille de l'icône */
          padding-left: 50px; /* Décale le texte à droite de l'icône */
        }

        .search-bar::placeholder {
          color: #5692B2; /* Couleur du texte dans le placeholder */
        }

        /* Profile Icon */
        .profile-image {
          width: 35px;
          height: 35px;
          border-radius: 50%; /* Circular profile icon */
          object-fit: cover;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- header -->
    <nav class="navbar navbar-expand-lg py-3 custom-navbar">
        <div class="container">
            <!-- Logo Section -->
            <a class="navbar-brand d-flex align-items-center me-4" href="<?php echo home_url(); ?>">
                <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        bloginfo('name');
                    }
                ?>
            </a>

            <!-- Toggle button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" 
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header',  // Enregistrez cette location dans functions.php
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto',
                    'fallback_cb' => false,  // Pas de menu par défaut
                ));
                ?>
            </div>

            <!-- Search Bar -->
            <form class="d-flex align-items-center me-3">
                <input class="form-control rounded-pill search-bar" type="search" placeholder="RECHERCHE DE RECETTES" aria-label="Search">
            </form>

            <!-- Add Recipe Button -->
            <a href="ajouter-recette.html" class="btn">+ AJOUTER UNE RECETTE</a>

            <!-- Profile Icon -->
            <div class="profile-icon d-flex align-items-center ms-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/profil.svg" alt="icone">

            </div>
        </div>
    </nav>

    <?php wp_footer(); ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

