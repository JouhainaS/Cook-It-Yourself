<?php
/** Template Name: Header - Page */

get_header(); // Charge le header du site WordPress (fichier header.php)
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
    
    <!-- Intégration du CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
 *,
 *::before,
 *::after {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
 }
 
 body {
   font-family: 'Poppins', sans-serif;
   background-color: white;
   color: black;
   margin: 0;
   padding: 0;
   padding-top: 80px;
 }
 
 /* Typography & General Layout */
 h1, h2, h3, h4, h5, h6 {
   margin-bottom: 1rem;
   text-align: left;
   color: #3a5676;
   font-weight: 400;
 }
 
 h1 { font-size: 2.5rem; }
 h2 { font-size: 2rem; }
 h3 { font-size: 1.75rem; }
 h4 { font-size: 1.5rem; }
 h5 { font-size: 1.25rem; }
 h6 { font-size: 1rem; }
 
 /* Header (Navbar) Styles */
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
 
 .navbar-toggler {
   border: none;
   background: none;
 }
 
 .nav-link {
   font-weight: 450;
   color: #3a5676;
   text-align: center;
   transition: color 0.3s ease;
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
 
 
 .search-bar {
   width: 350px;
   padding: 8px 20px;
   border-radius: 20px;
   border: none;
   background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icones/loupe.svg');
   background-repeat: no-repeat;
   background-position: 10px center;
   background-size: 20px 20px; /* Assurez-vous que la taille est correcte */
   padding-left: 50px;
   font-size: 0.9rem;
   color: #5692B2;
 }

 .search-bar::placeholder {
   color: #5692B2;
 }


 .search-bar:focus {
   outline: none;
   box-shadow: 0 0 10px rgba(86, 146, 178, 0.5);
 }
 
 .profile-image {
   width: 35px;
   height: 35px;
   border-radius: 50%;
   object-fit: cover;
 }
  /* Media Queries */
  @media (max-width: 768px) {
     .search-bar {
        width: 250px;
        font-size: 1rem;
     }
      
     .btn {
        padding: 6px 15px;
     }
      
     .profile-image {
        width: 30px;
        height: 30px;
     }
  
     .hero-section h1 {
        font-size: 2rem;
     }
     
     .top-rated-recipes .row {
        flex-direction: column;
        align-items: center;
        gap: 20px;
     }
  
     .article-card {
        flex-direction: column;
        width: 100%;
     }
  
     .article-card img {
        width: 100%;
        height: 200px;
     }
  
     .category-btn {
        width: 120px;
        height: 160px;
     }
  
     .category-btn span {
        font-size: 1rem;
     }
  
     .navbar-brand .logo-image {
        height: 30px;
     }
  
     .profile-image {
        width: 25px;
        height: 25px;
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
            <!-- Logo Section -->
            <a class="navbar-brand d-flex align-items-center me-4" href="<?php echo home_url('/'); ?>">
                <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else {
                    // Affiche le logo par défaut si aucun logo personnalisé n'est défini
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logo/logo_horizontal.svg" alt="Cook It Yourself Logo" class="logo-image me-2">
                    <?php
                }
                ?>
            </a>

            <!-- Toggle button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary_menu', // Nom de l'emplacement défini dans functions.php
                    'container'      => false,         // Pas de conteneur HTML
                    'menu_class'     => 'navbar-nav me-auto', // Classes CSS personnalisées
                    'fallback_cb'    => false          // Pas de menu par défaut
                ));
                ?>
            </div>

            <!-- Search Bar -->
            <form role="search" method="get" class="d-flex align-items-center me-3" action="<?php echo home_url('/'); ?>">
                <input class="form-control rounded-pill search-bar" type="search" placeholder="RECHERCHE DE RECETTES" name="s" aria-label="Search">
            </form>

            <!-- Add Recipe Button -->
            <a href="<?php echo site_url('/ajouter-recette'); ?>" class="btn">+ AJOUTER UNE RECETTE</a>

            <!-- Profile Icon -->
            <div class="profile-icon d-flex align-items-center ms-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icones/profil.svg" alt="Profile Icon" class="profile-image">
            </div>
        </div>
    </nav>

    <?php wp_footer(); ?>
</body>
</html>
