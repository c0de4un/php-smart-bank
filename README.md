# php-smart-bank
Bank API written in PHP 7.4 without framework

# API features
* transfer currency
* accounts
* REST
* history
* email, push and messangers
* SMS

# API Documentation
* `https://documenter.getpostman.com/view/11110995/UVyn1e8Y`

# Core Features
* PSR12
* lightweight
* delayed tasks
* cli

# Installation
* install dependencies
```bash
$php composer.phar install
```

* run migration
```bash
$php cli.php migrate
```

* run seeders
```bash
$php cli.php db:seed
```