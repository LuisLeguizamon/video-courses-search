PHPVERSION=8.1
sudo update-alternatives --set php /usr/bin/php$PHPVERSION
sudo update-alternatives --set phar /usr/bin/phar$PHPVERSION
sudo update-alternatives --set phar.phar /usr/bin/phar.phar$PHPVERSION
sudo update-alternatives --set phpize /usr/bin/phpize$PHPVERSION
sudo update-alternatives --set php-config /usr/bin/php-config$PHPVERSION
php -v

gnome-terminal --tab
php artisan serve
