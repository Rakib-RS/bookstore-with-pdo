<?php

    //$booksJson = file_get_contents('books.json');
    //$books = json_decode($booksJson, true);
    require_once('./dbconfig.php');
    require_once('./phpmysqlconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>save</title>
</head>

<body>
    <?php
        $data = [$_POST];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $available = $_POST['available'];
        $pages = $_POST['pages'];
        $isbn = $_POST['isbn'];
        echo $title;
       // $all = array_merge($books,$data);
       // file_put_contents('./books.json',json_encode($all));
       //  header('Location:index.php');
       $task = array(':title' => $title,
       ':author' => $author,
       ':available' => $available,
       ':pages' => $pages,
       ':isbn' => $isbn
        );
       $sql = "INSERT INTO books(
        title,
        author,
        available,
        pages,
        isbn
    )
    VALUES (
       :title,
       :author,
       :available,
       :pages,
       :isbn
    )";
    $q = $pdo->prepare($sql);
    $q->execute($task);
    header('Location:index.php');
    ?>
</body>

</html>