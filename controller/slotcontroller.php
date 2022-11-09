<?php 

require_once __DIR__.'/../model/slots.php';

function getslots(){
    $slotres = allslots();
    require_once __DIR__.'/../view/roomslot/roomlist.php';
}

function getdetail(){
    $valuepass = $_GET['slotid'];
    $slot = slotdetail($valuepass);
    $result2 = slotsimilar($slot['city']);
    $comscres = commentandscore($slot['room_id']);
    require_once __DIR__.'/../view/roomslot/roomdetail.php';
}
?>