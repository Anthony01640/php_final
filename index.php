<?php
require_once('./bdd/bdd_user.php');
?>

<!DOCTYPE html>
</html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css.css">
    <title>Classement</title>
</head>
<body>
<h1 style="font-family:Helvetica, sans-serif">Classement</h1>
<div id="flex">
<pre class="name"><?php for ($i = 0; $i < count($shows); $i++) {
        print  $shows[$i]['name'] . " nombre de matchs gagnés : " . $shows[$i]['win'] . " avec un ratio de " . number_format($shows[$i]['win']/$shows[$i]['nb_matchs'],2) . "\n";
    }
    ?>
</pre>
    <div id="flex_i">
        <p >
            <a href="ajouter.php" id="ajou_j">Ajouter joueurs:</a>
        </p>
        <p>
            <a href="partie.php" id="ajou_p">Ajouter parties:</a>
        </p>
    </div>
</div>
</body>
</html>