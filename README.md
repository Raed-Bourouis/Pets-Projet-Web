# Pets-Projet-Web

Ce projet est un site web qui permet le soutien et l'adoption des animaux domestiques.

Réalisé par Raed Bourouis, Rayen Jenhani et Islem Nasri (étudiants en 1ère année à l'École Nationale des Sciences de l'Informatique), et développé en HTML/CSS/JavaScript/PHP à travers XAMPP.

## Services

- **Adoption Facile**: Trouvez et adoptez un animal de compagnie qui vous convient.
- **Soutien aux Refuges**: Soutenez les refuges et les organisations de sauvetage en faisant des dons.
- **Volontariat**: Participez en tant que volontaire/vétérinaire pour aider les animaux et les refuges.
- **Aide Financière**: Faites des dons pour le bien de l'association à travers notre Marketplace.

## Installation

Pour installer et exécuter localement Pets Haven, suivez ces étapes :

1. Clonez le dépôt localement dans '.\xampp\htdocs' : `git clone https://github.com/Raed-Bourouis/Pets-Projet-Web`
2. Dans XAMPP, démarrez Apache et MySQL, puis dans votre navigateur accédez à `localhost/phpmyadmin`
3. Dans PhpMyAdmin, créez une nouvelle bdd nommée `pets`, naviguez à la rubrique `import` et importez le fichier `./bdd/pets.sql`
4. Tapez l'URL suivante : `http://localhost/Pets-Projet-Web/HTML/home.php`

## Fonctionnalités

1. Un design élégant et moderne, avec des animations dynamiques, réalisées en CSS et JS.
2. Vérification de la saisie, assurée par JS et PHP.
3. Sauvegarde et manipulation des données d'utilisateurs (User/Admin), des animaux, des produits, des dons, et des réponses aux divers formulaires, dans une base de données MySQL, assurée par la connexion PDO.
4. Envoi des emails suite au remplissage des formulaires (à condition que le service sendmail de XAMPP soit bien configuré).
