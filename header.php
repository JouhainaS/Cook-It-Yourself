<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <!-- Intégration du CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Intégration des styles personnalisés -->
    <style>
        /* Global Styles */
        body {
          font-family: 'Poppins', sans-serif; 
          background-color: white;
          color: black;
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
          background-color: #ffb053;
          color: white;
          border-radius: 20px;
          padding: 8px 20px;
          border: none;
          transition: background-color 0.3s ease;
        }
        
        .btn:hover {
          background-color: #dc9340;
        }
        
        /* Logo Styles */
        .logo-image {
          height: 35px;
        }
        
        /* Navbar Styles */
        .custom-navbar {
          background-color: #f5efeb;
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          z-index: 1000;
          padding-top: 10px;
          padding-bottom: 10px;
        }

        body {
          padding-top: 80px;
        }
        
        .nav-link {
          font-weight: 450;
          color: #3a5676;
        }
        
        .nav-link:hover {
          color: #3a5676;
          text-decoration: underline;
        }
        
        .dropdown-menu {
          background-color: white;
        }
        
        .dropdown-item {
          color: #3a5676;
        }
        
        .dropdown-item:hover {
          background-color: white;
          color: #5692B2;
        }

        /* Search Bar */
        .search-bar {
          width: 350px;
          padding: 8px 20px;
          border-radius: 20px;
          border: none;
          background-image: url('assets/icones/loupe.svg');
          background-repeat: no-repeat;
          background-position: 10px center;
          background-size: 20px 20px;
          padding-left: 50px;
        }
        
        .search-bar::placeholder {
          color: #5692B2;
        }

        /* Profile Icon */
        .profile-image {
          width: 35px;
          height: 35px;
          border-radius: 50%;
          object-fit: cover;
        }
    </style>
    
    <?php wp_head(); ?>
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
                            <li><a class="dropdown-item" href="#">Petit déjeuner</a></li>
                            <li><a class="dropdown-item" href="#">Déjeuner</a></li>
                            <li><a class="dropdown-item" href="#">Dîner</a></li>
                            <li><a class="dropdown-item" href="#">Dessert</a></li>
                            <li><a class="dropdown-item" href="#">Boissons</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-normal custom-link" href="trucs-et-astuces.html">TRUCS ET ASTUCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-normal custom-link" href="a-propos.html">À PROPOS</a>
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
    </nav>

    <?php wp_footer(); ?>
</body>
</html>
