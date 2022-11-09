<?php

session_start();
require_once('./tpl/init.php');

$room = $pdo->query('SELECT * FROM room');
$result = $room->fetchAll();

$slot = $pdo ->query("SELECT * FROM slot WHERE `status` LIKE 'libre'");
$slotres = $slot->fetchAll();

$valuepass = $_COOKIE['selected'];
$valuepass2 = $_COOKIE['selected2'];
?>

