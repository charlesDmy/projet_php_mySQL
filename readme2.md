# Mini-projet Resell de sneakers
 
Site internet de resell de sneakers.
 
## Fonctionnalités
 
### Front-office
-faire du cs sur les differentes pages (page d'accueil (index.php), page de la sneaker (page_detail.php) ...)


 
### Back-office
-creer un compte utilisateur (connexion, s'inscrire)
 
## Structure des données
 
une chaussure sera composée de :
 
- Modèle* : varchar (petite zone de texte)
- pointure : int
- Description* : texte(grande zone de texte)
- Image* : url varchar (petite zone de texte)
- id : int
* Champs obligatoires
 
## Etapes du projet
 
- Configuration de l'environnement de développement : vérifier configuration (xamp et visual studio), mise en place de l'arborescence, du fichier readme.md et du dépôt Git.
- Création de la BDD MySQL ainsi que les tables et les champs
- Création des pages PHP front-office
- Création des pages PHP back-office (si possible)
- Tests et recette : voir si les fonctionnalités prévues initialement sont présentes, faire des tests pour repérer les possibles bugs, optimisation du code, prise en compte de la sécurité.
- Mise en ligne (si possible)
 
## Script PHP - Page d'accueil
 
- 1) Connexion à la base de données
- 2) Requête SELECT de récupération les informations (musiques, articles, voitures, ...)
- 3) Boucler sur le résultat pour afficher chaque information.
- 4) Ajouter à la page les balise HTML standard
- 5) Mettre en forme la liste des informations

## Script PHP - Page détails