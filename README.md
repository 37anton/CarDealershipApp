# README - Symfony Project "Car Dealership"

This GitHub repository contains a Symfony project that showcases cars sold by a car dealership. It also includes a CRUD system for administrators. Here's a brief description of the different features and key components of the project:

## Features

- Display of cars sold by the dealership.
- CRUD system for administrators to manage cars and categories.
- Filtering of cars using the `findSearch` function in the `CarRepository`.
- Pagination of results using the KnpPaginationBundle.
- Addition of fake data for development purposes using the Faker library.
- API integration of open-meteo with the `CallApiOpenMeteo.php` file and dynamic updates with `script.js`.

## Project Structure

The project is structured as follows:

- The `CarsController` handles the display of cars sold and can be accessed via the `/cars` route.
- The CRUD for cars is generated using the `make:crud` command and is managed by the `CarController`.
- The CRUD for categories is also generated using the `make:crud` and is also managed by a dedicated controller: `CarCategoryController`.
- The `HomeController` controller handles the homepage of the site.

## Installation

Follow the steps below to install and set up the project on your machine:

1. Clone this GitHub repository to your local machine:

   ```bash
   git clone https://github.com/your-username/the-repo.git

2. Install the dependencies using Composer:

   ```bash
   composer install

3. Modify the .env file to configure your environment.

4. Generate fake data from appfixtures.php:

   ```bash
   php bin/console app:fixtures:load

5. Run the project

   ```bash
   symfony serve
