<?php
define('MAIN_APP_ROOT', '/ipst');
define('ROOT', '/ipst/');
define('DOCUMENT_ROOT', realpath($_SERVER['DOCUMENT_ROOT']).ROOT);
define('APP_LOG', DOCUMENT_ROOT.'log/error.log');
define('APP_DOMAIN', $_SERVER['HTTP_HOST']);
define('WEB_ROOT', 'http://'.APP_DOMAIN.ROOT);
define('REFRESH_DELAY', 60);
define('VERIFY_CAPTCHA', false);

//3600 is one hour.
define('SESSION_MAX_LIFE_TIME', 3600);

$tenDays = 60*60*24*10;
define('COOKIES_ALIVE', $tenDays);

define('THAI_VAT', 7);

//reCAPTCHA Key
define('SITE_KEY', '6LcTdRITAAAAAAUlDVsOdvuX5CGCw7ja8qPyptiv');
define('SECRET_KEY', '6LcTdRITAAAAAJZo35cxJYRUuC40UWDqod3rbJT-');
?>