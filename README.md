
## Sanctum API (Laravel 8).

### Prerequisites:

- PHP, PHP-CLI >=7.4 & Composer;
- Apache webserver;
- SQLite driver installed;

### Installation:

```
git clone <REPOSITORY_ADDRESS> laravel-sanctum-api
cd laravel-sanctum-api/
```

- Install SQLite driver for UNIX OS and ".env".
```
sudo apt update
sudo apt install php-sqlite3
sudo apt install php7.4-sqlite3
sudo systemctl restart apache2
```

- [OPTIONAL] [Setup](https://stackoverflow.com/a/37266353) Laravel resources (files/folders) ownerships/permissions
```
# one-time command
sudo usermod -a -G www-data $USER

# setup ownerships/permissions
sudo chown -R $USER:www-data storage/ bootstrap/cache/
sudo chgrp -R www-data storage bootstrap/cache/
sudo chmod -R ug+rwx storage bootstrap/cache/
```

- [OPTIONAL] Change PHP version for test server.

### Resources:

- [Traversy Media - Mar 31, 2021 - Laravel 8 REST API With Sanctum Authentication](https://www.youtube.com/watch?v=MT-GJQIY3EU)

### Developed by:

[BoolFalse](https://boolfalse.com/)

### TODOs:
