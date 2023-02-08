Formulaire ID de Aaron Amani

Ce programme permet de vérifier l'existence d'un compte dans une base de données et d'ajouter un compte s'il n'existe pas.

Fonctionnement : 

Lorsqu'un utilisateur entre un identifiant et un mot de passe, le programme vérifie s'il existe un compte correspondant dans la base de données. Si oui, l'utilisateur est connecté. Sinon, l'utilisateur peut choisir d'ajouter un nouveau compte en remplissant à nouveau le formulaire et en cliquant sur "Ajout d'un compte", 
mais si l'id et le mot de passe sont similaire alors l'ajout ne s'éffectue pas pour des raison de sécurité.
Possibilité de masquer le mot de passe ou non dans la zone de saisie. (Si une menace voit votre écran cela peut etre utile)

Sécurisation du programme : 

Pour sécuriser au mieux ce programme, plusieurs mesures ont été prises :
Utilisation de la fonction password_hash pour hacher les mots de passe enregistrés dans la base de données.
Utilisation de la fonction mysql_real_escape_string() pour empêcher les attaques par injection SQL.
Vérification de la présence de tous les champs requis avant l'exécution de toute opération.
Limitation des tentatives de connexion à un nombre maximum en enregistrant le nombre de tentatives ratées pour chaque utilisateur dans la base de données. 

Mot de passe et identifiant pour se connecter :

id:aaron
mdp:aaron123

id:paul
mdp:voiture123

id:marie
mdp:voyage123

id:martin
mdp:ecole123
