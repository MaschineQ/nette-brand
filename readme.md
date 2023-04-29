Brand Web Project
=================

Brand WEb Project in Nette Framework  -  [nette.org](nette.org)  
Using Docker, Nette Framework 3.1, PHP 8.2, Nginx, Adminer, MariaDB 10.8, MaterializeCSS, PHPStan, Nette Code Standard


Requirements
------------

- requires Docker


Installation
------------

1. Clone this repo with GIT.
2. Install docker in you don't have it (https://www.docker.com/products/docker-desktop)
3. Get into folder and run `docker-compose up`. First run can take about 10 mins depending on your machine performance (the program will make libraries installation for the first time).
4. Visit http://localhost:8009 in your browser or config port in `docker-compose.override.yml`.


First-run
----------------

1. Get inside be container `docker-compose exec php bash`
2. Run `composer install`
3. Import database (adminer, phpmyadmin, ...) from `sport.sql` .



Testing
----------------

Get inside be container `docker-compose exec php bash` and run:   
PHPStan - `composer phpstan`  
CS(coding-standard) - `composer cs` - dry run  
CS(coding-standard) - `composer cs-fix` - fix



Adminer
----------------

Visit http://localhost:90111 or config port in `docker-compose.override.yml`.  
Server: mysql  
User / pasword: root / root