Résumé du Projet - Gestion de Produits
Ce projet est une application de gestion de produits réalisée en PHP avec une connexion à une base de données MySQL. L'application permet de gérer des produits et leurs catégories associées. Voici un aperçu des principales fonctionnalités et fichiers du projet :

Fonctionnalités
Affichage de la liste des produits avec leurs noms, descriptions et catégories.
Possibilité d'ajouter un nouveau produit avec son nom, sa description et sa catégorie.
Possibilité de modifier un produit existant avec les nouvelles informations saisies.
Possibilité de supprimer un produit de la base de données.
Architecture du Projet
index.php : Fichier principal de l'application qui affiche la liste des produits, permet d'ajouter un nouveau produit et de supprimer un produit existant.
Views/editProduit.php : Page pour modifier un produit existant avec un formulaire pré-rempli.
Views/delProduit.php : Page de suppression d'un produit.
database/BDD.php : Classe de gestion de la connexion à la base de données.
Models/CategorieManager.php : Classe pour gérer les opérations liées aux catégories (récupération de toutes les catégories).
Models/ProduitManager.php : Classe pour gérer les opérations liées aux produits (récupération, ajout, modification et suppression de produits).
repositoryProduit.php : Classe pour insérer un nouveau produit dans la base de données.
Instructions d'utilisation
Assurez-vous d'avoir un serveur PHP et une base de données MySQL configurée correctement.
Importez le fichier de base de données fourni (si disponible) pour créer les tables "produits" et "categories".
Placez tous les fichiers du projet dans le répertoire de votre serveur web.
Ouvrez le fichier "index.php" pour accéder à l'application de gestion des produits.
Remarque
Ce résumé ne couvre que les principales fonctionnalités et fichiers du projet. Pour des détails spécifiques sur le code et son fonctionnement, veuillez consulter le code source complet dans les fichiers mentionnés ci-dessus. Assurez-vous également d'avoir configuré correctement la base de données pour que l'application fonctionne correctement.