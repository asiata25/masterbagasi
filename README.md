<p align="center"><a href="https://masterbagasi.com/" target="_blank"><img src="https://masterbagasi.com/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmaster-bagasi-horizontal.16e39773.png&w=256&q=75" width="200" alt="Laravel Logo"></a></p>
<br/>
<br/>

# Hasil Test Backend Developer

This application is built with:

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.20.0-red?style=for-the-badge&logo=laravel" alt="Laravel">
</p>

> **Check out my website:** [**lutfikhoir.com**](https://lutfikhoir.com/)

## Getting Started

### 1. Clone the Repositories

First, clone this repository and the frontend repository to your local machine:

```bash
# Clone the backend repo
git clone https://github.com/asiata25/Masterbagasi.git
```

### 2. Setting Up the Backend (Laravel)

1. Navigate to the backend repository:

    ```bash
    cd masterbagasi
    ```

2. Install the dependencies:

    ```bash
    composer install
    ```

3. Set up your environment file:

    - Copy the `.env.example` file to create a new `.env` file:

        ```bash
        cp .env.example .env
        ```

    - **Important:** Configure the database settings in the `.env` file according to your database setup. Replace the default settings with your actual database credentials:

        ```plaintext
        DB_CONNECTION=mysql
        # DB_HOST=127.0.0.1
        # DB_PORT=3306
        # DB_DATABASE=laravel
        # DB_USERNAME=root
        # DB_PASSWORD=
        ```

        Make sure to uncomment and set the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` values as per your database configuration. Ensure that the database you specify exists before running the migrations.

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run the migrations to set up the database:

    ```bash
    php artisan migrate
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

## API Documentation

-   **Postman Collection:** The Postman collection for testing the API is available in the [postman_collection](docs/masterbagasi.postman_collection.json) file.
