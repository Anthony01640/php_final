<?php
$dsn = 'mysql:dbname=clash;host=127.0.0.1';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password);

$statement = $connection->prepare("
    SELECT name,win FROM user;
");

$statement->execute();

$fruits = $statement->fetchAll();
$g = __toString($fruits);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<h1>Nom des joueurs</h1>
<pre>
            <?php print($g); ?>
        </pre>
</body>
</html>

