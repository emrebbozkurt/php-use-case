# PHP-Use-Case

Simple shopping cart project created with [Laravel](https://github.com/laravel/laravel).

* [Installation](#installation)
* [Usage](#usage)

## Installation

1. Clone the project:

    ```bash
    git clone https://github.com/emrebbozkurt/php-use-case.git
    ```

2. Starting the docker containers:

    ```bash
    docker-compose up -d --build
    ```

3. Copy .env.example file and rename to .env


4. Install packages:

    ```bash
    composer install
    ```

5. Generate the application key:

    ```php
    php artisan key:generate
    ```

6. Create the tables:

    ```php
    php artisan migrate --seed
    ```

## Usage

After completing all the steps;

Go to http://localhost:8080 and see the magic :D
