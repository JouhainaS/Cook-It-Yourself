<?php 
/** Template Name: Inscription - Page */
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

/* Restes des styles inchangés */
form h2 {
    font-size: 24px;
    color: #3a5676;
    margin-bottom: 20px;
}

form input[type="text"],
form input[type="email"],
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
            <h2>Inscription</h2>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="register">S'inscrire</button>
        </form>

        <div class="form-footer">
            <a href="<?php echo site_url('/connexion'); ?>">Déjà inscrit ? Connectez-vous</a>
        </div>

        <?php
        if (isset($_POST['register'])) {
            $username = sanitize_text_field($_POST['username']);
            $email = sanitize_email($_POST['email']);
            $password = $_POST['password'];

            if (!username_exists($username) && !email_exists($email)) {
                $user_id = wp_create_user($username, $password, $email);

                if (!is_wp_error($user_id)) {
                    wp_signon([
                        'user_login'    => $username,
                        'user_password' => $password,
                        'remember'      => true,
                    ]);
                    wp_safe_redirect(home_url());
                    exit;
                } else {
                    echo "<p class='error-message'>Erreur : " . $user_id->get_error_message() . "</p>";
                }
            } else {
                echo "<p class='error-message'>Le nom d'utilisateur ou l'email existe déjà.</p>";
            }
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>