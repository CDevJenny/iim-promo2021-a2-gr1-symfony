# Symfony, Easy Peasy Lemon Squeezy 👩‍🎓

## Install dependencies

> Use composer to install dependencies in *vendor/* (needed libraries).  
  Install dependencies from `composer.lock` if exist or create it.


```bash
composer install
```

*If you encounter a bug, you need to do a composer update instead because I probably have a dependency for PHP 7.2 only so you need to fix it!*

```bash
composer update
```

> If you want to require a new dependency

```bash
composer require johndoe/library
```

## Configure Project

Configure file `.env` accordingly to **your** environment.

## Symfony Console

* Get all available commands

> Windows

```bash
php bin\console
```

> Mac

```bash
bin/console
```

* Start a Web Server

> Windows (foreground process)

```bash
php bin\console server:run
```

> Mac (background process)

```bash
bin/console server:start
```

* Create database (if not exist)

> Windows

```bash
php bin\console doctrine:database:create
```

> Mac

```bash
bin/console doctrine:database:create
```

* Update schema (execute SQL statements to sync tables/columns)

> Windows

```bash
php bin\console doctrine:schema:update --dump-sql --force
```

> Mac

```bash
bin/console doctrine:schema:update --dump-sql --force
```

## Shortcuts Jetbrains (bonus4free)

* Quick open `CMD + MAJ + O` (mac) | `CTRL + N` (windows)
* Reformat code `CMD + ALT + L` (mac) | `CTRL + ALT + L` (windows)
