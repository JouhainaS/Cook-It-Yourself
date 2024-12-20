
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <!-- Intégration du CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< Updated upstream
    

    <?php wp_head(); ?>
=======

    <?php /* Template Name: header*/ wp_head(); ?> 
>>>>>>> Stashed changes
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3 custom-navbar">
        <div class="container">
            <!-- Logo Section -->
            <a class="navbar-brand d-flex align-items-center me-4" href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/logo horizontal.svg" alt="Cook It Yourself Logo" class="logo-image me-2">
            </a>

            <!-- Toggle button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto">
                    <!-- Dropdown Menu for Recipe Categories -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            RECETTES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="petit-dejeuner.php">Petit déjeuner</a></li>
                            <li><a class="dropdown-item" href="dejeuner.php">Déjeuner</a></li>
                            <li><a class="dropdown-item" href="diner.php">Dîner</a></li>
                            <li><a class="dropdown-item" href="dessert.php">Dessert</a></li>
                            <li><a class="dropdown-item" href="boisson.php">Boissons</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-normal custom-link" href="trucs-et-astuces.php"> TRUCS ET ASTUCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-normal custom-link" href="about-page.php">À PROPOS</a>
                    </li>
                </ul>

                <!-- Search Bar -->
                <form class="d-flex align-items-center me-3">
                    <input class="form-control rounded-pill search-bar" type="search" placeholder="RECHERCHE DE RECETTES" aria-label="Search">
                </form>
                <!-- Add Recipe Button -->
                <a href="ajouter-recette.html" class="btn">+ AJOUTER UNE RECETTE</a>

                <!-- Profile Icon -->
                <div class="profile-icon d-flex align-items-center ms-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/profil.svg" alt="Profile Icon" class="profile-image">
                </div>
            </div>
        </div>
<<<<<<< Updated upstream
    </nav>
=======
    </nav>

    <?php get_footer();  // Inclut le pied de page du site ?>
</body>
</html>
>>>>>>> Stashed changes
