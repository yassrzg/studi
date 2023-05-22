#Mon Projet

Ceci est un projet d'un site pour un restaurant pour l'ECF STUDI 2023.

Les fonctionnalitées demandées:

l'admin PEUT crées des formules et des menu et les affichers.

Un client peut crée un compte et ainsi ce connecter.

Client/Visiteur peuvent réserver à une date précise et un créneau précis

Le client à ses données déjà pré rempli.

#ADMINISTRATEUR:

Le compte Admin à été crée : email :studiECF@test.com , pwd :123456.
Si vous utilisez les fixtures , l'admin est codé en dure dans le code de la fixture.
Il suffit de vous connecter pour accédez au backoffice ADMIN et ainsi pouvoir changer l'email et le mot de passe.

Si vous utilisez mon export de BDD : 
Admin -> email : studiECF@test.com , pwd : 123456


#PRÉ REQUIS : 
PHP 8.0 minimum
Symfony 6
MariaDB
Nginx
Composer

#INSTALLATION DU PROJET EN LOCAL :

se rendre sur github : https://github.com/yassrzg/studi.git

git clone https://github.com/yassrzg/studi.git

#LOCAL

Soyer connecté à internet pour que l'API d'envoie de mail fonctionne.


#BASE DE DONNÉE 

J'ai exporté pour vous ma bdd avec la quel j'ai mis en ligne le site si vous souhaitez l'utiliser.
vous la trouverait dans export.sql : 
Pour l'utiliser il vous faut crée une Base de donnée ;

mysql -u username -p database_name < export.sql

Exécuter cela à la racine de votre projet , et remplacer username par le nom de votre base de donner et databasename par le nom de votre database

Ou bien vous pouvez utiliser la migration qui est un fichier qui se trouve dans le dossier évaluation studi ecf envoyé.
Puis ensuite l'importer et exécuter les fixtures  avec la commande suivante : 

php bin/console doctrine:fixtures:load

Liens du site : 









