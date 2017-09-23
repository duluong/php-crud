# The very Simple CRUD example with PHP and Postgresql

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
Perform all CRUD functions. All actions (Search, Create, Update, Delete) are performed in one page.

### js/crud.js
Use jQuery to perform product's row selection action on client site

## Apendix: Setting up environment memo
### upgrade OS
sudo yum install -y

### install Apache 2.4 (web server)
sudo yum install -y httpd24
sudo service httpd start
sudo chkconfig httpd on

### install PostgreSQL server & client
yum install postgresql96-server
yum install postgresql96


service postgresql-9.6 initdb
chkconfig postgresql-9.6 on
service postgresql-9.6 start

### create database and user on Postgres
\# Switch to postgres user (admin of Postgres)
sudo su postgres

\# Connect from postgres user Switch to postgres user
psql

\# Create a New Role (user) which is ues in application
createuser --interactive

Output
Enter name of role to add: ec2-user
Shall the new role be a superuser? (y/n) y

\# update config file of Postgres to allow connect.
config file: /var/lib/pgsql/9.6/data/pg_hba.conf

\# file the following line and change from ident to trust to allow simple connect from the same host.
#host    all             all             127.0.0.1/32            ident
host    all             all             127.0.0.1/32            trust

\# Restart service for new
sudo service postgresql-9.6 restart