# Readme - Projet Symfony "Concessionnaire de voitures"

Ce dépôt GitHub contient un projet Symfony permettant de présenter les voitures vendues par un concessionnaire. Il comprend également un système CRUD pour les administrateurs. Voici une brève description des différentes fonctionnalités et composants clés du projet :

## Fonctionnalités

- Affichage des voitures vendues par le concessionnaire sur la page d'accueil.
- Système CRUD pour les administrateurs permettant de gérer les voitures et les catégories.
- Filtrage des voitures grâce à la fonction `findSearch` du `CarRepository`.
- Pagination des résultats avec le bundle KnpPaginationBundle.
- Ajout de fausses données à des fins de développement grâce à la librairie Faker.
- Appel à une API externe via le fichier `CallApiOpenMeteo.php` et mise à jour dynamique avec `script.js`.

## Structure du projet

Le projet est structuré de la manière suivante :

- Le contrôleur `CarsController` gère l'affichage des voitures vendues et est accessible via la route `/cars`.
- Le CRUD pour les voitures est généré à l'aide de la commande `make:crud` et est géré par le contrôleur `CarController`.
- Le CRUD pour les catégories est également géré par un contrôleur dédié : `CarCategoryController`.
- Le contrôleur `HomeController` gère la page d'accueil du site.

## Installation

Suivez les étapes ci-dessous pour installer et configurer le projet sur votre machine :

1. Clônez ce dépôt GitHub sur votre machine locale :

   ```bash
   git clone https://github.com/votre-utilisateur/le-depot.git
