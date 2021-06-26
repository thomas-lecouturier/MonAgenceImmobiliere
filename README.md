# MonAgenceImmobiliere
Création des controllers et des templates (route / et route /biens)
Création de l' Entity Property et du repository avec une méthode findLatest pour afficher les 4 derniers biens sur la page d'accueil
et une méthode findAllVisible pour afficher tout les biens non vendu (sold=false) sur la page Acheter
slugify l'URL 
quand on clique sur un bien de la page d'accueil, on arrive sur sa page produit avec ses caracteristiques détaillés
Création du back-office et du crud property pour ajouter modifier ou supprimer un bien
création d'un formulaire pour ajouter ou modifier un bien
Création de contraintes de validation pour le formulaire d'ajout et de modification