<?php
require_once(__DIR__ . "/bdd/bdd_user.php");
if (isset($_POST['pseudo'])) {
    $statement = $connection->prepare("
        INSERT INTO `user` (`name`, `win`, `nb_matchs`, `id_clash`) VALUES(:pseudo, :win, :game, :id)
    ");
    $statement->bindValue(':pseudo', $_POST["pseudo"]);
    $statement->bindValue(':win', $_POST["win"]);
    $statement->bindValue(':id', $_POST["idplayer"]);
    $statement->bindValue(':game', $_POST["game"]);
    $statement->execute();
}
?>
<!DOCTYPE html>
</html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Joueurs</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
<ul class="nav">
    <li><a href="index.php">Classements</a></li>
    <li><a href="ajouter.php">Ajouter joueurs</a></li>
    <li><a href="partie.php">Ajouter parties</a></li>
</ul>
<form method="post" action="ajouter.php">
    Pseudo:<br>
    <input type="text" name="pseudo" id="pseudo">
    <br>
    ID Clash Royale:<br>
    <input type="text" name="idplayer" id="idplayer" value="">
    <br>
    Nombre de parties:<br>
    <input type="number" name="game" id="game" value="">
    <br>
    Nombre de wins:<br>
    <input type="number" name="win" id="win" value="">
    <br>
    <br>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>