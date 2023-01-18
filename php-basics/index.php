<?php

require './functions.php';
require './Database.php';

$database = new Database('localhost', '3306', 'my_app', 'root');
$posts = $database->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($posts as $post) : ?>
        <h3><?= $post['title']; ?></h3>
        <?php if ($post['title']) : ?>
            <p><?= $post['body']; ?></p>
        <?php endif; ?>
    <?php endforeach; ?>
</body>

</html>