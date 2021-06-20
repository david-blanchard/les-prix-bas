# LesPrixBas


## 1 - Installation

### 1.1 - Pré-requis


Vous avez un serveur de base de données **MySQL** fonctionnel et accessible sur localhost.

Vous avez **PHP** en version **8** minimum ainsi que **Composer**.

Votre environnement de développement est sous **Linux**, **MacOS** ou **Windows WSL 2**.

Clonez le repo :

```bash
git clone https://github.com/david-blanchard/les-prix-bas.git
```

Installez les dépendances :

```bash
composer u
```

Corrigez les erreurs s'il y en a.


## 2 - Phase de test


Passez en mode test

```bash
php artisan config:cache --env=testing
```

### 2.1 - Migration des données


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
### 2.2 - Test

Lancez le test

```bash
php artisan test
```
Résultat attendu :

```raw
PASS  Tests\Unit\CampaignOneTest
✓ campaign one exists
✓ campaign one discount rate is 15 percent

PASS  Tests\Unit\ProductOneTest
✓ product one exists
✓ product one is veste en jean
✓ product one is not robe
✓ product one price is 38 euros

PASS  Tests\Feature\ModelTest
✓ registration is valid
✓ registration is invalid

PASS  Tests\Feature\RouteTest
✓ mode femme page
✓ mode femme page with valid slug veste one of three
✓ mode femme page with valid slug robe two of three
✓ mode femme page with valid slug maille three of three
✓ mode femme page with invalid slug pantalon
✓ admin ui redirect to login as guest
✓ admin ui request as admin
✓ admin ui edit product one

Tests:  16 passed
Time:   1.39s
```

## 3 - Mode developer

Créez un fichier d'environnement dev avec le fichier test

```bash
$ cp .env.testing .env
```

Editez le fichier .env pour changer APP_ENV=test en APP_ENV=local et supprimez les autres occurrences de test et testing

Quittez le mode test

```bash
php artisan config:cache
```

### 3.1 - Migration des données


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

### 3.2 - Lancement du projet

```bash
php artisan serve
```
