<?php
define('MAIN_APP_ROOT', '/SEQUOT');
define('ROOT', '/SEQUOT/');
define('DOCUMENT_ROOT', realpath($_SERVER['DOCUMENT_ROOT']).ROOT);
define('APP_DOMAIN', $_SERVER['HTTP_HOST']);
define('WEB_ROOT', 'http://'.APP_DOMAIN.ROOT);
define('REFRESH_DELAY', 5);

$tenDays = 60*60*24*10;
define('COOKIES_ALIVE', $tenDays);
?>