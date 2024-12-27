<?php
/* Template Name: Parametres-compte */
get_header();
?>

<style> 
/* Sidebar Styles */
 
 .body-wrapper {
        display: flex;
        justify-content: flex-start; 
        align-items: stretch;
        height: 100vh; 
        padding: 0;
     }
      
 .sidebar {
        background-color: #EBF4E7;
        width: 250px;
        padding-top: 20px;
        padding-bottom: 20px;
        height: 100%; 
        position: fixed;
        left: 0;
        top: 0;
        box-shadow: none;
        border-radius: 0;
     }
      
      .main-content {
        margin-left: 250px;
        flex-grow: 1;
        padding: 50px;
        background-color: #fff;
        height: 100vh;
        overflow-y: auto;
      }
      
      .sidebar-title {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #3a5676;
      }
      
      .btn-deconnexion {
        display: block;
        margin: 20px auto;
        font-size: 1rem;
        color: black;
        text-align: center;
        text-decoration: underline;
        background: none;
        border: none;
        cursor: pointer;
      }
      
      .btn-deconnexion:hover {
        color: #e53935;
      }
      
      .sidebar ul {
        list-style-type: none;
        padding-left: 0;
      }
      
      .sidebar ul li {
        margin: 15px 0;
      }
      
      .sidebar-link {
        text-decoration: none;
        color: #333;
        font-weight: normal;
        padding: 10px;
        display: block;
        border-radius: 0;
      }
      
      .sidebar-link.active {
        background-color: white;
        color: #333;
        font-weight: 550;
      }
      
      .sidebar-link:hover {
        background-color: #D4E9D2;
      }
      
      .form-control {
        margin-bottom: 15px;
      }
      
      .btn-update {
        background-color: #5692B2;
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
      }
      
      .btn-update:hover {
        background-color: #3f6e87;
        transform: scale(1.05);
      }
      
      .btn-update:focus {
        outline: none;
      }
      
      .btn-password {
        background-color: #5692B2;
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
      }
      
      .btn-password:hover {
        background-color: #3f6e87;
        transform: scale(1.05);
      }
      
      .btn-password:focus {
        outline: none;
      }
      
      hr {
        border: 1px solid #5692B2;
        margin-top: 20px;
        margin-bottom: 20px;
      }
      
      h4.form-label {
        font-size: 1rem;
        color: black;
        font-weight: normal; 
        margin-bottom: 0.5rem; 
      }
      
      .account-form {
        margin-bottom: 40px;
      }
      
      .password-title {
        margin-top: 0;
      }
      
      #prenom {
        margin-bottom: 40px;
      }
      
      .publish-recipe {
        font-size: 1.2rem;
        color: black;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
        margin-bottom: 50px;
      }
      
      .publish-recipe p {
        margin-bottom: 0;
        color: black;
      } </style>
      
<div class="body-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="sidebar-title">Mon profil</h2>
        <a href="<?php echo wp_logout_url(); ?>" class="btn-deconnexion">Déconnexion</a>
        <aside>
            <ul>
                <li>
                    <a href="<?php echo get_permalink(get_page_by_path('modifier-profil')); ?>" class="sidebar-link">Modifier le profil</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink(get_page_by_path('parametres-compte')); ?>" class="sidebar-link active">Paramètres du compte</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink(get_page_by_path('mes-publications')); ?>" class="sidebar-link">Mes publications</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink(get_page_by_path('mes-enregistrements')); ?>" class="sidebar-link">Mes enregistrements</a>
                </li>
            </ul>
        </aside>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="profile-edit w-100">
            <h2 class="mb-4">Modifier le profil</h2>
            <hr class="my-4"> <!-- Ajoute une ligne horizontale avant le titre principal -->
    
            <div class="profile-container d-flex align-items-start mb-4">
                <!-- Section informations du profil -->
                <div class="info-section w-100">
                    <form class="account-form" method="POST" action="">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="alinadcruz@example.com" required>
                        </div>
                        
                        <h4 class="form-label mt-4">Mot de passe</h4>
                        <p>
                            La sécurité de ton compte est notre priorité. Si tu souhaites changer ton mot de passe, clique sur le bouton ci-dessous. 
                            Un lien de réinitialisation sera envoyé à ton adresse e-mail pour garantir la sécurité de ton compte.
                        </p> 
                        
                        <button type="submit" class="btn-password">Réinitialiser le mot de passe</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
