<?php
require_once(__DIR__ . "/bdd/bdd_user.php");
require_once(__DIR__ . "/bdd/bdd_match.php");

if (isset($_POST['pseudo1'])) {
    $statement = $connection->prepare("
        INSERT INTO `match` (`id_match`, `id_gagnant`, `id_user1`, `id_user2`) VALUES (NULL, :winner, :pseudo1, :pseudo2);
    ");

    $statement->bindValue(':pseudo1', $_POST["pseudo1"]);
    $statement->bindValue(':pseudo2', $_POST["pseudo2"]);

    if ($_POST['winner'] == "pseudo1") {
        $winner = $_POST['pseudo1'];
    } else if ($_POST['winner'] == "pseudo2") {
        $winner = $_POST['pseudo2'];
    }
    $statement->bindValue(':winner', $winner);
    $statement->execute();

    if ($_POST['winner'] == "pseudo1") {
        $statement = $connection->prepare("
        UPDATE `user` SET `win` = win +1 WHERE `user`.`name` = :pseudo1
    ");
        $statement->bindValue(':pseudo1', $_POST["pseudo1"]);
        $statement->execute();
    } else if ($_POST['winner'] == "pseudo2") {
        $statement = $connection->prepare("
        UPDATE `user` SET `win` = win +1 WHERE `user`.`name` = :pseudo2
    ");
        $statement->bindValue(':pseudo2', $_POST["pseudo2"]);
        $statement->execute();
    }

    $statement = $connection->prepare("
    UPDATE `user` SET `nb_matchs` = nb_matchs+1 WHERE `user`.`name` = :pseudo1
    ");
    $statement->bindValue(':pseudo1', $_POST["pseudo1"]);
    $statement->execute();
    $statement = $connection->prepare("
    UPDATE `user` SET `nb_matchs` = nb_matchs+1 WHERE `user`.`name` = :pseudo2
    ");
    $statement->bindValue(':pseudo2', $_POST["pseudo2"]);
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
    <input type="radio" name="winner" value="pseudo1" checked>
    Joueur 1:<br>
    <SELECT name="pseudo1" size="1">
        <?php for ($i = 0; $i < count($shows); $i++) {
            echo "<OPTION>" . $shows[$i]['name'];
        } ?>
    </SELECT>
    <br>
    <input type="radio" name="winner" value="pseudo2">
    Joueur 2:<br>
    <SELECT name="pseudo2" size="1">
        <?php for ($i = 0; $i < count($shows); $i++) {
            echo "<OPTION>" . $shows[$i]['name'];
        } ?>
    </SELECT>
    <br>
    <br>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>