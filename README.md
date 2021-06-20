# LesPrixBas


## 1 - Installation

### 1.1 - Pré-requis


Vous avez un serveur de base de données **MySQL** fonctionnel et accessible sur localhost.

Vous avez **PHP** en version **8** minimum ainsi que **Composer**.

Votre environnement de développement est sous **Linux**, **MacOS** ou **Windows WSL 2**.

Clonez le repo :

```zsh
git clone https://github.com/david-blanchard/les-prix-bas.git
```

Installez les dépendances :

```zsh
composer u
```

Corrigez les erreurs s'il y en a.


## 2 - Phase de test


Passez en mode test

```zsh
php artisan config:cache --env=testing
```

### 2.1 - Migration des données


Dans le fichier .env.testing, modifiez les accès **MySQL** pour que les migrations en base s'effectuent sans problème.

> `DB_USERNAME=`**root**

> `DB_PASSWORD=`**demo**

Créez la base de données de test

```zsh
php artisan db:create lesprixbas_test
```

Créez la structure de la base de données de test

```zsh
php artisan migrate
```

Injectez les données de test

```zsh
php artisan db:seed
```
### 2.2 - Test

Lancez le test

```zsh
php artisan test
```
Résultat attendu :

```zsh
PASS  Tests\Unit\CampaignOneTest
✔️ campaign one exists
✔️ campaign one discount rate is 15 percent

PASS  Tests\Unit\ProductOneTest
✔️ product one exists
✔️ product one is veste en jean
✔️ product one is not robe
✔️ product one price is 38 euros

PASS  Tests\Feature\ModelTest
✔️ registration is valid
✔️ registration is invalid

PASS  Tests\Feature\RouteTest
✔️ mode femme page
✔️ mode femme page with valid slug veste one of three
✔️ mode femme page with valid slug robe two of three
✔️ mode femme page with valid slug maille three of three
✔️ mode femme page with invalid slug pantalon
✔️ admin ui redirect to login as guest
✔️ admin ui request as admin
✔️ admin ui edit product one

Tests:  16 passed
Time:   1.39s
```

## 3 - Mode developer

Créez un fichier d'environnement dev avec le fichier test

```zsh
cp .env.testing .env
```

Editez le fichier .env pour changer quelques valeurs qui caractérisent l'environnement de test : 


> `<< APP_ENV=`**test**

> `>> APP_ENV=`**local**

> `<< DB_CONNECTION=mysql`**_testing**

> `>> DB_CONNECTION=mysql`

> `<< DB_DATABASE=lesprixbas`**_test**

> `>> DB_DATABASE=lesprixbas`


Quittez le mode test

```zsh
php artisan config:cache
```

### 3.1 - Migration des données


Créez la base de données lesprixbas

```zsh
php artisan db:create lesprixbas
```

Créez la structure de la base de données

```zsh
php artisan migrate
```

Injectez les données

```zsh
php artisan db:seed
```

### 3.2 - Lancement du projet

```zsh
php artisan serve
```
