<?php
/** Template Name: Footer - Page */
get_header(); 
?>
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

.footer-container {
    background-color: #3a5676;
    color: white;
    padding: 40px 20px;
}

.footer-container h5 {
    text-align: center;
    color: white;
}

.footer-logo-container {
    display: flex;
    align-items: center;
    justify-content: flex-start; 
}

.footer-logo {
    max-width: 100%;
    height: auto;
}

.footer-logo-mobile {
    display: none; 
}

.footer-text {
    font-size: 14px;
    line-height: 1.5;
    text-align: left;
}

.footer-heading {
    margin-bottom: 10px;
    text-align: center; 
}

.footer-link {
    color: white;
    text-decoration: none;
    text-align: center; 
    display: block; 
    margin: 0 auto; 
}

.footer-link:hover {
    text-decoration: underline;
}

.footer-line {
    border-color: white;
    margin: 20px 0;
}

.social-icon {
    height: 24px;
    margin-left: 10px;
}

.footer-bottom {
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.social-media a {
    text-decoration: none;
}

.footer-button-container {
    text-align: center; 
    margin-top: 15px;
}

.btn {
    display: inline-block; 
    background-color: #ffb053;
    color: white;
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 14px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #e0913e;
}

@media (max-width: 768px) {
    .footer-container {
        padding: 20px 15px;
        text-align: center;
    }

    .footer-logo-desktop {
        display: none; 
    }

    .footer-logo-mobile {
        display: block; 
        margin: 0 auto 15px; 
        width: 40px;
    }

    .footer-logo-container {
        justify-content: center;
    }

    .footer-text {
        font-size: 13px;
        line-height: 1.4;
        margin-bottom: 20px;
        text-align: center;
    }

    .footer-line {
        margin: 20px 0;
    }

    .footer-heading {
        font-size: 14px;
        margin-bottom: 10px;
        text-align: center;
    }

    .footer-link {
        font-size: 13px;
    }

    .footer-bottom {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        font-size: 12px;
    }

    .social-media {
        justify-content: center;
        margin-top: 10px;
    }

    .social-icon {
        margin: 0 5px;
    }
}
.custom-footer-wrapper {
    background-color: #3a5676;
    color: white;
    padding: 40px 20px;
}

.custom-footer-wrapper h5 {
    text-align: center;
    color: white;
}

.custom-footer-wrapper .footer-logo-container {
    display: flex;
    align-items: center;
    justify-content: flex-start; 
}

.custom-footer-wrapper .footer-logo {
    max-width: 100%;
    height: auto;
}

.custom-footer-wrapper .footer-logo-mobile {
    display: none; 
}

.custom-footer-wrapper .footer-text {
    font-size: 14px;
    line-height: 1.5;
    text-align: left;
}

.custom-footer-wrapper .footer-heading {
    margin-bottom: 10px;
    text-align: center; 
}

.custom-footer-wrapper .footer-link {
    color: white;
    text-decoration: none;
    text-align: center; 
    display: block; 
    margin: 0 auto; 
}

.custom-footer-wrapper .footer-link:hover {
    text-decoration: underline;
}

.custom-footer-wrapper .footer-line {
    border-color: white;
    margin: 20px 0;
}

.custom-footer-wrapper .social-icon {
    height: 24px;
    margin-left: 10px;
}

.custom-footer-wrapper .footer-bottom {
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.custom-footer-wrapper .social-media a {
    text-decoration: none;
}

.custom-footer-wrapper .footer-button-container {
    text-align: center; 
    margin-top: 15px;
}

.custom-footer-wrapper .btn {
    display: inline-block; 
    background-color: #ffb053;
    color: white;
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 14px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.custom-footer-wrapper .btn:hover {
    background-color: #e0913e;
}

/* Responsive */
@media (max-width: 768px) {
    .custom-footer-wrapper {
        padding: 20px 15px;
        text-align: center;
    }

    .custom-footer-wrapper .footer-logo-desktop {
        display: none; 
    }

    .custom-footer-wrapper .footer-logo-mobile {
        display: block; 
        margin: 0 auto 15px; 
        width: 40px;
    }

    .custom-footer-wrapper .footer-logo-container {
        justify-content: center;
    }

    .custom-footer-wrapper .footer-text {
        font-size: 13px;
        line-height: 1.4;
        margin-bottom: 20px;
        text-align: center;
    }

    .custom-footer-wrapper .footer-line {
        margin: 20px 0;
    }

    .custom-footer-wrapper .footer-heading {
        font-size: 14px;
        margin-bottom: 10px;
        text-align: center;
    }

    .custom-footer-wrapper .footer-link {
        font-size: 13px;
    }

    .custom-footer-wrapper .footer-bottom {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        font-size: 12px;
    }

    .custom-footer-wrapper .social-media {
        justify-content: center;
        margin-top: 10px;
    }

    .custom-footer-wrapper .social-icon {
        margin: 0 5px;
    }
}

</style>

<footer class="custom-footer-wrapper">
    <div class="container">
        <div class="row align-items-start">
            <!-- Section 1: Logo -->
            <div class="col-md-2 footer-logo-container">
                <a href="#" class="footer-logo-desktop">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/CIY_vertical_vert.svg" alt="Logo Desktop" class="footer-logo">
                </a>
                <a href="#" class="footer-logo-mobile">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/CIY_monogramme_vert.svg" alt="Logo Mobile" class="footer-logo">
                </a>
            </div>
            <!-- Section 2: Description -->
            <div class="col-md-5">
                <p class="footer-text">
                    Cook'It Yourself : des recettes faciles et des astuces malines pour te lancer en cuisine sans stress ! 
                    Découvre, cuisine, et partage tes réussites avec d'autres étudiants.
                </p>
            </div>
            <!-- Section 3: Navigation -->
            <div class="col-md-2">
                <h5 class="footer-heading">ALLER À</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo site_url('/recettes'); ?>" class="footer-link">Recettes</a></li>
                    <li><a href="<?php echo site_url('/trucs-et-astuces'); ?>" class="footer-link">Trucs et astuces</a></li>
                    <li><a href="<?php echo site_url('/a-propos'); ?>" class="footer-link">À propos</a></li>
                </ul>
            </div>
            <!-- Section 4: Legal -->
            <div class="col-md-3">
                <h5 class="footer-heading">SUPPORT JURIDIQUE</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo site_url('/mentions-legales'); ?>" class="footer-link">Conditions d’utilisation</a></li>
                    <li><a href="<?php echo site_url('/mentions-legales'); ?>" class="footer-link">Mentions légales</a></li>
                </ul>
                <div class="footer-button-container">
                    <a href="<?php echo site_url('/ajouter-une-recette'); ?>" class="btn">+ AJOUTER UNE RECETTE</a>
                </div>
            </div>
        </div>

        <hr class="footer-line">

        <!-- Bottom Footer -->
        <div class="footer-bottom">
            <p class="mb-0">© 2024. Tous droits réservés.</p>
            <div class="social-media">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/RS/tiktok_2.svg" alt="TikTok" class="social-icon"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/RS/pinterset_2.svg" alt="Pinterest" class="social-icon"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/RS/instagram_2.svg" alt="Instagram" class="social-icon"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/RS/youtube_2.svg" alt="YouTube" class="social-icon"></a>
            </div>
        </div>
    </div>
</footer>
