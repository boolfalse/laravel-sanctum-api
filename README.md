
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

- Add "Accept: application/json" to the POST,PUT,DELETE API-endpoints.

### Resources:

- [Postman Collection shared public link](https://www.getpostman.com/collections/04fd3912e4c490df29da)
- [Traversy Media - Mar 31, 2021 - Laravel 8 REST API With Sanctum Authentication](https://www.youtube.com/watch?v=MT-GJQIY3EU)
- [Brad Traversy - Laravel Sanctum API](https://github.com/bradtraversy/laravel-sanctum-api)
- [Laravel Sanctum - official documentation](https://laravel.com/docs/8.x/sanctum)
- [failed to open stream: Permission denied](https://stackoverflow.com/a/48794292)
- [Permission denied ".../storage/logs/laravel.log could not be opened"](https://github.com/BookStackApp/BookStack/issues/436#issuecomment-395964366)

### Developed by:

[BoolFalse](https://boolfalse.com/)

### TODOs:

- Fix SQLite-related error "SQLSTATE[HY000]General Error: 8 attempt to write a readonly database"
