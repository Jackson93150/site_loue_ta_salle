<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loue Ta Salle</title>
    <link rel="stylesheet" href="./tpl/style.css" />
</head>
<body>
    <script>
        function reply_click(clicked_id,clicked_id2)
        {
            let click = clicked_id;
            document.cookie = "selected="+click;
            let click2 = clicked_id2;
            console.log(click2);
            document.cookie = "selected2="+click2;
            location.href = 'reserv.php';
        }
    </script>
    <div class="grid-container">
        <?php
            foreach($slotres as $slot):
        ?>
        <div class="grid-item">
            
            <?php 
                setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                $timestampArrival = strtotime($slot['arrival_date']);
                $timestampArrival = ucfirst(strftime(" %d %B %Y", $timestampArrival));
                $timestampDeparture = strtotime($slot['departure_date']);
                $timestampDeparture = ucfirst(strftime(" %d %B %Y", $timestampDeparture));
            ?>
            <a href="index.php?route=reservation&slotid=<?= $slot['id'] ?>&roomid=<?= $slot['room_id'] ?>"><img class="img-salle"src= <?= $slot['picture_url'] ?> style="cursor: pointer;"></a>
            <div class="flexing">
                <h5 class="item" style="color:cornflowerblue;"><?= $slot['name'] ?></h5>
                <h5 class="item"><?= $slot['price'] ?>€</h5>
            </div>
            <p class="description"><?= $slot['description']?></p>
            <h6 class="reserv-date"><?= $timestampArrival ?> au <?= $timestampDeparture ?></h6>
            <div class="line"></div>
            <div class="flex">
                <img class="item1" src="https://www.pngall.com/wp-content/uploads/4/5-Star-Rating-PNG-File.png" style="height:25px;padding:0px 40px;">
                <a href="index.php?route=reservation&slotid=<?= $slot['id'] ?>&roomid=<?= $slot['room_id'] ?>"><img class="item2" src="https://icones.pro/wp-content/uploads/2021/06/icone-loupe-bleu.png" style="height:25px;padding:0px 30px;cursor: pointer;"></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>