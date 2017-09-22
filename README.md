# Products CRUD example with PHP and Postgresql

## 1. Prerequisites
* Apache Web server
* PHP 7.0
* PostgreSQL
* php70-pgsql for DB connection
* Bootstrap for styling
* jQuery

## 2. Modules Description
### data/product.sql
Create Product table and insert dumy data.
Please run this first by psql.

### model/database.php
PostgreSQL DataBase Connection class.
Database connection configuration is configed here.

### model/product.php
Product CRUD class.
Handle with DB to retrieve, create, update, and delete the product's data.

### view/header.php & footer.php
Header & Footer

### index.php
Main page.
Perform all CRUD functions. All actions (Search, Create, Update, Delete) in one page.


## Apendix: Setting up environment


