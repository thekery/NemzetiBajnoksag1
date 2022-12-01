<?php

//alkalmazás gyökér könyvtára a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/feladat/');

//URL cím az alkalmazás gyökeréhez
define('SITE_ROOT', 'http://localhost/feladat/');

// a router.php vezérlő betöltése
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>