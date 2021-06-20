
# Installation de LesPrixBas



## Pré-requis


Vous avez un serveur de base de données MySQL fonctionnel et accessible sur localhost.

Vous avez PHP en version 8 minimum ainsi que Composer.

Votre environnement de développement est sous Linux, MacOS ou Windows WSL 2.

Installez les dépendances :

    $ composer u

Corrigez les erreurs s'il y en a.


# Phase de test


Passez en mode test

    $ php artisan config:cache --env=testing

## Migration des données


Dans le fichier .env.testing, modifiez les accès root pour que les migrations en base s'effectuent sans problème.

Créez la base de données de test

    $ php artisan db:create lesprixbas_test

Créez la structure de la base de données de test

    $ php artisan migrate

Injectez les données de test

    $ php artisan db:seed

## Test


Lancez le test

    $ php artisan test

Tout doit être vert.


# Mode developer


Créez un fichier d'environnement dev avec le fichier test

    $ cp .env.testing .env

Editez le fichier .env pour changer APP_ENV=test en APP_ENV=local et supprimez les autres occurrences de test et testing

Quittez le mode test

    $ php artisan config:cache


## Migration des données


Créez la base de données lesprixbas

    $ php artisan db:create lesprixbas

Créez la structure de la base de données

    $ php artisan migrate

Injectez les données

    $ php artisan db:seed


## Lancement du projet


    $ php artisan serve

