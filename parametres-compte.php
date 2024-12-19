<?php
/* Template Name: A propos */
get_header();
?>

    <div class="body-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2 class="sidebar-title">Mon profil</h2>
            <a href="#" class="btn-deconnexion">Déconnexion</a>
            <aside>
                <ul>
                    <li><a href="modifier-profil.html" class="sidebar-link">Modifier le profil</a></li>
                    <li><a href="parametres-compte.html" class="sidebar-link active">Paramètres du compte</a></li>
                    <li><a href="mes-publications.html" class="sidebar-link">Mes publications</a></li>
                    <li><a href="mes-enregistrements.html" class="sidebar-link">Mes enregistrements</a></li>
                </ul>
            </aside>
        </div>

        <div class="main-content">
            <section class="profile-edit w-100">
                <h2 class="mb-4">Modifier le profil</h2>
                <hr class="my-4"> <!-- Ajoute une ligne horizontale avant le titre principal -->
        
                <div class="profile-container d-flex align-items-start mb-4">
                    <!-- Section informations du profil -->
                    <div class="info-section w-100">
                        <form class="account-form">
                    
                                <div class="col-md-6">
                                    <label for="E-mail" class="form-label"> E-mail</label>
                                    <input type="text" id="prenom" class="form-control" placeholder="alinadcruz@example.com">
                                </div>
                                
                                <h4 class="form-label">Mot de passe</h4> <!-- Ajout de la classe form-label -->
                                <p> La sécurité de ton compte est notre priorité. Si tu souhaites changer ton mot de passe, clique sur le bouton ci-dessous. Un lien de réinitialisation sera envoyé à ton adresse e-mail pour garantir la sécurité de ton compte.</p> 

                        </form>
                        <button type="submit" class="btn-password"> Réinitialiser le mot de passe </button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php get_footer(); ?>
