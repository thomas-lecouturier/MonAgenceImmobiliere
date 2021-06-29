# MonAgenceImmobiliere
* Création des controllers et des templates (route / + route /biens)
* Création de l' Entity Property et du Repository
  * méthode findLatest pour afficher les 4 derniers biens sur la page d'accueil
  * méthode findAllVisible pour afficher tout les biens non vendu (sold=false) sur la page Acheter
* slugify l'URL 
* Quand on clique sur un bien de la page d'accueil, on arrive sur sa page produit avec ses caracteristiques détaillés

## Back-office
* Crud property pour ajouter modifier ou supprimer un bien
* création d'un formulaire pour ajouter ou modifier un bien
* Création de contraintes de validation pour le formulaire d'ajout et de modification
* Sécurité et authentification pour se connecter au back office

## Front-office
* Paginer les biens (bundle paginator)
* Filtrer les biens avec une barre de recherche
* Gestion des options des biens
* Bundle Vich image uploader pour ajouter les photos des biens 
* Formulaire de contact
* Installation Webpack encore pour gerer le js et ouvrir le formulaire de contact quand on clique sur le bouton contacter l' agence