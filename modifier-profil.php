<?php
/* Template Name: Modifier Profil - Page */

get_header(); ?>

<div class="body-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="sidebar-title">Mon profil</h2>
        <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn-deconnexion">Déconnexion</a>
        <aside>
            <ul>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('modifier-le-profil'))); ?>" 
                       class="sidebar-link <?php echo is_page('modifier-le-profil') ?  : 'active'; ?>">
                        Modifier le profil
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('parametres-du-compte'))); ?>" 
                       class="sidebar-link <?php echo is_page('parametres-du-compte') ? : ''; ?>">
                        Paramètres du compte
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('mes-publications'))); ?>" 
                       class="sidebar-link <?php echo is_page('mes-publications') ? : ''; ?>">
                        Mes publications
                    </a>
                </li>
            </ul>
        </aside>
    </div>

    <div class="main-content">
        <section class="profile-edit w-100">
            <h2 class="mb-4">Modifier le profil</h2>
            <hr class="my-4"> 
    
            <div class="profile-container d-flex align-items-start mb-4">
               
                <div class="info-section w-100">
                    <form method="post" action="">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $user_id = get_current_user_id();
                            if (!empty($_POST['prenom'])) {
                                update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['prenom']));
                            }
                            if (!empty($_POST['nom'])) {
                                update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['nom']));
                            }
                            if (!empty($_POST['apropos'])) {
                                update_user_meta($user_id, 'description', sanitize_textarea_field($_POST['apropos']));
                            }
                            echo '<div class="alert alert-success">Profil mis à jour avec succès.</div>';
                        }

                        $current_user = wp_get_current_user();
                        ?>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'first_name', true)); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'last_name', true)); ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="apropos" class="form-label">À propos de moi</label>
                            <textarea id="apropos" name="apropos" class="form-control" rows="4"><?php echo esc_textarea(get_user_meta($current_user->ID, 'description', true)); ?></textarea>
                        </div>
                        <button type="submit" class="btn-update">Mettre à jour le profil</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
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

hr {
    border: 1px solid #5692B2;
    margin-top: 20px;
    margin-bottom: 20px;
}
.body-wrapper {
    display: flex;
    justify-content: flex-start;
    align-items: stretch;
    min-height: 100vh; 
    position: relative; 
}

.sidebar {
    background-color: #EBF4E7;
    width: 250px;
    padding-top: 20px;
    padding-bottom: 20px;
    height: 100%; 
    position: absolute;
    left: 0;
    top: 0;
    z-index: 0; 
}

.main-content {
    margin-left: 250px;
    flex-grow: 1;
    padding: 50px;
    background-color: #fff;
    min-height: calc(100vh - 50px);
    z-index: 1; 
    position: relative;
}

footer {
    position: relative; 
    z-index: 10;
    background: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}
@media screen and (max-width: 768px) {
    .body-wrapper {
        flex-direction: column;
        justify-content: flex-start; 
        min-height: 100vh;
    }

    .main-content {
        margin: 0; 
        padding: 10px; 
    }

        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
            z-index: 1;
            box-shadow: none;
        }

        .sidebar ul li {
            text-align: center;
        }
    .profile-container {
        margin: 0;
        padding: 0;
    }

    .sidebar {
        margin: 0;
        padding: 0;
    }

    footer {
        margin-top: 20px; 
    }

}
    .main-content {
        margin-bottom: 100px; 
    }

    footer {
        position: relative; 
        margin-top: 50px; 
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }


</style>

<?php get_footer(); ?>