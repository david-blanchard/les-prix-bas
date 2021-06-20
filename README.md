# LesPrixBas


## Installation

### Pré-requis


Vous avez un serveur de base de données MySQL fonctionnel et accessible sur localhost.

Vous avez PHP en version 8 minimum ainsi que Composer.

Votre environnement de développement est sous Linux, MacOS ou Windows WSL 2.

Clonez le repo :

```bash
git clone https://github.com/david-blanchard/les-prix-bas.git
```

Installez les dépendances :

```bash
omposer u
```

Corrigez les erreurs s'il y en a.


## Phase de test


Passez en mode test

```bash
php artisan config:cache --env=testing
```

### Migration des données


Dans le fichier .env.testing, modifiez les accès root pour que les migrations en base s'effectuent sans problème.

Créez la base de données de test

```bash
php artisan db:create lesprixbas_test
```

Créez la structure de la base de données de test

```bash
php artisan migrate
```

Injectez les données de test

```bash
php artisan db:seed
```
### Test

Lancez le test

```bash
php artisan test
```

Tout doit être vert.

## Mode developer

Créez un fichier d'environnement dev avec le fichier test

```bash
$ cp .env.testing .env
```

Editez le fichier .env pour changer APP_ENV=test en APP_ENV=local et supprimez les autres occurrences de test et testing

Quittez le mode test

```bash
php artisan config:cache
```

### Migration des données


Créez la base de données lesprixbas

```bash
php artisan db:create lesprixbas
```

Créez la structure de la base de données

```bash
php artisan migrate
```

Injectez les données

```bash
php artisan db:seed
```

### **Lancement du projet**

```bash
php artisan serve
```
