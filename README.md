<p align="center"><img src="public/assets/img/logo-lcs.webp" width="400" alt="Laravel Logo"></p>

## À propos

Cette application web de gestion de la caisse, permettra à l'utilisateur d'enregistrer les transactions, les entrés et les sorties chaque jour et permettra de faire un bilan journalier.

## Fonctionnalités

### Caissier

- Se connecter
- Créer des bénéficiaires
- Créer des factures
- Effectuer des paiements (factures, avances, versements et approvisionnements)
- Annuler des paiements
- Ouvrir et cloturer les caisses
- Imprimer les factures, les bons et les rapports


## Mise en place

Commandes à taper après le `git clone` :

1. Clonez le dépôt :
    ```sh
    git clone <url-du-repo>
    cd <nom-du-repo>
    ```

2. Installez les dépendances du projet :
    ```sh
    composer install
    ```

3. Créez un fichier `.env` en copiant le fichier `.env.example` :
    ```sh
    cp .env.example .env
    ```

4. Générez la clé d'application :
    ```sh
    php artisan key:generate
    ```

5. Configurez vos informations de base de données et de l'envoi de mail dans le fichier `.env` :
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sounou
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Exécutez les migrations de base de données :
    ```sh
    php artisan migrate
    ```

7. Exécutez le seeder pour créer un caissier de test :
    ```sh
    php artisan db:seed
    ```
    - Email : test@example.com
    - Mot de passe : test@example.com

8. Lancez le serveur de développement :
    ```sh
    php artisan serve
    ```

9. Exécutez le seeder pour créer des categories de test :
    ```sh
    php artisan db:seed --class=CategorieFactureSeeder
    ```
     ```sh
    php artisan db:seed --class=CategorieBeneficiaireSeeder
    ```