# StudyMate – Backend (FlightPHP + MySQL)

Single Page App backend for StudyMate using **PHP (FlightPHP)**, **MySQL (PDO)**, and **REST**.
This repo contains:
- DAO layer for 5 entities (users, roles, courses, modules, notes)
- REST routes using FlightPHP v3
- MySQL schema + sample data
- OpenAPI-style endpoint documentation

## Tech Stack
- PHP 8.x (XAMPP)
- MySQL (phpMyAdmin)
- FlightPHP v3 (`flightphp/core`)
- PDO (prepared statements)
- JSON responses
- Apache mod_rewrite (+ `.htaccess`)

## Project Structure
# StudyMate – Backend (FlightPHP + MySQL)

Single Page App backend for StudyMate using **PHP (FlightPHP)**, **MySQL (PDO)**, and **REST**.
This repo contains:
- DAO layer for 5 entities (users, roles, courses, modules, notes)
- REST routes using FlightPHP v3
- MySQL schema + sample data
- OpenAPI-style endpoint documentation

## Tech Stack
- PHP 8.x (XAMPP)
- MySQL (phpMyAdmin)
- FlightPHP v3 (`flightphp/core`)
- PDO (prepared statements)
- JSON responses
- Apache mod_rewrite (+ `.htaccess`)

## Requirements
- XAMPP (Apache + MySQL) running
- PHP ≥ 8.0
- Composer installed (`composer -V`)

## Local Setup (fresh machine)
1. Copy this folder to XAMPP’s web root (macOS): /Applications/XAMPP/htdocs/study
2. Start **Apache** and **MySQL** in XAMPP.
3. Install dependencies:
```bash
cd /Applications/XAMPP/htdocs/study
composer install

