<?php

session_start();
require_once('./tpl/init.php');

if (empty($_GET['route'])) $route = 'home';
else $route = $_GET['route'];

switch ($route) {
    case 'home':
        include_once __DIR__.'./controller/slotcontroller.php';
        getslots();
        break;
    case 'reservation':
        include_once __DIR__.'./controller/slotcontroller.php';
        getdetail();
        break;
}
?>
