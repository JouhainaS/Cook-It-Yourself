// JavaScript pour la gestion de l'état actif de la sidebar
document.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', function() {
        // Retirer la classe 'active' de tous les liens
        document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
        
        // Ajouter la classe 'active' au lien cliqué
        this.classList.add('active');
    });
});
