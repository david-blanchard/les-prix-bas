# LesPrixBas

![Copie d'écran](assets/lesprixbas_screenshot.webp)

## 1 - Installation

### 1.1 - Pré-requis

Vous avez un serveur de base de données **MySQL** fonctionnel et accessible sur localhost.

Vous avez **PHP** en version **8** minimum ainsi que **Composer**.

Votre environnement de développement est sous **Linux**, **MacOS** ou **Windows WSL 2**.

Le projet est développé à l'aide de **Laravel 8**.

Le cache applicatif est géré par **Memcached**. Le serveur Memcached doit être installé et mis en service. L'extension **php-memcached** doit être installée.

### 1.2 - Installation

Clonez le repo :

```zsh
git clone https://github.com/david-blanchard/les-prix-bas.git
```

Installez les dépendances :

```zsh
composer u
```

## 2 - Phase de test

Passez en mode test

```zsh
php artisan config:cache --env=testing
```

### 2.1 - Migration des données


Dans le fichier .env.testing, modifiez les accès **MySQL** pour refléter vos paramètres de connexion afin que les migrations en base s'effectuent sans problème.

> `DB_USERNAME=`**root**

> `DB_PASSWORD=`**demo**

Créez la base de données de test

```zsh
php artisan db:create
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
✔️ campaign one discount rate is 15 percents

PASS  Tests\Unit\ProductOneTest
✔️ product one exists
✔️ product one is veste en jean
✔️ product one is not robe
✔️ product one price is 38 euros

PASS  Tests\Feature\ProductModelTest
✔️ product pantalon is created without image
✔️ product pantalon without image is deleted
✔️ product pantalon is created with images
✔️ product pantalon with images is deleted in cascade

PASS  Tests\Feature\RouteTest
✔️ mode femme page is found
✔️ mode femme page with valid slug veste is found 1 of 3
✔️ mode femme page with valid slug robe is found 2 of 3
✔️ mode femme page with valid slug maille is found 3 of 3
✔️ mode femme page with invalid slug pantalon is 404
✔️ admin ui redirect to login as guest
✔️ admin ui request as admin is valid
✔️ admin ui edit product one is valid

PASS  Tests\Feature\UserModelTest
✔️ registration with email is valid
✔️ registration without email is invalid

Tests:  20 passed
Time:   1.21s
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
php artisan db:create
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
## 4 - Utilisation du projet

### 4.1 - Côté visiteur

L'application s'ouvre sur la page produit Veste en jean de la catégorie Mode Femme.

3 produits sont prédéfinis, ils peuvent être sélectionnés par la barre de recherche avec les mots-clés : veste, robe et maille. La sélection peut aussi se faire directement dans la barre de navigation sous la catégorie /mode-femme/.

### 4.1 - Côté admin

Les deux autres produits n'ont pas d'image associée, pour cela il faut passer côté admin en se connectant avec les identifiants admin@lpb.fr/demo.

