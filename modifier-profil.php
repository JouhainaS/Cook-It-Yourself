<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="body-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2 class="sidebar-title">Mon profil</h2>
            <a href="#" class="btn-deconnexion">Déconnexion</a>
            <aside>
                <ul>
                    <li><a href="modifier-profil.html" class="sidebar-link active">Modifier le profil</a></li>
                    <li><a href="parametres-compte.html" class="sidebar-link">Paramètres du compte</a></li>
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
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" id="prenom" class="form-control" placeholder="Alina">
                                </div>
                                <div class="col-md-6">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" id="nom" class="form-control" placeholder="Dcruz">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="apropos" class="form-label">À propos de moi</label>
                                <textarea id="apropos" class="form-control" rows="4" placeholder="Parle-nous de toi"></textarea>
                            </div>
                            <button type="submit" class="btn-update">Mettre à jour le profil</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>