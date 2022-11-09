<?php 

function allslots(){
    $bdd = initbdd();
    $slot = $bdd->query("SELECT slot.*, room.picture_url,room.description,room.name FROM slot LEFT JOIN room ON slot.room_id = room.id WHERE `status` LIKE 'libre'");
    return $slot->fetchAll();
}

function slotdetail($valuepass){
    $bdd = initbdd();
    $slot = $bdd->query("SELECT slot.*, room.description,room.picture_url,room.name,room.capacity,room.category,room.address,room.city AS city FROM slot LEFT JOIN room ON room.id = slot.room_id WHERE slot.id = '".$valuepass."'");
    return $slot->fetch();
}

function slotsimilar($rst){
    $bdd = initbdd();
    $room2 = $bdd->query("SELECT slot.*, room.picture_url FROM slot LEFT JOIN room ON slot.room_id = room.id WHERE room.city = '".$rst."' AND slot.status = 'libre'");
    return $room2->fetchAll();
}

function commentandscore($commentid){
    $bdd = initbdd();
    $comscr = $bdd->query("SELECT feedback.comment, feedback.score, user.username FROM feedback LEFT JOIN room ON feedback.room_id = room.id LEFT JOIN user ON feedback.user_id = user.id WHERE room.id = '".$commentid."'");
    return $comscr->fetchAll();
}

?>