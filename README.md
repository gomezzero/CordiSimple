<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Technologies Used

- **Laravel:** PHP framework for building modern web applications.
- **MySQL or Sqlite:** Database management system to store categories and product information.
- **Blade:** Laravel's templating engine for building dynamic user interfaces. 
- **Tailwind CSS:** Utility-first CSS framework for a clean and responsive design.
- **Vite:** Development tool for fast builds and optimized asset bundling.
- **PHP:** Backend programming language.

# Laravel Project Setup for Local Development

## Requirements

Before running the project locally, ensure that you have the following installed:

- **PHP >= 8.0** (You can check your PHP version with `php -v`).
- **Composer** (Dependency management tool for PHP, download from [https://getcomposer.org/](https://getcomposer.org/)).
- **Node.js and NPM** (For frontend dependencies, [https://nodejs.org/](https://nodejs.org/)).
- **Database** (MySQL, PostgreSQL, etc., depending on your `.env` settings).

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the repository:**
```bash
git clone https://github.com/gomezzero/CordiSimple
```
Clone the repository, preferably using the SSH security key or you can also use the HTTPS method.
<p align="center"><img src="https://happygitwithr.com/img/github-https-or-ssh-url-annotated.png" width="600" alt="ejemplo"></p>

2. **Navigate to the Project Directory:**
```bash
cd CordiSimple
```
3. **Switch to Your Working Branch:**
```bash
git checkout -b yourBranchName
```
4. **If necessary, Fetch the Latest Changes:**
```bash
git pull origin develop
```
5. **Install Project Dependencies:**
```bash
composer install
npm install
```
6. **Set up the environment file:**
```bash
cp .env.example .env
```
7. **Generate the application key:**
```bash
php artisan key:generate
```
8. **Set up the database and run migrations:**
```bash
php artisan migrate
```
9. **If you want you can load the seed data:**
```bash
php artisan db:seed
```
10. **Run the development server and build the frontend:**
```bash
composer run dev
```

## Contributing

Contributions are welcome! If you have any suggestions, feature requests, or bug reports, please open an issue or submit a pull request to the branch ```develop```

