<style>/* Global Styles */
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
 
 .footer-container {
    background-color: #3a5676;
    color: white;
    padding: 40px 20px;
  }
 
  .footer-container h5 {
    text-align: right;
    color: white;
  }
  .footer-logo {
    width: 120px;
    height: auto;
  }
 
  .footer-text {
    font-size: 14px;
    line-height: 1.5;
  }
 
  .footer-heading {
    margin-bottom: 10px;
  }
 
  .footer-link {
    color: white; 
    text-decoration: none;
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
  }
 
  .social-media a {
    text-decoration: none;
  }

 </style>
<?php /* Template Name: header*/ wp_footer(); ?>
    <footer class="footer-container">
                <div class="container">
                    <div class="row">
                        <!-- Section 1: Logo -->
                        <div class="col-md-2 text-center text-md-start">
                            <a href="#">
                                <img src="assets/logo/CIY vertical vert.svg" alt="Logo" class="footer-logo">
                            </a>
                        </div>
                        <!-- Section 2: Description -->
                        <div class="col-md-5 text-center text-md-start">
                            <p class="footer-text">
                                Cook'It Yourself : des recettes faciles et des astuces malines pour te lancer en cuisine sans stress ! 
                                Découvre, cuisine, et partage tes réussites avec d'autres étudiants.
                            </p>
                        </div>
                        <!-- Section 3: Navigation -->
                        <div class="col-md-2 text-center text-md-end">
                            <h5 class="footer-heading">ALLER À</h5>
                            <ul class="list-unstyled">
                                <li><a href="recettes.html" class="footer-link">Recettes</a></li>
                                <li><a href="articles.html" class="footer-link">Articles</a></li>
                                <li><a href="a-propos.html" class="footer-link">À propos</a></li>
                            </ul>
                        </div>
                        <!-- Section 4: Legal -->
                        <div class="col-md-3 text-center text-md-end">
                            <h5 class="footer-heading">SUPPORT JURIDIQUE</h5>
                            <ul class="list-unstyled">
                                <li><a href="conditions-utilisation.html" class="footer-link">Conditions d’utilisation</a></li>
                                <li><a href="politique-confidentialite.html" class="footer-link">Politique de confidentialité</a></li>
                                <li><a href="ajouter-recette.html" class="btn mt-3">+ AJOUTER UNE RECETTE</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <hr class="footer-line">
        
                    <!-- Bottom Footer -->
                    <div class="footer-bottom d-flex justify-content-between align-items-center">
                        <p class="mb-0">© 2024.Tous droits réservés.</p>
                        <div class="social-media d-flex">
                            <a href="#"><img src="assets/RS/tiktok_2.svg" alt="TikTok" class="social-icon"></a>
                            <a href="#"><img src="assets/RS/pinterset_2.svg" alt="Pinterest" class="social-icon"></a>
                            <a href="#"><img src="assets/RS/instagram_2.svg" alt="Instagram" class="social-icon"></a>
                            <a href="#"><img src="assets/RS/youtube_2.svg" alt="YouTube" class="social-icon"></a>
                        </div>
                    </div>
                </div>
            </footer>
</body>
</html>