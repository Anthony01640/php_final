<?php
require_once(__DIR__ . "/bdd/bdd_user.php");
require_once(__DIR__ . "/bdd/bdd_match.php");

if (isset($_POST['pseudo1'])) {
    $statement = $connection->prepare("
        INSERT INTO match(`id_match`, `id_gagnant`, `id_user1`, `id_user2`)
        VALUES(NULL, :pseudo1, :pseudo2, :winner)
    ");

    $statement->bindValue(':pseudo1', $_POST["pseudo1"]);
    $statement->bindValue(':pseudo2', $_POST["pseudo2"]);
    $statement->bindValue(':winner', $_POST["winner"]);
    $statement->execute();
}
?>
<!DOCTYPE html>
</html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Parties</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
<ul class="nav">
    <li><a href="index.php">Classements</a></li>
    <li><a href="ajouter.php">Ajouter joueurs</a></li>
    <li><a href="partie.php">Ajouter parties</a></li>
</ul>
<form method="post" action="partie.php">
    Joueur 1:<br>
    <SELECT name="pseudo1" size="1">
        <?php for ($i = 0; $i < count($shows); $i++) {
        echo "<OPTION>" . $shows[$i]['name'];
        }?>
    </SELECT>
    <br>
    Joueur 2:<br>
    <SELECT name="pseudo2" size="1">
        <?php for ($i = 0; $i < count($shows); $i++) {
            echo "<OPTION>" . $shows[$i]['name'];
        }?>
    </SELECT>
    <br>
    Gagnant<br>
    <SELECT name="winner" size="1">
        <?php for ($i = 0; $i < count($shows); $i++) {
            echo "<OPTION>" . $shows[$i]['name'];
        }?>
    </SELECT>
    <br>
    <br>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>