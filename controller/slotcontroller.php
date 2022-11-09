<?php 

require_once __DIR__.'/../model/slots.php';

function getslots(){
    $slotres = allslots();
    require_once __DIR__.'/../view/roomslot/roomlist.php';
}

function getdetail(){
    $valuepass2 = $_GET['slotid'];
    $slot = slotdetail($valuepass2);
    $result2 = slotsimilar($slot['city']);
    require_once __DIR__.'/../view/roomslot/roomdetail.php';
}

?>