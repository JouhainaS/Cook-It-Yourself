<?php
/** Template Name: Connexion - Page */
get_header();
?>

<style>
html, body {
    height: 100%;
    margin: 0;
    overflow: hidden; /* Désactive le scroll */
}

.page-wrapper {
    height: 100%; /* Prend toute la hauteur de la fenêtre */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f8f8;
}

.form-wrapper {
    width: 400px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

form h2 {
    font-size: 24px;
    color: #3a5676;
    margin-bottom: 20px;
}

form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

form input:focus {
    border-color: #5692b2;
    box-shadow: 0 0 8px rgba(86, 146, 178, 0.5);
    outline: none;
}

form button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 30px;
    background-color: #5692b2;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #407899;
}

.form-footer {
    margin-top: 20px;
}

.form-footer a {
    text-decoration: none;
    color: #5692b2;
    font-size: 14px;
}

.form-footer a:hover {
    text-decoration: underline;
}

.error-message {
    color: #e53935;
    margin-bottom: 15px;
    font-size: 14px;
    text-align: left;
}
</style>

<div class="page-wrapper">
    <div class="form-wrapper">
        <form method="post" action="">
            <h2>Connexion</h2>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="login">Se connecter</button>
        </form>

        <div class="form-footer">
            <a href="<?php echo site_url('/inscription'); ?>">Pas encore inscrit ? Créez un compte</a>
            <br>
            <a href="<?php echo wp_lostpassword_url(); ?>">Mot de passe oublié ?</a>
        </div>

        <?php
        if (isset($_POST['login'])) {
            $creds = [
                'user_login'    => sanitize_text_field($_POST['username']),
                'user_password' => $_POST['password'],
                'remember'      => true,
            ];

            $user = wp_signon($creds, false);

            if (is_wp_error($user)) {
                echo "<p class='error-message'>Nom d'utilisateur ou mot de passe incorrect.</p>";
            } else {
                // Debugging redirection (optionnel, à retirer en production)
                error_log('POST: ' . print_r($_POST, true));
                error_log('GET: ' . print_r($_GET, true));

                // Gérer la redirection après connexion
                if (!empty($_GET['redirect_to'])) {
                    // Rediriger vers l'URL prévue
                    wp_safe_redirect(esc_url_raw($_GET['redirect_to']));
                } else {
                    // Rediriger vers la page d'accueil par défaut
                    wp_safe_redirect(home_url());
                }
                exit;
            }
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
